<?php

namespace App\Controllers;


class Main_company extends BaseController
{
    public function __construct()
    {
        $this->akomodasi_model = new \App\Models\Makomodasi();
        $this->reservasi_model = new \App\Models\ReservationRestoranModel();
        $this->fasilitas_model = new \App\Models\Mfasilitas();
        $this->restoran_model = new \App\Models\Mrestoran();
        $this->menu_model = new \App\Models\Mmenu();
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

    public function data_company()
    {
        $id_user = $this->request->getPost('id');

        $data['page'] = 'update-data';

        if (session('role') === 'akomodasi') {
            $data['company'] = $this->akomodasi_model->get_company($id_user);
            $data['title'] = 'akomodasi';
            return view('company/data_company', $data);
        } elseif (session('role') === 'restoran') {
            $data['company'] = $this->restoran_model->get_company($id_user);
            $data['title'] = 'restoran';
            return view('company/data_company', $data);
        } else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function get_company($id, $role)
    {
        if ($role == 'akomodasi') {
            $data['company'] = $this->akomodasi_model->get_company($id);
            $id_penginapan = $data['company']->id_penginapan;
            $data['gambar'] = $this->akomodasi_model->get_data_img($id_penginapan);
        } elseif ($role == 'restoran') {
            $data['company'] = $this->restoran_model->get_company($id);
            $id_restoran = $data['company']->id_restoran;
            $data['gambar'] = $this->restoran_model->get_data_img($id_restoran);
        } else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
        return $this->response->setJSON(['data' => $data]);
    }

    public function in_up_akomodasi()
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

    public function in_up_restoran()
    {
        $nama_restoran = $this->request->getPost('nama_restoran');
        $alamat_restoran = $this->request->getPost('alamat_restoran');
        $jam_buka_restoran = $this->request->getPost('jam_buka_restoran');
        $telepon_restoran = $this->request->getPost('telepon_restoran');
        $max_person = $this->request->getPost('max_person');
        $link_peta = $this->request->getPost('link_peta');
        $deskripsi = $this->request->getPost('deskripsiresto');
        $id_user = $this->request->getPost('id_user');

        $files = $this->request->getFiles('img_resto[]');

        $in_data = [
            'nama_restoran' => $nama_restoran,
            'alamat' => $alamat_restoran,
            'jam_buka' => $jam_buka_restoran,
            'telepon' => $telepon_restoran,
            'max_person' => $max_person,
            'peta' => $link_peta,
            'deskripsi' => $deskripsi,
            'id_user' => $id_user,
        ];

        $existcompany = $this->restoran_model->get_check_company($id_user);

        if ($existcompany) {
            $this->restoran_model->update_company($id_user, $in_data);
            $id_ob = $existcompany->id_restoran;
        } else {
            $this->restoran_model->insert_data($in_data);
            $id_ob = $this->restoran_model->get_id()->id_restoran;
        }

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['img_resto'] as $key => $imgs) {
                if (
                    $imgs->isValid() &&
                    in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                    in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)
                ) {
                    $in_img = [
                        'gambar_restoran' => $imgs->getClientName(),
                        'id_restoran' => $id_ob,
                    ];
                    $this->restoran_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/restoran', $imgs->getClientName());
                }
            }
        }
        return $this->response->setJSON(['success' => true]);
    }

    public function delete_image()
    {
        $imageId = $this->request->getPost('id');
        $role = $this->request->getPost('role');

        // Handle image deletion based on role if necessary
        if ($role == 'akomodasi') {
            $result = $this->akomodasi_model->edit_delete($imageId);
        } else if ($role == 'restoran') {
            $result = $this->restoran_model->edit_delete($imageId);
        } else {
            $result = false;
        }

        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }


    public function reservation()
    {
        $id_user = $this->request->getPost('id');
        $existcompany = $this->restoran_model->get_check_company($id_user);
        $data['reservasi'] = $this->reservasi_model->getReservationsResto($existcompany->id_restoran);
        $data['page'] = 'reservation';

        // echo '<pre>';
        // print_r($id_user);
        // echo '</pre>';
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

    function data_fasilitas($id)
    {
        $data['company'] = $this->akomodasi_model->get_company($id);
        $data['fasilitas'] = $this->fasilitas_model->get_fasilitas($data['company']->id_penginapan);
        $data['page'] = 'update-data';

        $data['page'] = 'fasilitas akomodasi';
        if (session('role') === 'akomodasi') {
            $data['title'] = 'akomodasi';
            return view('company/data_fasilitas', $data);
        } else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function add_up_fasilitas()
    {
        $nama = $this->request->getPost('namaFasilitas');
        $harga = $this->request->getPost('harga');
        $tipe = $this->request->getPost('jenisFasilitas');
        $des = $this->request->getPost('deskripsi');
        $id_penginapan = $this->request->getPost('id_penginapan');
        $id_fasilitas = $this->request->getPost('id_fasilitas');
        $id_user = $this->request->getPost('id_user');

        // Proses gambar
        $files = $this->request->getFiles('gambar[]');

        $in_data = [
            'nama_fasilitas' => $nama,
            'jenis_fasilitas' => $tipe,
            'harga_fasilitas' => $harga,
            'deskripsi' => $des,
            'id_penginapan' => $id_penginapan,
        ];

        $existcompany = $this->fasilitas_model->find($id_fasilitas);

        if ($existcompany) {
            $this->fasilitas_model->update_data($id_fasilitas, $in_data);
            $id_ob = $existcompany->id_fasilitas;
        } else {
            $this->fasilitas_model->insert_data($in_data);
            $id_ob = $this->fasilitas_model->get_id()->id_fasilitas;
        }

        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            foreach ($files['gambar'] as $key => $imgs) {
                if (
                    $imgs->isValid() &&
                    in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                    in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)
                ) {
                    $in_img = [
                        'gambar_fasilitas' => $imgs->getClientName(),
                        'id_fasilitas' => $id_ob,
                    ];
                    $this->fasilitas_model->insert_img($in_img);
                    $imgs->move(ROOTPATH . 'public/fasilitas', $imgs->getClientName());
                }
            }
        }

        return redirect()->to(base_url('Main_company/data_fasilitas' . '/' . $id_user));
    }

    public function get_data_fasilitas($id)
    {
        $data['fasilitas'] = $this->fasilitas_model->find($id);
        $data['img'] = $this->fasilitas_model->get_data_img($id);
        return $this->response->setJSON($data);
    }

    public function delete_image_fasilitas($id)
    {
        $namaimg = $this->fasilitas_model->get_nama_edit($id);
        if (!empty($namaimg)) {
            unlink(ROOTPATH . 'public/fasilitas/' . $namaimg->gambar_fasilitas);
        }
        $this->fasilitas_model->edit_delete($id);
        return $this->response->setJSON(['success' => true]);
    }

    public function delete_fasilitas($id)
    {
        $namaid = $this->fasilitas_model->get_nama_img($id);

        if (!empty($namaid)) {
            foreach ($namaid as $gambar) {
                $gambarPath = ROOTPATH . 'public/fasilitas/' . $gambar['gambar_fasilitas'];

                // Menghapus gambar dari server lokal dan menekan pesan kesalahan jika file tidak ditemukan
                @unlink($gambarPath);
            }
        }
        $this->fasilitas_model->delete_img($id);
        $this->fasilitas_model->delete_data($id);
        return $this->response->setJSON(['success' => true]);
    }

    public function delete_company($id, $role)
    {
        if ($role == 'akomodasi') {
            $existcompany = $this->akomodasi_model->get_check_company($id);
            $id_penginapan = $existcompany->id_penginapan;
            $fasilitas = $this->fasilitas_model->get_fasilitas_company($id_penginapan);

            foreach ($fasilitas as $fasilitas1) {
                $namaid = $this->fasilitas_model->get_nama_img($fasilitas1->id_fasilitas);

                if (!empty($namaid)) {
                    foreach ($namaid as $gambar) {
                        $gambarPath = ROOTPATH . 'public/fasilitas/' . $gambar['gambar_fasilitas'];

                        // Menghapus gambar dari server lokal dan menekan pesan kesalahan jika file tidak ditemukan
                        @unlink($gambarPath);
                    }
                }
                $this->fasilitas_model->delete_img($fasilitas1->id_fasilitas);
                $this->fasilitas_model->delete_data($fasilitas1->id_fasilitas);
            }

            $namaid = $this->akomodasi_model->get_nama_img($id_penginapan);

            if (!empty($namaid)) {
                foreach ($namaid as $gambar) {
                    // Menghapus gambar dari server lokal
                    unlink(ROOTPATH . 'public/akomodasi_penginapan/' . $gambar['gambar_akomodasi']);
                }
            }
            $this->akomodasi_model->delete_img($id_penginapan);
            $this->akomodasi_model->delete_data($id_penginapan);

            return $this->response->setJSON(['success' => true]);
        } elseif ($role === 'restoran') {
            $existcompany = $this->restoran_model->get_check_company($id);
            $id_restoran = $existcompany->id_restoran;
            $menu = $this->Mmenu_model->get_menu_company($id_restoran);
        }
        echo "lho";
        // return redirect()->to(base_url('Auth'));
    }

    function data_menu($id)
    {
        $data['company'] = $this->restoran_model->get_company($id);
        $data['menu'] = $this->menu_model->get_menu($data['company']->id_restoran);
        $data['page'] = 'update-data';

        $data['page'] = 'fasilitas akomodasi';
        if (session('role') === 'restoran') {
            $data['title'] = 'restoran';
            return view('company/data_menu', $data);
        } else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function add_up_menu()
    {
        $nama = $this->request->getPost('namaMenu');
        $harga = $this->request->getPost('harga');
        $tipe = $this->request->getPost('jenisMenu');
        $des = $this->request->getPost('deskripsi');
        $id_restoran = $this->request->getPost('id_restoran');
        $id_menu = $this->request->getPost('id_menu');
        $id_user = $this->request->getPost('id_user');

        $files = $this->request->getFiles('gambar');

        $in_data = [
            'nama_menu' => $nama,
            'jenis_menu' => $tipe,
            'harga_menu' => $harga,
            'deskripsi' => $des,
            'id_restoran' => $id_restoran,
        ];

        $existcompany = $this->menu_model->find($id_menu);


        if ($files) {
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (!empty($existcompany->gambar_menu)) {
                unlink(ROOTPATH . 'public/Menu/' . $existcompany->gambar_menu);
            }
            // Hanya menggunakan elemen pertama dari array file
            $imgs = $files['gambar'];
            if (
                $imgs->isValid() &&
                in_array($imgs->getClientMimeType(), $allowedMimeTypes) &&
                in_array(pathinfo($imgs->getClientName(), PATHINFO_EXTENSION), $allowedExtensions)
            ) {
                $in_data['gambar_menu'] = $imgs->getClientName();
                $imgs->move(ROOTPATH . 'public/menu', $imgs->getClientName());
            }
        }


        if ($existcompany) {
            $this->menu_model->update_data($id_menu, $in_data);
        } else {
            $this->menu_model->insert_data($in_data);
        }

        return redirect()->to(base_url('Main_company/data_menu' . '/' . $id_user));
    }

    public function get_data_menu($id)
    {
        $data['menu'] = $this->menu_model->find($id);
        return $this->response->setJSON($data);
    }

    public function delete_menu($id)
    {
        $namaid = $this->menu_model->get_nama_img($id);

        if (!empty($namaid['gambar_menu'])) {
            foreach ($namaid as $gambar) {
                // Menghapus gambar dari server lokal
                unlink(ROOTPATH . 'public/Menu/' . $gambar['gambar_menu']);
            }
        }
        $this->menu_model->delete_data($id);
        return $this->response->setJSON(['success' => true]);
    }
}
