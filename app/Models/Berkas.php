<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik_bm',
        'tgl_masuk',
        'tgl_akhir',
        'nama_bm',
        'izin_id',
        'nama_usaha',
        'alamat_usaha',
        'telpon',
        'survey'
    ];

    public function izin()
    {
        return $this->hasOne(Izin::class, 'id', 'izin_id');
    }

    public function optiondinas()
    {
        return $this->hasMany(OptionDinas::class, 'berkas_id', 'id');
    }

    public function user()
    {
        return $this->optiondinas->user;
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->setTimezone('UTC')->setTimezone('Asia/Makassar')->format('Y-m-d H:i');
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->setTimezone('UTC')->setTimezone('Asia/Makassar')->format('Y-m-d H:i');
    }
}
