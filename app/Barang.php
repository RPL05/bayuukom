<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use AutoNumbertrait;

    protected $table = 'barangs';

    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'kode_barang' => [
                'format' => 'BRG.2021.?',
                'length' => 1
            ]
        ];
    }
    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }

    public function permintaans()
    {
        return $this->belongsTo(Permintaan::class);
    }
}
