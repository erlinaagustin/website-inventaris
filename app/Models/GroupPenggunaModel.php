<?php

// app/Models/GroupPenggunaModel.php
namespace App\Models;

use CodeIgniter\Model;

class GroupPenggunaModel extends Model
{
    protected $table = 'auth_groups_users';
    protected $primaryKey = ['group_id', 'user_id'];
    protected $allowedFields = ['group_id', 'user_id'];

    // Fungsi untuk menambahkan hubungan antara pengguna dan grup
    public function tambahHubungan($group_id, $user_id)
    {
        $data = [
            'group_id' => $group_id,
            'user_id' => $user_id,
        ];

        return $this->insert($data);
    }

    // Fungsi untuk menghapus hubungan antara pengguna dan grup
    public function hapusHubungan($group_id, $user_id)
    {
        return $this->where('group_id', $group_id)
                    ->where('user_id', $user_id)
                    ->delete();
    }

    
}
