<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;

class Question extends BaseModel
{
    // yaha pe hume access aise karna hai ki
    // $question->owner() isiliye humne foreign key specify kiya.
    // by default function ke naam ko wo foreign key lega.
    // Related wale field me 2 options hai 'string me class ka naam' 0R Model::class.
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
