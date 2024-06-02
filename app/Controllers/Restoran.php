<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Restoran extends BaseController
{
    public function __construct()
    {
        $this->restoran_model = new \App\Models\Mrestoran();
    }
    

    public function table_restoran(){
        $data['data'] = $this->restoran_model->findAll();
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/restoran/table_restoran', $data);
    }

    public function lihat_img($id){
        $data = $this->restoran_model->get_nama_img($id);

        // Mengembalikan data gambar sebagai respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    # insert data
    public function form_restoran(){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/restoran/form_restoran', $data);
    }

    public function insert_restoran(){
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $jam = $this->request->getPost('jam');
        $telepon = $this->request->getPost('telepon');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $in_data = [
            'nama_restoran' => $nama,
            'alamat' => $alamat,
            'jam_buka' => $jam,
            'telepon' => $telepon,
            'peta' => $peta,
            'deskripsi' => $des,
        ];
        $this->restoran_model->insert_data($in_data);
        
        $id_ob = $this->restoran_model->get_id()->id_restoran;
        
        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_restoran' => $imgs->getClientName(),
                        'id_restoran' => $id_ob,
                    ];
                    $this->restoran_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/restoran', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Restoran/table_restoran'));

    }

    #edit data
    public function edit_restoran($id){
        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        $data['data'] = $this->restoran_model->find($id);
        $data['img'] = $this->restoran_model->get_data_img($id);
        return view('admin/restoran/edit_restoran', $data);
    }

    public function delete_img($id){ # function untuk menghapus 1 gambar di edit
        $namaimg = $this->restoran_model->get_nama_edit($id);
        if (!empty($namaimg)) {
            unlink(ROOTPATH . 'public/restoran/' . $namaimg->gambar_restoran);
        }
        $this->restoran_model->edit_delete($id);
    }

    public function update_restoran(){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $jam = $this->request->getPost('jam');
        $telepon = $this->request->getPost('telepon');
        $peta = $this->request->getPost('peta');
        $des = $this->request->getPost('des');

        $files = $this->request->getFiles('img[]');

        $data = [
            'nama_restoran' => $nama,
            'alamat' => $alamat,
            'jam_buka' => $jam,
            'telepon' => $telepon,
            'peta' => $peta,
            'deskripsi' => $des,
        ];
        $this->restoran_model->update_data($id, $data);

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if ($imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)) {
                    $in_img = [
                        'gambar_restoran' => $imgs->getClientName(),
                        'id_restoran' => $id,
                    ];
                    $this->restoran_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/restoran', $imgs->getClientName());
                }
                
            }
        }
        return redirect()->to(base_url('Restoran/table_restoran'));
    }


    public function delete_restoran($id){
        $namaid = $this->restoran_model->get_nama_img($id);
        
        if (!empty($namaid)) {
            foreach ($namaid as $gambar) {
                // Menghapus gambar dari server lokal
                unlink(ROOTPATH . 'public/restoran/' . $gambar['gambar_restoran']);
            }
        }
        $this->restoran_model->delete_img($id);
        $this->restoran_model->delete_data($id);
        return redirect()->to(base_url('Restoran/table_restoran'));
    }

}
