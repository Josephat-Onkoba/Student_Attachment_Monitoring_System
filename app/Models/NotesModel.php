<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotesModel extends Model
{
    use HasFactory;

    protected $table ='notes';

    protected $fillable = ['subject', 'content'];
    
    protected $dates = ['created_at', 'updated_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
