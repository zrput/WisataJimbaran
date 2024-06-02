<?php
namespace App\Models;

use CodeIgniter\model;

class Mrekreasi extends Model{

    protected $table = 'rekreasi_wisata';
    protected $primaryKey = 'id_rekreasi';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_tempat', 'alamat', 'jam_operasi', 'biaya_masuk', 'peta', 'deskripsi'];

    public function insert_data($data){
        return $this->insert($data);
    }

    public function get_id(){
        return $this->select('id_rekreasi')->orderBy('id_rekreasi', 'desc')->first();
    }

    public function insert_img($data){
        return $this->db->table('gambar_rekreasi_wisata')->insert($data);
    }

    public function get_nama_img($id){
        return $this->db->table('gambar_rekreasi_wisata')->select('gambar_rekreasi')->where('id_rekreasi', $id)->get()->getResultArray();
    }

    // fitur edit
    public function get_data_img($id){
        return $this->db->table('gambar_rekreasi_wisata')->where('id_rekreasi', $id)->get()->getResult();
        
    }

    public function get_nama_edit($id){ // function untuk menghapus 1 gambar pada menu edit 
        return $this->db->table('gambar_rekreasi_wisata')->select('gambar_rekreasi')->where('id_gambar', $id)->get()->getRow();
    }

    public function edit_delete($id){
        return $this->db->table('gambar_rekreasi_wisata')->where('id_gambar', $id)->delete();
    }

    public function update_data($id, $data){
        return $this->update($id, $data);
    }


    // fitur hapus
    public function delete_data($id){
        return $this->where('id_rekreasi', $id)->delete();
    }

    public function delete_img($id){
        return $this->db->table('gambar_rekreasi_wisata')->where('id_rekreasi', $id)->delete();
    }
}