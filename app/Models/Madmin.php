<?php
namespace App\Models;

use CodeIgniter\Model;

class Madmin extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['email','password', 'username', 'picture', 'role'];

    public function login($email, $password){
        return $this->db->table('user')->where([
            'email' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function reg_google($data){
        return $this->insert($data);
    }

    public function cek_email($email){
        return $this->db->table('user')->where([
            'email' => $email,
        ])->get()->getRowArray();
    }

    public function insert_token($data){
        return $this->db->table('user_token')->insert($data);
    }

    public function get_token($email, $token){
        return $this->db->table('user_token')->where(['email' => $email, 'token' => $token])->get()->getRowArray(); 
    }

    public function update_pass($email, $password){
        return $this->where('email', $email)->set('password', $password)->update();
    }
}

