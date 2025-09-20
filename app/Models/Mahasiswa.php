<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'npm',
        'nama',
        'jurusan',
        'tahun',
        'email',
        'telepon',
        'alamat',
    ];
}
