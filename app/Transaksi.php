<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Transaksi extends Model
{
    use AutoNumbertrait;
    protected $table = 'transaksis';

    protected $guarded = [];

    public function masterbiaya()
    {
        return $this->belongsTo(Masterbiaya::class);
    }

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'no_nota' => [
                'format' => 'JC0?',
                'length' => 1
            ]
        ];
    }
}
