<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients_table extends Model
{
    use HasFactory;
    public $table = "clients";
    public $id = "id";
    public $incrementing = true;
    public $keytype = 'int';
    public $timestamps = true;
}
