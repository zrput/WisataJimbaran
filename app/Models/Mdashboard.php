<?php
namespace App\Models;

use CodeIgniter\Model;

class Mdashboard extends Model
{
    public function getdata($table){
        return $this->db->table($table)->get()->getResult();
    }
}

