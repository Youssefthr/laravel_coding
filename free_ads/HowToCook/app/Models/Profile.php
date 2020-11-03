<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = []; ##tell to Laravel, do not take any gard, i take care myself

    ## how to match profil with its unique user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
