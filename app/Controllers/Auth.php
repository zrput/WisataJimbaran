<?php

namespace App\Controllers;
use Google_Client;

class Auth extends BaseController
{
    protected $googleClient;
    public function __construct()
    {
        helper('form');
        $this->Madmin = new \App\Models\Madmin();
        $this->googleClient = new Google_Client;
        $this->googleClient->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->googleClient->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->googleClient->setRedirectUri('http://localhost:8080/Auth/cek_data');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function index()
    {
        $data['link'] = $this->googleClient->createAuthUrl();
        return view('coba', $data);
    }

    public function coba(){
        return view('user/login');
    }

    public function forgot(){
        return view('user/forgot');
    }

    public function logic_forgot(){
        if($this->validate([
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong Dan Wajib di isi !!'
                    ]
                ]
        ])) {
            $email = $this->request->getPost('email');
            $username = $this->request->getPost('username');
            $picture = $this->request->getPost('picture');
            $password = $this->request->getPost('password');
            
            $data = [
                'email' => $email,
                'username' => $username,
                'picture' => $picture,
                'password' => $password,
                'role' => "member",
            ];
            
            $this->Madmin->reg_google($data);
            session()->setFlashdata('pesan', 'Daftar Akun Berhasil....!');
            return redirect()->to(base_url('Auth'));

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/password'));
        }
    
    }
    public function password(){
        return view('password');
    }

    public function cek_login(){

        if($this->validate([
            'email' => [
                'label' => 'email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                    ]
                ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!!'
                    ]
                ]
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $cek = $this->Madmin->login($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('id', $cek['id']);
                session()->set('username', $cek['username']);
                session()->set('email', $cek['email']);
                session()->set('picture', $cek['picture']);
                session()->set('role', $cek['role']);

                if ($cek['role'] == 'admin') {
                    return redirect()->to(base_url('Admin/dashboard'));
                } else {
                    return redirect()->to(base_url('User'));
                }
            } else{
                session()->setFlashdata('pesan', 'Login Gagal, Username atau Password salah !!');
                return redirect()->to(base_url('Auth'));
            }

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'));
        }
    }

    public function cek_data(){ #mengambil data akun google
        try{
            $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
            if (!isset($token['error'])){
                $this->googleClient->setAccessToken($token['access_token']);
                $googleService = new \Google_Service_Oauth2($this->googleClient);
                $data = $googleService->userinfo->get();
                $row = [
                    'email' => $data['email'],
                    'username' => $data['name'],
                    'picture' => $data['picture'],
                ];
                session()->set($row);
                return redirect()->to(base_url('Auth/password'));
                
            }else {
                // Handle error if needed
                return redirect()->to(base_url('Auth'))->with('error', 'gagal menguhubungkan ke akun google.');
            }
        }catch (\Exception $e) {
            // Handle exception if needed
            return redirect()->to(base_url('Auth'))->with('error', 'error pada saat mengakses autentikasi.');
        }
    }

    public function insert_pass() {
        if($this->validate([
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong Dan Wajib di isi !!'
                    ]
                ]
        ])) {
            $email = $this->request->getPost('email');
            $username = $this->request->getPost('username');
            $picture = $this->request->getPost('picture');
            $password = $this->request->getPost('password');
            
            $data = [
                'email' => $email,
                'username' => $username,
                'picture' => $picture,
                'password' => $password,
                'role' => "member",
            ];
            
            $this->Madmin->reg_google($data);
            session()->setFlashdata('pesan', 'Daftar Akun Berhasil....!');
            return redirect()->to(base_url('Auth'));

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/password'));
        }
    }

    public function logout(){
        session()->remove('log');
        session()->remove('username');
        session()->remove('email');

        session()->setFlashdata('pesan', 'Logout Berhasil....!');
        return redirect()->to(base_url('Auth'));
    }



    
}