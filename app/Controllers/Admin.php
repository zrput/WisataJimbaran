<?php

namespace App\Controllers;


class Admin extends BaseController
{
    private $objek_model;

    public function __construct()
    {
        $this->dashboard_model = new \App\Models\Mdashboard();
        
    }
    

    public function dashboard(){
        if (session()->get('role') == 'member') {
            return redirect()->to(base_url('User/main'));
        }
        $data['objek'] = count($this->dashboard_model->getdata('objek_wisata'));
        $data['rekreasi'] = count($this->dashboard_model->getdata('rekreasi_wisata'));
        $data['akomodasi'] = count($this->dashboard_model->getdata('akomodasi_penginapan'));
        $data['restoran'] = count($this->dashboard_model->getdata('restoran'));

        $data['navbar'] = view('admin/navbar');
        $data['sidebar'] = view('admin/sidebar');
        return view('admin/dashboard', $data);
    }

    

}
