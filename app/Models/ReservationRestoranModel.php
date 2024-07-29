<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationRestoranModel extends Model
{
    protected $table = 'reservasi_restoran'; // Reservation table
    protected $primaryKey = 'id'; // Adjust primary key if it's different
    protected $allowedFields = ['nama', 'email', 'nomortelepon', 'tanggal', 'jam', 'jumlahorang', 'catatan', 'user_id', 'nama_restoran', 
    'id_restoran', 'order_id', 'payment_type', 'transaction_status'];

    // Method to insert reservation into reservasi_restoran table
    public function insert_reservation($data)
    {
        return $this->insert($data); // Insert data into the table
    }

    // Additional reservation-related methods as needed
    public function cancelReservation($reservationId)
    {
        return $this->update($reservationId, ['status' => 'Dibatalkan']);
    }

    // Method to get all reservations by user ID
    public function getReservationsByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll(); // Find all reservations for a specific user
    }

    public function cek_data($id){
        return $this->where('id', $id)->get()->getResult();
    }

    public function getperson($id, $nama){
        return $this->select('jumlahorang')->where('id_restoran', $id)->where('nama_restoran', $nama)->get()->getResult();
    }

    public function deleteReservation($id)
    {
        // Assuming 'reservasi_restoran' is your table name and 'id' is the primary key
        $this->where('id', $id);
        $this->delete();
    }

    public function getReservationsResto($id)
    {
        return $this->where('id_restoran', $id)->findAll();
    }
}
