<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $guarded =[];

    public function path()
    {
        return route('article.show', $this);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');//foreign_key is user_id
    }
    public function tags()
    {
        return $this->belongToMany(Tag::class);
    }
     protected $table = "articles";
     public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'excerpt',
        'body',
        'created_at',
        'updated_at',
    ];
}
