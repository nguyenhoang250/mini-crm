<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khach_hang';

    protected $fillable = [
        'ten',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'ghi_chu',
    ];
}