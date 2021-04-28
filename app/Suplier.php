<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Suplier extends Model
{
    use AutoNumbertrait;

    protected $table = 'supliers';

    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'kode_suplier' => [
                'format' => 'SUP.2021.?',
                'length' => 1
            ]
        ];
    }
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
    public function permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }
}
