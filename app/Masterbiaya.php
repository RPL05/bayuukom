<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masterbiaya extends Model
{
    protected $table = 'masterbiayas';

    protected $guarded = [];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
