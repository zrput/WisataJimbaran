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
}

