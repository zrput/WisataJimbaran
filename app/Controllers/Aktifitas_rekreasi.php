<?php

namespace App\Controllers;

class Aktifitas_rekreasi extends BaseController
{
    
    public function __construct()
    {
        $this->rekreasi_model = new \App\Models\Mrekreasi();
    }
    

    public function table_rekreasi(){
        $data['data'] = $this->rekreasi_model->findAll();
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/rekreasi_wisata/table_rekreasi', $data);
    }

    public function form_rekreasi(){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/rekreasi_wisata/form_rekreasi', $data);
    }

    public function insert_rekreasi(){
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $jam = $this->request->getPost('jam');
        $harga = $this->request->getPost('harga');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $in_data = [
            'nama_tempat' => $nama,
            'alamat' => $alamat,
            'jam_operasi' => $jam,
            'biaya_masuk' => $harga,
            'peta' => $peta,
            'deskripsi' => $des,
        ];
        $this->rekreasi_model->insert_data($in_data);
        
        $id_ob = $this->rekreasi_model->get_id()->id_rekreasi;
        
        if ($files) {
            $allowedMimeTypes = ['image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_rekreasi' => $imgs->getClientName(),
                        'id_rekreasi' => $id_ob,
                    ];
                    $this->rekreasi_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/aktifitas_rekreasi', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Aktifitas_rekreasi/table_rekreasi'));

    }

    public function edit_rekreasi($id){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        $data['data'] = $this->rekreasi_model->find($id);
        $data['img'] = $this->rekreasi_model->get_data_img($id);
        return view('admin/rekreasi_wisata/edit_rekreasi', $data);
    }

    public function delete_img($id){ # function untuk menghapus 1 gambar di edit
        $namaimg = $this->rekreasi_model->get_nama_edit($id);
        if (!empty($namaimg)) {
            unlink(ROOTPATH . 'public/aktifitas_rekreasi/' . $namaimg->gambar_rekreasi);
        }
        $this->rekreasi_model->edit_delete($id);
    }

    public function update_rekreasi(){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $jam = $this->request->getPost('jam');
        $harga = $this->request->getPost('harga');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $data = [
            'nama_tempat' => $nama,
            'alamat' => $alamat,
            'jam_operasi' => $jam,
            'biaya_masuk' => $harga,
            'peta' => $peta,
            'deskripsi' => $des,
        ];
        $this->rekreasi_model->update_data($id, $data);

        if ($files) {
            $allowedMimeTypes = ['image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_rekreasi' => $imgs->getClientName(),
                        'id_rekreasi' => $id,
                    ];
                    $this->rekreasi_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/aktifitas_rekreasi', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Aktifitas_rekreasi/table_rekreasi'));
    }


    public function delete_rekreasi($id){
        $namaid = $this->rekreasi_model->get_nama_img($id);
        
        if (!empty($namaid)) {
            foreach ($namaid as $gambar) {
                // Menghapus gambar dari server lokal
                unlink(ROOTPATH . 'public/aktifitas_rekreasi/' . $gambar['gambar_rekreasi']);
            }
        }
        $this->rekreasi_model->delete_img($id);
        $this->rekreasi_model->delete_data($id);
        return redirect()->to(base_url('Aktifitas_rekreasi/table_rekreasi'));
    }


    public function lihat_img($id){
        $data = $this->rekreasi_model->get_nama_img($id);

        // Mengembalikan data gambar sebagai respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
