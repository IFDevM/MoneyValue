<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devises extends Model
{
    use HasFactory;
    protected $table ='Devises';
    protected $filliable= ['currency_name'];
}
