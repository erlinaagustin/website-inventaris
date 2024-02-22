<?php namespace App\Models;

use CodeIgniter\Model;

class KondisiModel extends Model
{
    protected $table      = 'kondisi';
    protected $primaryKey = 'id_kondisi';

    protected $allowedFields = ['nama_kondisi', 'keterangan'];

    protected $useTimestamps = false;
}
