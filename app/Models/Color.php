<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Color extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('colors')
            ->singleFile()
            ->useFallbackUrl('https://loremflickr.com/640/360');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
