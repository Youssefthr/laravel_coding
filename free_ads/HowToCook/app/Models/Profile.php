<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = []; ##tell to Laravel, do not take any gard, i take care myself

    #add default img for profile
    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'profile/XUKreFIHBL8YKV6O8V2N6oEYepwkbVJ875eRkgwa.png';
        return '/storage/' . $imagePath ;
    }

    ## how to match profil with its unique user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
