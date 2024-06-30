<?php

namespace App\Controllers;


class Main_company extends BaseController
{
    public function index()
    {
        $data['page'] = 'dashboard';
        
        if (session('role') === 'akomodasi'){
            $data['title'] = 'akomodasi';
            return view('company/dashboard', $data);
        }elseif (session('role') === 'restoran'){
            $data['title'] ='restoran';
            return view('company/dashboard', $data);
        }else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function detail_company(){
        $data['page'] = 'update-data';
        
        if (session('role') === 'akomodasi'){
            $data['title'] = 'akomodasi';
            return view('company/restoran_card', $data);
        }elseif (session('role') === 'restoran'){
            $data['title'] ='restoran';
            return view('company/restoran_card', $data);
        }else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function company_input(){
        $data['page'] = 'update-data';
        
        if (session('role') === 'akomodasi'){
            $data['title'] = 'akomodasi';
            return view('company/company_information', $data);
        }elseif (session('role') === 'restoran'){
            $data['title'] ='restoran';
            return view('company/company_information', $data);
        }else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }

    public function reservation(){
        $data['page'] ='reservation';
        
        if (session('role') === 'akomodasi'){
            $data['title'] = 'akomodasi';
            return view('company/dashboard', $data);
        }elseif (session('role') ==='restoran'){
            $data['title'] ='restoran';
            return view('company/restoran_reservation', $data);
        }else {
            session()->destroy();
            return redirect()->to(base_url('Auth'));
        }
    }
}
