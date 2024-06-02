<?php

namespace App\Controllers;

class Menu extends BaseController
{

    
    public function __construct()
    {
        $this->Menu_model = new \App\Models\Mmenu();
    }

    public function table_Menu($id){
        $query = $this->Menu_model->where('id_restoran', $id)->get();
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
        return view('admin/menu/table_menu', $data);

    }

    public function form_Menu($id){
        $data['pk'] = $id;
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/Menu/form_Menu', $data);
    }

    public function insert_menu(){
        $id_restoran = $this->request->getPost('id_restoran');
        $nama = $this->request->getPost('nama');
        $jenis = $this->request->getPost('tipe');
        $harga = $this->request->getPost('harga');
        $des = $this->request->getPost('des');
        
        $files = $this->request->getFiles('img');
        $data = [
            'nama_menu' => $nama,
            'jenis_menu' => $jenis,
            'harga_menu' => $harga,
            'deskripsi' => $des,
            'id_restoran' => $id_restoran,
        ];

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
        
            // Hanya menggunakan elemen pertama dari array file
            $imgs = $files['img'];
            if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $data['gambar_menu'] = $imgs->getClientName();
                    $imgs->move(ROOTPATH . 'public/menu', $imgs->getClientName());
                }
            }

            $this->Menu_model->insert_data($data);
        return redirect()->to(base_url('Menu/table_Menu' . '/' . $id_restoran));

    }

    public function lihat_img($id){
        $data = $this->Menu_model->get_nama_img($id);

        // Mengembalikan data gambar sebagai respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function edit_Menu($id){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        $data['data'] = $this->Menu_model->find($id);
        $data['img'] = $this->Menu_model->get_nama_img($id);

        return view('admin/Menu/edit_Menu', $data);
    }

    public function update_Menu(){
        $id_restoran = $this->request->getPost('id_restoran');
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $jenis = $this->request->getPost('tipe');
        $harga = $this->request->getPost('harga');
        $des = $this->request->getPost('des');
        
        $files = $this->request->getFiles('img');

        $data = [
            'nama_menu' => $nama,
            'jenis_menu' => $jenis,
            'harga_menu' => $harga,
            'deskripsi' => $des,
            'id_restoran' => $id_restoran,
        ];

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
        
            // Hanya menggunakan elemen pertama dari array file
            $imgs = $files['img'];
            if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $data['gambar_menu'] = $imgs->getClientName();
                    $imgs->move(ROOTPATH . 'public/menu', $imgs->getClientName());
                }
        }

        $this->Menu_model->update_data($id, $data);
        return redirect()->to(base_url('Menu/table_Menu'). '/' . $id_restoran);
    }

    public function delete_img($id){ # function untuk menghapus 1 gambar di edit
        $namaimg = $this->Menu_model->get_nama_edit($id);
        if (!empty($namaimg)) {
            unlink(ROOTPATH . 'public/Menu/' . $namaimg->gambar_Menu);
        }
        $this->Menu_model->edit_delete($id);
    }

    public function delete_Menu($id, $pk){
        $namaid = $this->Menu_model->get_nama_img($id);
        
        if (!empty($namaid['gambar_menu'])) {
            foreach ($namaid as $gambar) {
                // Menghapus gambar dari server lokal
                unlink(ROOTPATH . 'public/Menu/' . $gambar['gambar_menu']);
            }
        }
        $this->Menu_model->delete_data($id);
        return redirect()->to(base_url('Menu/table_Menu'. '/' . $pk));
    }
    
}
