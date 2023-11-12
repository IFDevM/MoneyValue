<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\devise;
class paire extends Model
{
    use HasFactory;
    
    protected $table = 'paires';

    protected $fillable = [
        'SourceCurrency_id',
        'TargetCurrency_id',
        'rate',
        'NumberofRequests',
    ];
    public function devise(){
        return $this->belongsTo(Devise::class);
    }
}
