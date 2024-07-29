<?php

namespace App\Controllers;

use App\Models\ReservationRestoranModel;

class User extends BaseController
{
    protected $reservationRestoranModel;
    protected $user_model;
    public function __construct()
    {
        $this->user_model = new \App\Models\Muser();
        $this->reservationRestoranModel = new \App\Models\ReservationRestoranModel();
    }

    public function index()
    {
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        return view('user/landing_page', $data);
    }


    public function main()
    {
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        return view('user/landing_page', $data);
    }


    public function objek_wisata()
    {
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

    public function cari_objek()
    {
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

    public function detail_objek($id, $nama)
    {
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

    public function data_review()
    {
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
        return redirect()->to(base_url('User/detail_objek') . '/' . $jenis . '/' . $nama);
    }


    //------------------------------------------------------------------------------------

    public function rekreasi_wisata()
    {
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

    public function cari_rekreasi()
    {
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

    public function detail_rekreasi($id, $nama)
    {
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

    public function data_review_rekreasi()
    {
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
        return redirect()->to(base_url('User/detail_rekreasi') . '/' . $jenis . '/' . $nama);
    }

    //------------------------------------------------------------------------------------------------

    public function akomodasi_penginapan()
    {
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

    public function cari_penginapan()
    {
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

    public function detail_penginapan($id, $nama)
    {
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

    public function data_review_penginapan()
    {
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
        return redirect()->to(base_url('User/detail_penginapan') . '/' . $jenis . '/' . $nama);
    }

    //------------------------------------------------------------------------------------------------

    public function restoran()
    {
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

    public function cari_restoran()
    {
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

    // public function detail_restoran($id, $nama)
    // {
    //     $tipe = "restoran";
    //     $data['data'] = $this->user_model->detail_restoran($id, $nama);
    //     $data['img'] = $this->user_model->all_img_restoran($id);
    //     $data['imgs'] = $this->user_model->img_restoran($id);
    //     $data['komentar'] = $this->user_model->get_komentar_restoran($id, $tipe);
    //     $data['menu'] = $this->user_model->data_menu($id);

    //     $data['title'] = "Restoran";
    //     $data['header'] = view('user/header');
    //     $data['footer'] = view('user/footer');

    //     $data['rata'] = $this->rata_rating($data['komentar']);
    //     $data['bar'] = $this->count_bar($data['komentar']);
    //     // var_dump($data['menu']);
    //     // die();
    //     return view('user/detail_restoran', $data);
    // }

    // In User.php (Controller)
    public function detail_restoran($id, $nama)
    {
        $tipe = "restoran";
        $data['restoran'] = $this->user_model->detail_restoran($id, $nama);

        if (!$data['restoran']) {
            // Handle case where no restaurant is found
            return redirect()->to(base_url('somewhere'))->with('error', 'Restaurant not found.');
        }

        $data['img'] = $this->user_model->all_img_restoran($id);
        $data['imgs'] = $this->user_model->img_restoran($id);
        $data['komentar'] = $this->user_model->get_komentar_restoran($id, $tipe);
        $data['menu'] = $this->user_model->data_menu($id);

        $data['title'] = "Restoran";
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');

        $data['rata'] = $this->rata_rating($data['komentar']);
        $data['bar'] = $this->count_bar($data['komentar']);

        // Pass id_restoran and nama_restoran to the view
        $data['id_restoran'] = $data['restoran']->id_restoran;
        $data['nama_restoran'] = $data['restoran']->nama_restoran;

        // Pass the entire restoran data to the view
        $data['data'] = $data['restoran'];

        // Hitung sisa orang reservasi yang bisa ditampung restoran
        $data['person'] = $this->reservationRestoranModel->getperson($id, $nama);

        $totalperson = 0;

        foreach ($data['person'] as $person) {
            $totalperson += $person->jumlahorang;
        }
        $data['totalperson'] = $totalperson;
        $data['aviperson'] = $data['restoran']->max_person - $totalperson;

        // echo "<pre>";
        // print_r($data['aviperson']);
        // echo "</pre>";
        // die;
        return view('user/detail_restoran', $data);
    }

    public function data_review_restoran()
    {
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
        return redirect()->to(base_url('User/detail_restoran') . '/' . $jenis . '/' . $nama);
    }

    public function paymidtrans()
    {

        $userId = session()->get('id');

        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $nomortelepon = $this->request->getPost('nomortelepon');
        $tanggal = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');
        $jumlahorang = $this->request->getPost('jumlahorang');
        $catatan = $this->request->getPost('catatan');
        $id_restoran = $this->request->getPost('id_restoran');
        $nama_restoran = $this->request->getPost('nama_restoran');

        // Prepare data for insertion
        $data = [
            'nama' => $nama,
            'email' => $email,
            'nomortelepon' => $nomortelepon,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'jumlahorang' => $jumlahorang,
            'catatan' => $catatan,
            'user_id' => $userId,
            'nama_restoran' => $nama_restoran,
            'id_restoran' => $id_restoran,
        ];

        $username = session('username');
        $usertlp = $nomortelepon;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = getenv('serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $items = [
            [
                'id' => 'item1',
                'price' => 20000,
                'quantity' => 1,
                'name' => "reservasi meja untuk $jumlahorang orang"
            ]
        ];

        // Populate customer's info
        $customer_details = array(
            'first_name' => $nama,
            'email' => $email,
            'address' => "Karet Belakang 15A, Setiabudi",
            'phone' => $nomortelepon,
        );
        $order_id = uniqid('order-');
        // $gross_amount = 1000 * $jumlahorang; 
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => 10000,

            ),
            'item_details' => $items,
            'customer_details' => $customer_details
        );

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $json = [
                'nama' => $nama,
                'email' => $email,
                'nomortelepon' => $nomortelepon,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'jumlahorang' => $jumlahorang,
                'catatan' => $catatan,
                'user_id' => $userId,
                'nama_restoran' => $nama_restoran,
                'id_restoran' => $id_restoran,
                'snapToken' => $snapToken,
            ];
            echo json_encode($json);
        } catch (\Exception $e) {
            // Handle errors gracefully
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function finishmidtrans()
    {

        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $nomortelepon = $this->request->getPost('nomortelepon');
        $tanggal = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');
        $jumlahorang = $this->request->getPost('jumlahorang');
        $catatan = $this->request->getPost('catatan');
        $id_restoran = $this->request->getPost('id_restoran');
        $nama_restoran = $this->request->getPost('nama_restoran');
        $user_id = $this->request->getPost('user_id');
        $order_id = $this->request->getPost('order_id');
        $payment_type = $this->request->getPost('payment_type');
        $transaction_status = $this->request->getPost('transaction_status');

        $data = [
            'nama' => $nama,
            'email' => $email,
            'nomortelepon' => $nomortelepon,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'jumlahorang' => $jumlahorang,
            'catatan' => $catatan,
            'user_id' => $user_id,
            'nama_restoran' => $nama_restoran,
            'id_restoran' => $id_restoran,
            'order_id' => $order_id,
            'payment_type' => $payment_type,
            'transaction_status' => $transaction_status,
        ];

        $inserted = $this->reservationRestoranModel->insert_reservation($data);

        if ($inserted) {
            $json = [
                'sukses' => 'Transaksi Berhasil, silahkan melakukan pembayaran !!'
            ];
            echo json_encode($json);
            
        } else {
            $json = [
                'sukses' => 'Transaksi Gagal, terjadi kesalahan dalam database!!'
            ];
            echo json_encode($json);
        }
    }

    public function deleteReservation($id)
    {

        // Get reservation details to check status before deleting
        $reservation = $this->reservationRestoranModel->find($id);

        // Check if reservation status allows deletion
        if ($reservation['status'] == 'Dibatalkan' || $reservation['status'] == 'Berhasil') {
            // Attempt to delete reservation from the database
            $deleted = $this->reservationRestoranModel->deleteReservation($id);

            if ($deleted) {
                // Redirect to reservation list with success message
                return redirect()->to(base_url('user/pesanan'))->with('success', 'Reservation deleted successfully.');
            } else {
                // Handle deletion failure (redirect or show error message)
                return redirect()->to(base_url('user/pesanan'))->with('error', 'Failed to delete reservation.');
            }
        } else {
            // Reservation status does not allow deletion, handle error
            return redirect()->to(base_url('user/pesanan'))->with('error', 'Cannot delete reservation with current status.');
        }
    }
    #--------------------------------------------------------------------------------------------------------------------
    #global function
    public function rata_rating($rating)
    {
        $totalrating = 0;
        $n = 0;

        foreach ($rating as $item) {
            $totalrating += $item->rating;
            $n++;
        }

        if ($n > 0) {
            $rata = $totalrating / $n;
        } else {
            $rata = 0;
        }
        $format_rata = number_format($rata, 1);
        return $format_rata;
    }

    public function count_bar($rating)
    {
        $stara = 0;
        $starb = 0;
        $starc = 0;
        $stard = 0;
        $stare = 0;
        foreach ($rating as $count) {
            if ($count->rating == 5) {
                $stara += 1;
            } elseif ($count->rating == 4) {
                $starb += 1;
            } elseif ($count->rating == 3) {
                $starc += 1;
            } elseif ($count->rating == 2) {
                $stard += 1;
            } elseif ($count->rating == 1) {
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

    public function pesanan($id)
    {
        if (!empty($id)){
            // Fetch all reservations from the database
            $data['reservasi_restoran'] = $this->reservationRestoranModel->getReservationsByUser($id);
        }

        // Load views with header, footer, and main content
        $data['header'] = view('user/header');
        $data['footer'] = view('user/footer');
        return view('user/pesanan', $data);
    }

    public function cancelReservation($reservationId)
    {
        $result = $this->reservationRestoranModel->cancelReservation($reservationId);

        if ($result) {
            return redirect()->to(base_url('user/pesanan'))->with('success', 'Reservation canceled successfully.');
        } else {
            return redirect()->to(base_url('user/pesanan'))->with('error', 'Failed to cancel reservation. Please try again.');
        }
    }
}
