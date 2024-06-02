<?php
namespace App\Models;

use CodeIgniter\model;

class Mmenu extends Model{

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_menu','deskripsi', 'harga_menu','gambar_menu', 'id_restoran', 'jenis_menu'];

    public function insert_data($data){
        return $this->insert($data);
    }

    public function get_nama_img($id){
        return $this->db->table('menu')->select('gambar_menu')->where('id_menu', $id)->get()->getResultArray();
    }

    // fitur edit

    public function update_data($id, $data){
        return $this->update($id, $data);
    }

    // fitur hapus
    public function delete_data($id){
        return $this->where('id_Menu', $id)->delete();
    }

}