<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImgAttribute()
    {
        if (!empty($this->image)) {
            if (Storage::disk($this->disk)->exists($this->image)) {
                return Storage::disk($this->disk)->url($this->image);
            } else {
                return Storage::disk('public')->url('default.jpg');
            }
        } else {
            return Storage::disk('public')->url('default.jpg');
        }
    }
}
