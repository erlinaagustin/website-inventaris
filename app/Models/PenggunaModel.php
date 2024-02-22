<?php
namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'nomor_hp', 'username', 'password_hash', 'active', 'created_at', 'updated_at'];

    // Fungsi untuk menambahkan pengguna
    public function tambahPengguna($dataPengguna)
    {
        // Tambahkan data created_at dan updated_at dengan nilai waktu sekarang
        $dataPengguna['created_at'] = date('Y-m-d H:i:s');
        $dataPengguna['updated_at'] = date('Y-m-d H:i:s');

        // Pastikan nilai active diatur ke 1 secara default
        if (!isset($dataPengguna['active'])) {
            $dataPengguna['active'] = 1;
        }

        $this->insert($dataPengguna);
        return $this->insertID(); // Mengembalikan ID pengguna yang baru ditambahkan
    }


    public function getUsers($id = false)
    {
        if($id==false){
            $this->join('auth_groups_users', 'users.id = auth_groups_users.user_id', 'left');
            $this->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id', 'left');
            
            // Sesuaikan select statement untuk menyertakan nama aset dari tabel aset
            return $this->select('users.*, auth_groups_users.group_id, auth_groups.name')->findAll();

        }
        else{
            return $this->where('users.id', $id)->first();
        }
           
    }
}
