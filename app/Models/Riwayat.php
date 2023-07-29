<?php

namespace App\Models;

use App\Builders\RiwayatQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'riwayat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'nama',
        'harga',
        'jumlah',
        'kode',
    ];

    public function newEloquentBuilder($query) {
        return new RiwayatQueryBuilder($query);
    }
}
