<?php namespace App\Models;

use CodeIgniter\Model;

class MerekModel extends Model
{
    protected $table      = 'merek';
    protected $primaryKey = 'id_merek';

    protected $allowedFields = ['nama_merek', 'keterangan'];

    protected $useTimestamps = false;
}
