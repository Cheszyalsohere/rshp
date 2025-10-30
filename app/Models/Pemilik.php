<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';
    protected $primaryKey = 'id_pemilik';
    protected $fillable = ['alamat', 'no_wa'];

    public function user ()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    } 
}
