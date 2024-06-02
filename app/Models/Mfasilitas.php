<?php
namespace App\Models;

use CodeIgniter\model;

class Mfasilitas extends Model{

    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_fasilitas','deskripsi', 'harga_fasilitas', 'jenis_fasilitas', 'id_penginapan'];

    public function insert_data($data){
        return $this->insert($data);
    }

    public function get_id(){
        return $this->select('id_fasilitas')->orderBy('id_fasilitas', 'desc')->first();
    }

    public function insert_img($data){
        return $this->db->table('gambar_fasilitas')->insert($data);
    }

    public function get_nama_img($id){
        return $this->db->table('gambar_fasilitas')->select('gambar_fasilitas')->where('id_fasilitas', $id)->get()->getResultArray();
    }

    // fitur edit
    public function get_data_img($id){
        return $this->db->table('gambar_fasilitas')->where('id_fasilitas', $id)->get()->getResult();
        
    }

    public function get_nama_edit($id){ // function untuk menghapus 1 gambar pada menu edit 
        return $this->db->table('gambar_fasilitas')->select('gambar_fasilitas')->where('id_gambar', $id)->get()->getRow();
    }

    public function edit_delete($id){
        return $this->db->table('gambar_fasilitas')->where('id_gambar', $id)->delete();
    }

    public function update_data($id, $data){
        return $this->update($id, $data);
    }

    // fitur hapus
    public function delete_data($id){
        return $this->where('id_fasilitas', $id)->delete();
    }

    public function delete_img($id){
        return $this->db->table('gambar_fasilitas')->where('id_fasilitas', $id)->delete();
    }
}