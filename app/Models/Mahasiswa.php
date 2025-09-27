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
        'foto', // tambahkan
    ];

    // opsional: accessor untuk url foto
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('images/default-avatar.png');
    }
}
