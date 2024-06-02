<?php

namespace App\Controllers;

class Akomodasi extends BaseController
{

    
    public function __construct()
    {
        $this->akomodasi_model = new \App\Models\Makomodasi();
    }
    

    public function table_akomodasi(): string{
        $data['data'] = $this->akomodasi_model->findAll();
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/akomodasi_inap/table_akomodasi', $data);
    }
    
    public function form_akomodasi(){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/akomodasi_inap/form_akomodasi', $data);
    }

    public function insert_akomodasi(){
        $nama = $this->request->getPost('nama');
        $tipe = $this->request->getPost('tipe');
        $alamat = $this->request->getPost('alamat');
        $min = $this->request->getPost('min');
        $email = $this->request->getPost('email');
        $nomor = $this->request->getPost('nomor');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');
        $in = $this->request->getPost('checkin');
        $out = $this->request->getPost('checkout');

        $files = $this->request->getFiles('img[]');

        $in_data = [
            'nama_penginapan' => $nama,
            'tipe_penginapan' => $tipe,
            'alamat' => $alamat,
            'min' => $min,
            'email' => $email,
            'telepon' => $nomor,
            'peta' => $peta,
            'deskripsi' => $des,
            'check_in' => $in,
            'check_out' => $out,
        ];

        $this->akomodasi_model->insert_data($in_data);
        
        $id_ob = $this->akomodasi_model->get_id()->id_penginapan;
        
        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_akomodasi' => $imgs->getClientName(),
                        'id_penginapan' => $id_ob,
                    ];
                    $this->akomodasi_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/akomodasi_penginapan', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Akomodasi/table_akomodasi'));

    }

    public function edit_akomodasi($id){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        $data['data'] = $this->akomodasi_model->find($id);
        $data['img'] = $this->akomodasi_model->get_data_img($id);

        return view('admin/akomodasi_inap/edit_akomodasi', $data);
    }

    public function update_akomodasi(){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $tipe = $this->request->getPost('tipe');
        $alamat = $this->request->getPost('alamat');
        $min = $this->request->getPost('min');
        $email = $this->request->getPost('email');
        $nomor = $this->request->getPost('nomor');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');
        $in = $this->request->getPost('checkin');
        $out = $this->request->getPost('checkout');

        $files = $this->request->getFiles('img[]');

        $data = [
            'nama_penginapan' => $nama,
            'tipe_penginapan' => $tipe,
            'alamat' => $alamat,
            'min' => $min,
            'email' => $email,
            'telepon' => $nomor,
            'peta' => $peta,
            'deskripsi' => $des,
            'check_in' => $in,
            'check_out' => $out,
        ];
        $this->akomodasi_model->update_data($id, $data);

        if ($files) {
            $allowedMimeTypes = ['image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_akomodasi' => $imgs->getClientName(),
                        'id_penginapan' => $id,
                    ];
                    $this->akomodasi_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/akomodasi_penginapan', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Akomodasi/table_akomodasi'));
    }

    public function delete_img($id){ # function untuk menghapus 1 gambar di edit
        $namaimg = $this->akomodasi_model->get_nama_edit($id);
        if (!empty($namaimg)) {
            unlink(ROOTPATH . 'public/akomodasi_penginapan/' . $namaimg->gambar_akomodasi);
        }
        $this->akomodasi_model->edit_delete($id);
    }

    public function delete_akomodasi($id){
        $namaid = $this->akomodasi_model->get_nama_img($id);
        
        if (!empty($namaid)) {
            foreach ($namaid as $gambar) {
                // Menghapus gambar dari server lokal
                unlink(ROOTPATH . 'public/akomodasi_penginapan/' . $gambar['gambar_akomodasi']);
            }
        }
        $this->akomodasi_model->delete_img($id);
        $this->akomodasi_model->delete_data($id);
        return redirect()->to(base_url('Akomodasi/table_akomodasi'));
    }

    public function lihat_img($id){
        $data = $this->akomodasi_model->get_nama_img($id);

        // Mengembalikan data gambar sebagai respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}