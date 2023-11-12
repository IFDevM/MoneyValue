<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paire;

class devise extends Model
{
    use HasFactory;

    protected $table = 'devises';


    protected $fillable = [

        'code',
        'currency_name'
    ];

    public function paire (){
        return  $this->hasMany(Paire::class);
        }
}
