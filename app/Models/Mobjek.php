<?php
namespace App\Models;

use CodeIgniter\model;

 class Mobjek extends Model{
    protected $table = 'objek_wisata';
    protected $primaryKey = 'id_objek';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_objek', 'alamat', 'peta', 'deskripsi'];

    public function insert_data($data){
        return $this->db->table('objek_wisata')->insert($data);
    }

    public function insert_img($data){
        return $this->db->table('gambar_objek_wisata')->insert($data);
    }

    public function get_id(){
        return $this->select('id_objek')->orderBy('id_objek', 'desc')->first();
    }


    // fitur edit
    public function get_data_img($id){
        return $this->db->table('gambar_objek_wisata')->where('id_objek', $id)->get()->getResult();
        
    }

    public function get_nama_edit($id){
        return $this->db->table('gambar_objek_wisata')->select('gambar_objek')->where('id_gambar', $id)->get()->getRow();
    }

    public function edit_delete($id){
        return $this->db->table('gambar_objek_wisata')->where('id_gambar', $id)->delete();
    }

    public function update_data($id, $data){
        return $this->update($id, $data);
    }


    // fitur hapus
    public function delete_data($id){
        return $this->where('id_objek', $id)->delete();
    }

    public function delete_img($id){
        return $this->db->table('gambar_objek_wisata')->where('id_objek', $id)->delete();
    }

    public function get_nama_img($id){
        return $this->db->table('gambar_objek_wisata')->select('gambar_objek')->where('id_objek', $id)->get()->getResultArray();
    }

 }
