<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'cause',
        'is_archived',
    ];
    
    protected $casts = [
        'type' => 'array',
        'cause' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
