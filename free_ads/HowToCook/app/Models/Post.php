<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Post extends Model implements Searchable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $guarded = []; ##tell to Laravel, do not take any gard, i take care myself

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getSearchResult(): SearchResult
    {         
       return new SearchResult($this, $this->category, $this->caption, $this->price, $this->price, $this->location);
    }

}