<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $statusArr= [
        0=> 'Draft',
        1=> 'Public',
        2=> 'Test'
    ];

    public function getStatusTextAttribute(){
        return $this->statusArr[$this->status];
    }
}
