<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getImgAttribute()
    {

        $img = $this->images;
        if (!empty($img[0])) {
            if (Storage::disk($img[0]->disk)->exists($img[0]->path)) {
                return Storage::disk($img[0]->disk)->url($img[0]->path);
            } else {
                return Storage::disk('public')->url('default.jpg');
            }
        } else {
            return Storage::disk('public')->url('default.jpg');
        }
    }

    public function getPriceFormatAttribute()
    {
        return number_format($this->origin_price, 0, '', '.') . ' đ ';
    }

    public function getSalePriceFormatAttribute()
    {
        return number_format($this->sale_price, 0, '', '.') . ' đ ';
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
