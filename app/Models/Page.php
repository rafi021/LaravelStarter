<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    //protected $guarded = ['id'];

    protected $fillable = [
        'page_title',
        'page_slug',
        'excerpt',
        'body',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status'
    ];

    public function registerMediaCollections():void
    {
        $this->addMediaCollection('page_image')
            ->singleFile();
    }
}
