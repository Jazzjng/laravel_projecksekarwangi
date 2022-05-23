<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WbsSystem extends Model
{
    use HasFactory;
    protected $table = 'wbs_system';
    protected $primaryKey = 'id_laporan';
}
