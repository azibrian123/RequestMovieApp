<?php

namespace App\Models;

use CodeIgniter\Model;

class VideosModel extends Model
{
    protected $table = 'videos';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'tahun', 'deskripsi', 'sampul'];
}
