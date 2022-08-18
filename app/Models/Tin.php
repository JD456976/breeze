<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Tin extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'size',
        'color',
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'color_id' => 'integer',
        'size_id' => 'integer'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('tins')
            ->singleFile()
            ->useFallbackUrl('https://loremflickr.com/640/360');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->hasOne(Color::class);
    }

    public function size()
    {
        return $this->hasOne(Size::class);
    }
}
