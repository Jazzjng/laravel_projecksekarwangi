<?php

namespace Modules\Tentang\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TentangKat extends Model
{
    use HasFactory;

    protected $table = 'tentang_kat';
    protected $primaryKey = 'id_tentang_kat';
    protected $fillelabe = ['tentang_nama','tentang_status'];

    
    public function tentang()
    {
        return $this->belongsTo('Modules\Tentang\Entities\Tentang','id_tentang_kat');
    }
}
