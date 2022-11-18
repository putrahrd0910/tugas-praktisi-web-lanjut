<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';
    
    protected $fillable = [
        'judul', 'deskripsi', 'status_id'
    ];
    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
