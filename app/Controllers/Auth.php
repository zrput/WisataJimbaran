<?php

namespace App\Controllers;

use App\Models\Muser;
use Google_Client;

class Auth extends BaseController
{
    protected $userModel;
    protected $googleClient;

    public function __construct()
    {
        helper('form');
        $this->Madmin = new \App\Models\Madmin();
        $this->googleClient = new Google_Client();
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

    public function coba()
    {
        return view('user/login');
    }

    public function forgot()
    {
        return view('user/forgot');
    }

    public function logic_forgot()
    {
        if ($this->validate([
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

    public function password()
    {
        return view('password');
    }

    public function cek_login()
    {
        if ($this->validate([
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
            } else {
                session()->setFlashdata('pesan', 'Login Gagal, Username atau Password salah !!');
                return redirect()->to(base_url('Auth'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'));
        }
    }

    public function cek_data()
    {
        try {
            $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
            if (!isset($token['error'])) {
                $this->googleClient->setAccessToken($token['access_token']);
                $googleService = new \Google_Service_Oauth2($this->googleClient);
                $data = $googleService->userinfo->get();

                $userModel = new \App\Models\Muser();
                $existingUser = $userModel->where('email', $data['email'])->first();

                if ($existingUser) {
                    $row = [
                        'id' => $existingUser['id'],
                        'email' => $existingUser['email'],
                        'username' => $existingUser['username'],
                        'picture' => $existingUser['picture'],
                    ];
                } else {
                    $newUserData = [
                        'email' => $data['email'],
                        'username' => $data['name'],
                        'picture' => $data['picture'],
                        'role' => 'member',
                    ];
                    $userModel->insert($newUserData);
                    $insertedUser = $userModel->where('email', $data['email'])->first();
                    $row = [
                        'id' => $insertedUser['id'],
                        'email' => $insertedUser['email'],
                        'username' => $insertedUser['username'],
                        'picture' => $insertedUser['picture'],
                    ];
                }
                session()->set($row);
                return redirect()->to(base_url('Auth/password'));
            } else {
                return redirect()->to(base_url('Auth'))->with('error', 'gagal menguhubungkan ke akun google.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('Auth'))->with('error', 'error pada saat mengakses autentikasi.');
        }
    }

    public function insert_pass()
    {
        if ($this->validate([
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

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('email');

        session()->setFlashdata('pesan', 'Logout Berhasil....!');
        return redirect()->to(base_url('Auth'));
    }

    // function to show the profile settings
    public function profileSettings()
    {
        $userModel = new Muser();
        $userId = session()->get('id');
        $user = $userModel->asObject()->find($userId);

        // Load the header and footer views
        $header = view('user/header');
        $footer = view('user/footer');

        // Pass data to the profile settings view
        return view('user/profile_settings', [
            'header' => $header,
            'footer' => $footer,
            'user' => $user
        ]);
    }

    // function to update profile
    public function updateProfile()
    {
        $session = session();
        $userId = $session->get('id'); // Assuming user ID is stored in session

        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email')
        ];

        // Handle profile picture upload
        $profilePicture = $this->request->getFile('profilePicture');
        if ($profilePicture->isValid() && !$profilePicture->hasMoved()) {
            // Validate the file type
            $validFileTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (in_array($profilePicture->getMimeType(), $validFileTypes)) {
                $profilePictureName = $profilePicture->getRandomName();
                $profilePicture->move(ROOTPATH . 'public/uploads/profile_pictures', $profilePictureName);
                $userData['picture'] = $profilePictureName;

                // Update session picture
                $session->set('picture', $profilePictureName);
            } else {
                return redirect()->to(base_url('auth/profileSettings'))->with('error', 'Invalid file type. Only JPEG and PNG are allowed.');
            }
        }

        $userModel = new Muser();
        if ($userModel->update($userId, $userData)) {
            return redirect()->to(base_url('auth/profileSettings'))->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->to(base_url('auth/profileSettings'))->with('error', 'Failed to update profile.');
        }
    }
    // function to load password confirmation form
    public function confirmPassword()
    {
        // Load the view for password confirmation form
        return view('user/confirm_password');
    }

    public function verifyPassword()
    {
        $session = session();
        $userId = $session->get('id');
        $oldPassword = $this->request->getPost('oldPassword');

        // Log received data
        log_message('debug', 'User ID: ' . $userId);
        log_message('debug', 'Old Password Input: ' . $oldPassword);

        // Validate old password
        $userModel = new Muser();
        $user = $userModel->find($userId);

        if ($user) {
            // Log retrieved user data
            log_message('debug', 'Stored User Data: ' . json_encode($user));

            // Compare plain text passwords
            if ($oldPassword === $user['password']) {
                // Old password is correct, redirect to change password form
                session()->set('password_verified', true);
                return redirect()->to(base_url('auth/changePassword'));
            } else {
                // Log password verification failure
                log_message('error', 'Password verification error: Password verification failed.');
                return redirect()->to(base_url('auth/confirmPassword'))->with('error', 'Incorrect old password.');
            }
        } else {
            // Log user retrieval failure
            log_message('error', 'Password verification error: User not found.');
            return redirect()->to(base_url('auth/confirmPassword'))->with('error', 'User not found.');
        }
    }

    public function changePassword()
    {
        if (!session()->get('password_verified')) {
            return redirect()->to(base_url('auth/confirmPassword'))->with('error', 'Please confirm your password first.');
        }

        return view('user/change_password');
    }

    public function updatePassword()
    {
        if (!session()->get('password_verified')) {
            return redirect()->to(base_url('auth/confirmPassword'))->with('error', 'Please confirm your password first.');
        }

        $session = session();
        $userId = $session->get('id');
        $newPassword = $this->request->getPost('newPassword');
        $confirmPassword = $this->request->getPost('confirmPassword');

        if ($newPassword !== $confirmPassword) {
            return redirect()->to(base_url('auth/changePassword'))->with('error', 'Passwords do not match.');
        }

        $userModel = new Muser();
        // Store the plain text password
        $userModel->update($userId, ['password' => $newPassword]);

        // Clear password verified session
        session()->remove('password_verified');
        return redirect()->to(base_url('auth/profileSettings'))->with('success', 'Password updated successfully.');
    }
}
