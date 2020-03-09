<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\book;

class client extends Model
{
    function books() {
        return $this->belongsToMany('App\book', 'client_books', 'fk_idClient', 'fk_idBook');
    }
}
