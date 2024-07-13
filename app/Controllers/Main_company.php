<?php

namespace App\Controllers;


class Main_company extends BaseController
{
    public function __construct()
    {
        $this->akomodasi_model = new \App\Models\Makomodasi();
        $this->reservasi_model = new \App\Models\ReservationRestoranModel();
    }
    public function index()
    {
        $data['page'] = 'dashboard';

        if (session('role') === 'akomodasi') {
            $data['title'] = 'akomodasi';
            return view('company/dashboard', $data);
        } elseif (session('role') === 'restoran') {
            $data['title'] = 'restoran';
            return view('company/dashboard', $data);
        } else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function form_company()
    {
        $data['page'] = 'update-data';

        if (session('role') === 'akomodasi') {
            $data['title'] = 'akomodasi';
            return view('company/form_company', $data);
        } elseif (session('role') === 'restoran') {
            $data['title'] = 'restoran';
            return view('company/form_company', $data);
        } else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function get_company($id)
    {
        $data['company'] = $this->akomodasi_model->get_company($id);
        $id_penginapan = $data['company']->id_penginapan;
        $data['gambar'] = $this->akomodasi_model->get_data_img($id_penginapan);
        // echo '<pre>';
        // print_r($data['company']);
        // echo '</pre>';
        // die;
        return $this->response->setJSON(['data' => $data]);
    }

    public function in_up_company()
    {
        $nama = $this->request->getPost('nama_penginapan');
        $tipe = $this->request->getPost('tipe_penginapan');
        $alamat = $this->request->getPost('alamat_penginapan');
        $min = $this->request->getPost('harga_termurah');
        $email = $this->request->getPost('email_penginapan');
        $nomor = $this->request->getPost('telepon_penginapan');
        $peta = $this->request->getPost('link_peta');
        $des = $this->request->getPost('deskripsi');
        $in = $this->request->getPost('checkin_time');
        $out = $this->request->getPost('checkout_time');
        $id_user = $this->request->getPost('id_user');

        $files = $this->request->getFiles('img[]');

        $in_data = [
            'nama_penginapan' => $nama,
            'tipe_penginapan' => $tipe,
            'alamat' => $alamat,
            'min' => $min,
            'email' => $email,
            'telepon' => $nomor,
            'peta' => $peta,
            'deskripsi' => $des,
            'check_in' => $in,
            'check_out' => $out,
            'id_user' => $id_user,
        ];

        $existcompany = $this->akomodasi_model->get_check_company($id_user);

        if ($existcompany) {
            $this->akomodasi_model->update_company($id_user, $in_data);
            $id_ob = $existcompany->id_penginapan;
        } else {
            $this->akomodasi_model->insert_data($in_data);
            $id_ob = $this->akomodasi_model->get_id()->id_penginapan;
        }

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img'] as $key => $imgs) {
                if (
                    $imgs->isValid() &&
                    in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                    in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)
                ) {
                    $in_img = [
                        'gambar_akomodasi' => $imgs->getClientName(),
                        'id_penginapan' => $id_ob,
                    ];
                    $this->akomodasi_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/akomodasi_penginapan', $imgs->getClientName());
                }
            }
        }
        
        return $this->response->setJSON(['success' => true]);
    }

    public function reservation($id)
    {
        $data['reservasi'] = $this->reservasi_model->getReservationsResto($id);
        $data['page'] = 'reservation';
        // var_dump($data['reservasi']);
        // die;
        if (session('role') === 'akomodasi') {
            $data['title'] = 'akomodasi';
            return view('company/dashboard', $data);
        } elseif (session('role') === 'restoran') {
            $data['title'] = 'restoran';
            return view('company/restoran_reservation', $data);
        } else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }
}
