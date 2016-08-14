<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Article extends Model
{

    //protected $connection = 'mongodb';


    protected $fillable = ['title', 'subtitle', 'content'];

    /**
     * Get the User who authored this Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
