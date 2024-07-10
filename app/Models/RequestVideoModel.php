<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestVideoModel extends Model
{
    protected $table = 'request';
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id', 'video_id', 'status', 'waktu', 'expired'];
}
