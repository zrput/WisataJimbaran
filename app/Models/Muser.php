<?php

namespace App\Models;

use CodeIgniter\Model;

class Muser extends Model
{

    protected $table = 'user';
    protected $primarikey = 'id';
    protected $allowedFields = ['email', 'password', 'username', 'picture', 'role'];

    // Fetch user data by ID as an object
    public function getUserById($id)
    {
        return $this->asObject()->find($id);
    }

    // Update user data
    public function updateUser($id, $data)
    {
        return $this->where('id', $id)->set($data)->update();
    }

    public function data_objek()
    {
        return $this->db->table('objek_wisata')->get()->getResult();
    }

    public function img_objek($id)
    {
        return $this->db->table('gambar_objek_wisata')->select('gambar_objek, id_objek')
            ->where('id_objek', $id)->get()->getFirstRow();
    }

    public function detail_objek($id, $nama)
    {
        return $this->db->table('objek_wisata')->where('id_objek', $id)
            ->where('nama_objek', $nama)->get()->getResult();
    }

    public function all_img_objek($id)
    {
        return $this->db->table('gambar_objek_wisata')->select('gambar_objek, id_objek')
            ->where('id_objek', $id)->get()->getResult();
    }

    // fungsi cari data objek wisata
    public function cari_objek($nama)
    {
        return $this->db->table('objek_wisata')->like('nama_objek', $nama)->get()->getResult();
    }

    // insert komentar objek wisata
    public function komentar_objek($rating, $komen, $tipe, $id, $jenis)
    {
        $data = [
            'rating' => $rating,
            'komen' => $komen,
            'tipe' => $tipe,
            'id_user' => $id,
            'jenis' => $jenis,
        ];

        return $this->db->table('review')->insert($data);
    }

    public function get_komentar_objek($id, $tipe)
    {
        return $this->db->table('review')->join('user', 'user.id = review.id_user')
            ->where('review.jenis', $id)->where('review.tipe', $tipe)->get()->getResult();
    }


    //-------------------------------------------------------------------------------------

    public function data_rekreasi()
    {
        return $this->db->table('rekreasi_wisata')->get()->getResult();
    }

    public function img_rekreasi($id)
    {
        return $this->db->table('gambar_rekreasi_wisata')->select('gambar_rekreasi, id_rekreasi')
            ->where('id_rekreasi', $id)->get()->getFirstRow();
    }

    public function detail_rekreasi($id, $nama)
    {
        return $this->db->table('rekreasi_wisata')->where('id_rekreasi', $id)
            ->where('nama_tempat', $nama)->get()->getResult();
    }

    public function all_img_rekreasi($id)
    {
        return $this->db->table('gambar_rekreasi_wisata')->select('gambar_rekreasi, id_rekreasi')
            ->where('id_rekreasi', $id)->get()->getResult();
    }

    // fungsi cari data 
    public function cari_rekreasi($nama)
    {
        return $this->db->table('rekreasi_wisata')->like('nama_tempat', $nama)->get()->getResult();
    }

    public function get_komentar_rekreasi($id, $tipe)
    {
        return $this->db->table('review')->join('user', 'user.id = review.id_user')
            ->where('review.jenis', $id)->where('review.tipe', $tipe)->get()->getResult();
    }

    //------------------------------------------------------------------------------------------------

    public function data_penginapan()
    {
        return $this->db->table('akomodasi_penginapan')->get()->getResult();
    }

    public function img_penginapan($id)
    {
        return $this->db->table('gambar_akomodasi')->select('gambar_akomodasi, id_penginapan')
            ->where('id_penginapan', $id)->get()->getFirstRow();
    }

    public function detail_penginapan($id, $nama)
    {
        return $this->db->table('akomodasi_penginapan')->where('id_penginapan', $id)
            ->where('nama_penginapan', $nama)->get()->getResult();
    }

    public function all_img_penginapan($id)
    {
        return $this->db->table('gambar_akomodasi')->select('gambar_akomodasi, id_penginapan')
            ->where('id_penginapan', $id)->get()->getResult();
    }

    public function data_fasilitas($id)
    {
        return $this->db->table('fasilitas')
            ->where('id_penginapan', $id)->get()->getResult();
    }

    public function img_fasilitas()
    {
        return $this->db->table('gambar_fasilitas')
            ->join('fasilitas', 'fasilitas.id_fasilitas = gambar_fasilitas.id_fasilitas')
            ->select('gambar_fasilitas.id_gambar, gambar_fasilitas.gambar_fasilitas, gambar_fasilitas.id_fasilitas, fasilitas.id_fasilitas, fasilitas.jenis_fasilitas')
            ->get()->getResult();
    }

    // fungsi cari data
    public function cari_penginapan($nama, $tipe)
    {
        if (!empty($nama) && !empty($tipe)) {
            return $this->db->table('akomodasi_penginapan')->like('nama_penginapan', $nama)
                ->like('tipe_penginapan', $tipe)
                ->get()->getResult();
        }
        if (empty($tipe)) {
            return $this->db->table('akomodasi_penginapan')->like('nama_penginapan', $nama)
                ->get()->getResult();
        }
        if (empty($nama)) {
            return $this->db->table('akomodasi_penginapan')->like('tipe_penginapan', $tipe)
                ->get()->getResult();
        }
    }

    public function get_komentar_penginapan($id, $tipe)
    {
        return $this->db->table('review')->join('user', 'user.id = review.id_user')
            ->where('review.jenis', $id)->where('review.tipe', $tipe)
            ->orderBy('review.id_review', 'DESC')->get()->getResult();
    }

    //------------------------------------------------------------------------------------------------

    public function data_restoran()
    {
        return $this->db->table('restoran')->get()->getResult();
    }

    public function img_restoran($id)
    {
        return $this->db->table('gambar_restoran')->select('gambar_restoran, id_restoran')
            ->where('id_restoran', $id)->get()->getFirstRow();
    }

    // public function detail_restoran($id, $nama)
    // {
    //     return $this->db->table('restoran')->where('id_restoran', $id)
    //         ->where('nama_restoran', $nama)->get()->getResult();
    // }

    public function detail_restoran($id, $nama)
    {
        return $this->db->table('restoran')
            ->where('id_restoran', $id)
            ->where('nama_restoran', $nama)
            ->get()
            ->getRow(); // Use getRow() to fetch a single result
    }

    public function all_img_restoran($id)
    {
        return $this->db->table('gambar_restoran')->select('gambar_restoran, id_restoran')
            ->where('id_restoran', $id)->get()->getResult();
    }

    public function data_menu($id)
    {
        return $this->db->table('menu')->where('id_restoran', $id)->get()->getResult();
    }


    // fungsi cari data 
    public function cari_restoran($nama)
    {
        return $this->db->table('restoran')->like('nama_restoran', $nama)->get()->getResult();
    }


    public function get_komentar_restoran($id, $tipe)
    {
        return $this->db->table('review')->join('user', 'user.id = review.id_user')
            ->where('review.jenis', $id)->where('review.tipe', $tipe)
            ->orderBy('review.id_review', 'DESC')->get()->getResult();
    }

    // Method to insert reservation into reservasi_restoran table
    public function insert_reservation($data)
    {
        // Ensure only allowed fields are inserted into the table
        $reservationModel = new ReservationRestoranModel();
        return $reservationModel->insert($data);
    }
}
