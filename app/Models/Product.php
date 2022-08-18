<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'color_id',
        'scent_id',
        'tin_id',
        'cost'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'color_id' => 'integer',
        'tin_id' => 'integer',
        'scent_id' =>'integer',
        'cost' => 'integer'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products')
            ->useFallbackUrl('https://loremflickr.com/640/360');
    }

    public function tin()
    {
        return $this->hasMany(Tin::class);
    }

    public function color()
    {
        return $this->hasMany(Color::class);
    }

    public function scent()
    {
        return $this->hasMany(Scent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
