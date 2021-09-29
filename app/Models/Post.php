<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     //cho lưu những cột nào
    // ];

    protected $guarded = [
        //Không cho lưu cột trong này
    ];


    protected $statusArr = [
        0 => 'Draft',
        1 => 'Public',
        2 => 'Test'
    ];

    public function getStatusTextAttribute()
    {
        return $this->statusArr[$this->status];
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }
}
