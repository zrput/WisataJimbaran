<?php

namespace App\Controllers;

class User extends BaseController
{
    
    public function __construct()
    {
        $this->user_model = new \App\Models\Muser();
    }
    
    public function index(){
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        return view('user/landing_page', $data);
    }
    

    public function main(){
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        return view('user/landing_page', $data);
    }


    public function objek_wisata(){
        $data['data'] = $this->user_model->data_objek();
        $data['title'] = "Objek Wisata";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $objek) {
            $gambarObjek = $this->user_model->img_objek($objek->id_objek);
            if ($gambarObjek) {
                $data['gambarData'][$objek->id_objek] = $gambarObjek->gambar_objek;
            }
        }
        return view('user/objek_wisata', $data);

    }

    public function cari_objek(){
        $nama = $this->request->getPost('cari');
        $data['data'] = $this->user_model->cari_objek($nama);
        $data['title'] = "Objek Wisata";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $objek) {
            $gambarObjek = $this->user_model->img_objek($objek->id_objek);
            if ($gambarObjek) {
                $data['gambarData'][$objek->id_objek] = $gambarObjek->gambar_objek;
            }
        }
        return view('user/objek_wisata', $data);

    }

    public function detail_objek($id, $nama){
        $tipe = "objek";
        $data['data'] = $this->user_model->detail_objek($id, $nama);
        $data['img'] = $this->user_model->all_img_objek($id);
        $data['imgs'] = $this->user_model->img_objek($id);
        $data['komentar'] = $this->user_model->get_komentar_objek($id, $tipe);
        $data['title'] = "Objek Wisata";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');

        $data['rata'] = $this->rata_rating($data['komentar']);
        $data['bar'] = $this->count_bar($data['komentar']);
        // var_dump($data['komentar']);
        // die();
        return view('user/detail_objek', $data);
    }

    public function data_review(){
        $id = $this->request->getPost('id');
        $rating = $this->request->getPost('rating');
        $komen = $this->request->getPost('komentar');
        $tipe = $this->request->getPost('tipe');
        $jenis = $this->request->getPost('jenis');
        $nama = $this->request->getPost('nama');

        $data = [
            'komen' => $komen,
            'tipe' => $tipe,
            'rating' => $rating,
            'id_user' => $id,
            'jenis' => $jenis,
        ];

        $this->user_model->komentar_objek($rating, $komen, $tipe, $id, $jenis);
        return redirect()->to(base_url('User/detail_objek'). '/' . $jenis. '/' . $nama);

    }


    //------------------------------------------------------------------------------------

    public function rekreasi_wisata(){
        $data['data'] = $this->user_model->data_rekreasi();
        $data['title'] = "Rekreasi Wisata";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $rekreasi) {
            $gambarRekreasi = $this->user_model->img_rekreasi($rekreasi->id_rekreasi);
            if ($gambarRekreasi) {
                $data['gambarData'][$rekreasi->id_rekreasi] = $gambarRekreasi->gambar_rekreasi;
            }
        }
    
        return view('user/rekreasi_wisata', $data);

    }

    public function cari_rekreasi(){
        $nama = $this->request->getPost('cari');
        $data['data'] = $this->user_model->cari_rekreasi($nama);
        $data['title'] = "Rekreasi Wisata";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $rekreasi) {
            $gambarRekreasi = $this->user_model->img_rekreasi($rekreasi->id_rekreasi);
            if ($gambarRekreasi) {
                $data['gambarData'][$rekreasi->id_rekreasi] = $gambarRekreasi->gambar_rekreasi;
            }
        }
        return view('user/rekreasi_wisata', $data);

    }

    public function detail_rekreasi($id, $nama){
        $tipe = "rekreasi";
        $data['data'] = $this->user_model->detail_rekreasi($id, $nama);
        $data['img'] = $this->user_model->all_img_rekreasi($id);
        $data['imgs'] = $this->user_model->img_rekreasi($id);
        $data['komentar'] = $this->user_model->get_komentar_rekreasi($id, $tipe);
        $data['title'] = "Rekreasi Wisata";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');

        $data['rata'] = $this->rata_rating($data['komentar']);
        $data['bar'] = $this->count_bar($data['komentar']);

        return view('user/detail_rekreasi', $data);
    }

    public function data_review_rekreasi(){
        $id = $this->request->getPost('id');
        $rating = $this->request->getPost('rating');
        $komen = $this->request->getPost('komentar');
        $tipe = $this->request->getPost('tipe');
        $jenis = $this->request->getPost('jenis');
        $nama = $this->request->getPost('nama');

        $data = [
            'komen' => $komen,
            'tipe' => $tipe,
            'rating' => $rating,
            'id_user' => $id,
            'jenis' => $jenis,
        ];

        $this->user_model->komentar_objek($rating, $komen, $tipe, $id, $jenis);
        return redirect()->to(base_url('User/detail_rekreasi'). '/' . $jenis. '/' . $nama);

    }

    //------------------------------------------------------------------------------------------------

    public function akomodasi_penginapan(){
        $data['data'] = $this->user_model->data_penginapan();
        $data['title'] = "Akomodasi Penginapan";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $penginapan) {
            $gambarPenginapan = $this->user_model->img_penginapan($penginapan->id_penginapan);
            if ($gambarPenginapan) {
                $data['gambarData'][$penginapan->id_penginapan] = $gambarPenginapan->gambar_akomodasi;
            }
        }
        return view('user/penginapan', $data);
    }

    public function cari_penginapan(){
        $nama = $this->request->getPost('nama');
        $tipe = $this->request->getPost('tipe');
        $data['data'] = $this->user_model->cari_penginapan($nama, $tipe);
        $data['title'] = "Akomodasi Penginapan";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $penginapan) {
            $gambarPenginapan = $this->user_model->img_penginapan($penginapan->id_penginapan);
            if ($gambarPenginapan) {
                $data['gambarData'][$penginapan->id_penginapan] = $gambarPenginapan->gambar_akomodasi;
            }
        }
        return view('user/penginapan', $data);
    }

    public function detail_penginapan($id, $nama){
        $tipe = "penginapan";
        $data['data'] = $this->user_model->detail_penginapan($id, $nama);
        $data['img'] = $this->user_model->all_img_penginapan($id);
        $data['imgs'] = $this->user_model->img_penginapan($id);
        $data['komentar'] = $this->user_model->get_komentar_penginapan($id, $tipe);
        $data['fasilitas'] = $this->user_model->data_fasilitas($id);
        foreach ($data['fasilitas'] as $fasilitas_item) {
            $data['img_fasilitas'] = $this->user_model->img_fasilitas($fasilitas_item->id_fasilitas); 
        }
        $data['title'] = "Akomodasi Penginapan";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        
        $data['rata'] = $this->rata_rating($data['komentar']);
        $data['bar'] = $this->count_bar($data['komentar']);

        
        // echo "<pre>";
        // print_r ($data['bar']);
        // echo "</pre>";
        // die;
        return view('user/detail_penginapan', $data);
    }

    public function data_review_penginapan(){
        $id = $this->request->getPost('id');
        $rating = $this->request->getPost('rating');
        $komen = $this->request->getPost('komentar');
        $tipe = $this->request->getPost('tipe');
        $jenis = $this->request->getPost('jenis');
        $nama = $this->request->getPost('nama');

        $data = [
            'komen' => $komen,
            'tipe' => $tipe,
            'rating' => $rating,
            'id_user' => $id,
            'jenis' => $jenis,
        ];

        $this->user_model->komentar_objek($rating, $komen, $tipe, $id, $jenis);
        return redirect()->to(base_url('User/detail_penginapan'). '/' . $jenis. '/' . $nama);

    }

    //------------------------------------------------------------------------------------------------

    public function restoran(){
        $data['data'] = $this->user_model->data_restoran();
        $data['title'] = "Restoran";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $restoran) {
            $gambarRestoran = $this->user_model->img_restoran($restoran->id_restoran);
            if ($gambarRestoran) {
                $data['gambarData'][$restoran->id_restoran] = $gambarRestoran->gambar_restoran;
            }
        }
        return view('user/restoran', $data);
    }

    public function cari_restoran(){
        $nama = $this->request->getPost('nama');
        $data['data'] = $this->user_model->cari_restoran($nama);
        $data['title'] = "Restoran";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        $data['gambarData'] = [];

        foreach ($data['data'] as $restoran) {
            $gambarRestoran = $this->user_model->img_restoran($restoran->id_restoran);
            if ($gambarRestoran) {
                $data['gambarData'][$restoran->id_restoran] = $gambarRestoran->gambar_restoran;
            }
        }
        return view('user/restoran', $data);
    }

    public function detail_restoran($id, $nama){
        $tipe = "restoran";
        $data['data'] = $this->user_model->detail_restoran($id, $nama);
        $data['img'] = $this->user_model->all_img_restoran($id);
        $data['imgs'] = $this->user_model->img_restoran($id);
        $data['komentar'] = $this->user_model->get_komentar_restoran($id, $tipe);
        $data['menu'] = $this->user_model->data_menu($id);

        $data['title'] = "Restoran";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');

        $data['rata'] = $this->rata_rating($data['komentar']);
        $data['bar'] = $this->count_bar($data['komentar']);
        // var_dump($data['menu']);
        // die();
        return view('user/detail_restoran', $data);
    }

    public function data_review_restoran(){
        $id = $this->request->getPost('id');
        $rating = $this->request->getPost('rating');
        $komen = $this->request->getPost('komentar');
        $tipe = $this->request->getPost('tipe');
        $jenis = $this->request->getPost('jenis');
        $nama = $this->request->getPost('nama');

        $data = [
            'komen' => $komen,
            'tipe' => $tipe,
            'rating' => $rating,
            'id_user' => $id,
            'jenis' => $jenis,
        ];

        $this->user_model->komentar_objek($rating, $komen, $tipe, $id, $jenis);
        return redirect()->to(base_url('User/detail_restoran'). '/' . $jenis. '/' . $nama);

    }


    #--------------------------------------------------------------------------------------------------------------------
    #global function
    public function rata_rating($rating){
        $totalrating = 0;
        $n = 0;

        foreach ($rating as $item) {
             $totalrating += $item->rating;
             $n++;
        }

        if ($n > 0 ){
            $rata = $totalrating / $n;
        } else {
            $rata = 0;
        }
        $format_rata = number_format($rata, 1);
        return $format_rata;
    }

    public function count_bar($rating){
        $stara = 0;
        $starb = 0;
        $starc = 0;
        $stard = 0;
        $stare = 0;
        foreach ($rating as $count) {
            if ($count->rating == 5){
                $stara += 1;
            }elseif ($count->rating == 4){
                $starb += 1;
            }elseif ($count->rating == 3){
                $starc += 1;
            }elseif ($count->rating == 2){
                $stard += 1;
            }elseif ($count->rating == 1){
                $stare += 1;
            }
        }
        $result = [
            'rating5' => $stara,
            'rating4' => $starb,
            'rating3' => $starc,
            'rating2' => $stard,
            'rating1' => $stare,
        ];

        return $result;
    }


}
