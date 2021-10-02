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

    const STATUS_DRAFT = 0;
    const STATUS_DONE = 1;
    const STATUS_PUBLIC = 2;

    protected $statusArr = [
        self::STATUS_DRAFT => 'Draft',
        self::STATUS_DONE => 'Done',
        self::STATUS_PUBLIC => 'Public'
    ];

    protected $statusColor = [
        self::STATUS_DRAFT => 'default',
        self::STATUS_DONE => 'warning',
        self::STATUS_PUBLIC => 'success'
    ];

    public function getStatusTextAttribute()
    {
        return '<span class="badge badge-' . $this->statusColor[$this->status] . '">' . $this->statusArr[$this->status] . '<span>';
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'user_updated_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
