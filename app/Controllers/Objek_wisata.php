<?php

namespace App\Controllers;

class Objek_wisata extends BaseController
{
    
    public function __construct()
    {
        $this->objek_model = new \App\Models\Mobjek();
    }

    public function table_objek() {
        $data['data'] = $this->objek_model->findAll();
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/objek_wisata/table_objek', $data);
    }

    public function form_objek(): string{
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/objek_wisata/form_objek', $data);
    }

    public function edit_objek($id){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        $data['data'] = $this->objek_model->find($id);
        $data['img'] = $this->objek_model->get_data_img($id);
        return view('admin/objek_wisata/edit_objek', $data);
    }

    public function insert_objek(){
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $in_data = [
            'nama_objek' => $nama,
            'alamat' => $alamat,
            'peta' => $peta,
            'deskripsi' => $des,
        ];
        $this->objek_model->insert_data($in_data);
        
        $id_ob = $this->objek_model->get_id()->id_objek;
        
        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_objek' => $imgs->getClientName(),
                        'id_objek' => $id_ob,
                    ];
                    $this->objek_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/objek_wisata', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Objek_wisata/table_objek'));

    }

    public function update_objek(){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $data = [
            'nama_objek' => $nama,
            'alamat' => $alamat,
            'peta' => $peta,
            'deskripsi' => $des,
        ];
        $this->objek_model->update_data($id, $data);

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_objek' => $imgs->getClientName(),
                        'id_objek' => $id,
                    ];
                    $this->objek_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/objek_wisata', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Objek_wisata/table_objek'));
    }

    public function delete_objek($id){
        $namaid = $this->objek_model->get_nama_img($id);
        if (!empty($namaid)) {
            foreach ($namaid as $gambar) {
                if (is_object($gambar)) {
                    // Jika $gambar adalah objek, dapatkan properti 'gambar_objek'
                    $gambar_objek = $gambar->gambar_objek;
                } elseif (is_array($gambar)) {
                    // Jika $gambar adalah array, dapatkan elemen dengan kunci 'gambar_objek'
                    $gambar_objek = $gambar['gambar_objek'];
                }
                // Menghapus gambar dari server lokal
                unlink(ROOTPATH . 'public/objek_wisata/' . $gambar_objek);
            }
        }
        $this->objek_model->delete_img($id);
        $this->objek_model->delete_data($id);
        return redirect()->to(base_url('Objek_wisata/table_objek'));
    }

    public function delete_img($id){
        $namaimg = $this->objek_model->get_nama_edit($id);
        if (!empty($namaimg)) {
            unlink(ROOTPATH . 'public/objek_wisata/' . $namaimg->gambar_objek);
        }
        $this->objek_model->edit_delete($id);
    }

    public function lihat_img($id){
        $data = $this->objek_model->get_nama_img($id);

        // Mengembalikan data gambar sebagai respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }


}
