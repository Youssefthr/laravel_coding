<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model 
{
    use HasFactory;

    protected $guarded = []; ##tell to Laravel, do not take any gard, i take care myself

    public function user(){
        return $this->belongsTo(User::class);
    }

}