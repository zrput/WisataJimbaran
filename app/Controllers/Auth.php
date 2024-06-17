<?php

namespace App\Controllers;
use Google_Client;
use CodeIgniter\Email\Email;

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
        return view('signup', $data);
    }

    public function password(){
        return view('password1');
    }

    public function cek_login(){

        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors())->with('tab', 'login');
        } else {
            // Login the user
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
        } 
    }

    public function cek_signup()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'username' => 'required|min_length[3]',
            'emailup' => 'required|valid_email',
            'passwordup' => 'required|min_length[5]',
            'confirm-password' => 'required|matches[passwordup]'
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors())->with('tab', 'signup');
        } else {
            // Register the user
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('emailup');
            $password = $this->request->getPost('passwordup');

            $data = [
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'role' => "member",
            ];
            
            $user_data = $this->Madmin->reg_google($data);
            $cek = $this->Madmin->login($email, $password);
            
            if ($cek) {
                session()->set('log', true);
                session()->set('id', $cek['id']);
                session()->set('username', $cek['username']);
                session()->set('email', $cek['email']);
                session()->set('picture', $cek['picture']);
                session()->set('role', $cek['role']);

                return redirect()->to(base_url('User'));
            }
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
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'password' => 'required|min_length[5]',
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors())->with('tab', 'login');
        } else {
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

        }
        
    }

    public function logout(){
        session()->remove('log');
        session()->remove('username');
        session()->remove('email');

        session()->setFlashdata('pesan', 'Logout Berhasil....!');
        return redirect()->to(base_url('Auth'));
    }

    #password
    public function forgot_password(){
        return view('forgot');
    }

    public function cek_forgot(){
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'email' => 'required|valid_email',
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors())->with('tab', 'login');
        } else {
            $email = $this->request->getPost('email');
            $cek = $this->Madmin->cek_email($email);
            if ($cek){
                $token = base64_encode(random_bytes(32));

                $data = [
                    'email' => $email,
                    'token' => $token,
                    'date_create' => time()
                ];

                $insert_token = $this->Madmin->insert_token($data);
                if ($insert_token){                
                    
                    $sendEmail = $this->_sendEmail($token, $email);

                    if ($sendEmail){
                        session()->setFlashdata('pesan', 'Reset Password sudah terkirim, periksa email!!');
                        return redirect()->to(base_url('Auth/forgot_password'));
                    }else {
                        session()->setFlashdata('pesan', 'Gagal Mengirim!!');
                        return redirect()->to(base_url('Auth/forgot_password'));
                    }

                }else{
                    session()->setFlashdata('pesan', 'Error 500!!');
                    return redirect()->to(base_url('Auth/forgot_password'));
                }

            }else{
                session()->setFlashdata('pesan', 'Email Tidak Ditemukan, Periksa Kembali!!');
                return redirect()->to(base_url('Auth/forgot_password'));
            }

        }
    }

    private function _sendEmail($token, $userEmail){
        $email = \Config\Services::email();

        $email->setFrom('halodunia660@gmail.com', 'WisataJimbarans');
        $email->setTo($userEmail);

        $email->setSubject('Reset Password');
        $email->setMessage('Click this link to reset your password: <a href="' . base_url(). 'Auth/resetpassword?email=' . $userEmail . '&token=' . urlencode($token) . '">Reset Password</a>');

        if ($email->send()) {
            return true;
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function resetpassword(){
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        $user = $this->Madmin->get_token($email, $token);
        if(str_replace(' ', '+', $user['token']) == $token){
            session()->set('reset_password', $email);
            return view('changepassword');
        }else{
            session()->setFlashdata('pesan', 'Reset Password Gagal, Token salah !!');
            return redirect()->to(base_url('Auth'));
        }
    }

    public function changepassword(){
        if (session()->has('reset_password')){

            $validation = \Config\Services::validation();
            
            $validation->setRules([
                'password' => 'required|min_length[5]',
                'confirm-password' => 'required|matches[password]'
            ]);

            if ($validation->withRequest($this->request)->run() == FALSE) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors())->with('tab', 'login');
            } else {
                $email = session()->get('reset_password');
                $password = $this->request->getPost('password');
                $up_pass = $this->Madmin->update_pass($email, $password);
                if ($up_pass){
                    session()->setFlashdata('pesan', 'Reset Password sukses !!');
                    return redirect()->to(base_url('Auth'));
                }else{
                    session()->setFlashdata('pesan', 'Reset Password gagal !!');
                    return redirect()->to(base_url('Auth'));
                }
            }
        }else{
            session()->setFlashdata('pesan', 'Terjadi Kesalahan !!');
            return redirect()->to(base_url('Auth'));
        }
    }


    



    
}