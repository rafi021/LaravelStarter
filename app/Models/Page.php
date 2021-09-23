<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    //protected $guarded = ['id'];

    protected $fillable = [
        'page_title',
        'page_slug',
        'excerpt',
        'body',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}
