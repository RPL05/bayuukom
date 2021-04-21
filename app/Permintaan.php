<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Permintaan extends Model
{
    use AutoNumbertrait;

    protected $table = 'requests';

    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'kode_request' => [
                'format' => 'REQ.2021.?',
                'length' => 1
            ]
        ];
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
