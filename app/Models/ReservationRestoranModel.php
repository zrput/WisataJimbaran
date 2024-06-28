<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationRestoranModel extends Model
{
    protected $table = 'reservasi_restoran'; // Reservation table
    protected $primaryKey = 'id'; // Adjust primary key if it's different
    protected $allowedFields = ['nama', 'email', 'nomortelepon', 'tanggal', 'jam', 'jumlahorang', 'catatan', 'user_id', 'status', 'nama_restoran'];

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

    public function deleteReservation($id)
    {
        // Assuming 'reservasi_restoran' is your table name and 'id' is the primary key
        $this->where('id', $id);
        $this->delete();
    }
}
