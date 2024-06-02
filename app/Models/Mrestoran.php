<?php

namespace App\Models;

use CodeIgniter\Model;

class Mrestoran extends Model
{
    protected $table = 'restoran';
    protected $primaryKey = 'id_restoran';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_restoran', 'alamat', 'jam_buka', 'telepon', 'peta', 'deskripsi'];

    public function insert_data($data){
        return $this->insert($data);
    }

    public function get_id(){
        return $this->select('id_restoran')->orderBy('id_restoran', 'desc')->first();
    }

    public function insert_img($data){
        return $this->db->table('gambar_restoran')->insert($data);
    }

    public function get_nama_img($id){
        return $this->db->table('gambar_restoran')->select('gambar_restoran')->where('id_restoran', $id)->get()->getResultArray();
    }

    // fitur edit
    public function get_data_img($id){
        return $this->db->table('gambar_restoran')->where('id_restoran', $id)->get()->getResult();
        
    }

    public function get_nama_edit($id){ // function untuk menghapus 1 gambar pada menu edit 
        return $this->db->table('gambar_restoran')->select('gambar_restoran')->where('id_gambar', $id)->get()->getRow();
    }

    public function edit_delete($id){
        return $this->db->table('gambar_restoran')->where('id_gambar', $id)->delete();
    }

    public function update_data($id, $data){
        return $this->update($id, $data);
    }


    // fitur hapus
    public function delete_data($id){
        return $this->where('id_restoran', $id)->delete();
    }

    public function delete_img($id){
        return $this->db->table('gambar_restoran')->where('id_restoran', $id)->delete();
    }

}
