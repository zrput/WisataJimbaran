<?php

namespace App\Controllers;

class Fasilitas extends BaseController
{

    
    public function __construct()
    {
        $this->fasilitas_model = new \App\Models\Mfasilitas();
    }

    public function table_fasilitas($id){
        $query = $this->fasilitas_model->where('id_penginapan', $id)->get();
        $hasil = $query->getResultArray();

        if (!empty($hasil)) {
            $data['data'] = $query->getResultArray();
        } else {
            // Handle the case where the result is null
            $data['data'] = array();
        }
        $data['pk'] = $id;
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/fasilitas/table_fasilitas', $data);

    }

    public function form_fasilitas($id){
        $data['pk'] = $id;
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/fasilitas/form_fasilitas', $data);
    }

    public function insert_fasilitas(){
        $id_penginapan = $this->request->getPost('id_penginapan');
        $nama = $this->request->getPost('nama');
        $tipe = $this->request->getPost('tipe');
        $harga = $this->request->getPost('harga');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $in_data = [
            'nama_fasilitas' => $nama,
            'jenis_fasilitas' => $tipe,
            'harga_fasilitas' => $harga,
            'deskripsi' => $des,
            'id_penginapan' => $id_penginapan,
        ];

        $this->fasilitas_model->insert_data($in_data);
        
        $id_ob = $this->fasilitas_model->get_id()->id_fasilitas;
        
        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_fasilitas' => $imgs->getClientName(),
                        'id_fasilitas' => $id_ob,
                    ];
                    $this->fasilitas_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/fasilitas', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Fasilitas/table_fasilitas' . '/' . $id_penginapan));

    }

    public function lihat_img($id){
        $data = $this->fasilitas_model->get_nama_img($id);

        // Mengembalikan data gambar sebagai respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function edit_fasilitas($id){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        $data['data'] = $this->fasilitas_model->find($id);
        $data['img'] = $this->fasilitas_model->get_data_img($id);

        return view('admin/fasilitas/edit_fasilitas', $data);
    }

    public function update_fasilitas(){
        $id_penginapan = $this->request->getPost('id_penginapan');
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $tipe = $this->request->getPost('tipe');
        $harga = $this->request->getPost('harga');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $data = [
            'nama_fasilitas' => $nama,
            'jenis_fasilitas' => $tipe,
            'harga_fasilitas' => $harga,
            'deskripsi' => $des,
        ];
        $this->fasilitas_model->update_data($id, $data);

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_fasilitas' => $imgs->getClientName(),
                        'id_fasilitas' => $id,
                    ];
                    $this->fasilitas_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/fasilitas', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Fasilitas/table_fasilitas'). '/' . $id_penginapan);
    }

    public function delete_img($id){ # function untuk menghapus 1 gambar di edit
        $namaimg = $this->fasilitas_model->get_nama_edit($id);
        if (!empty($namaimg)) {
            unlink(ROOTPATH . 'public/fasilitas/' . $namaimg->gambar_fasilitas);
        }
        $this->fasilitas_model->edit_delete($id);
    }

    public function delete_fasilitas($id, $pk){
        $namaid = $this->fasilitas_model->get_nama_img($id);
        
        if (!empty($namaid)) {
            foreach ($namaid as $gambar) {
                $gambarPath = ROOTPATH . 'public/fasilitas/' . $gambar['gambar_fasilitas'];
        
                // Menghapus gambar dari server lokal dan menekan pesan kesalahan jika file tidak ditemukan
                @unlink($gambarPath);
            }
        }
        $this->fasilitas_model->delete_img($id);
        $this->fasilitas_model->delete_data($id);
        return redirect()->to(base_url('Fasilitas/table_fasilitas'. '/' . $pk));
    }
    
}
