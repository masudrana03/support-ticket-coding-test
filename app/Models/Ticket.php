<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'status',
        'closed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function responses()
    {
        return $this->hasMany(TicketResponse::class);
    }


    public function isClosed()
    {
        return $this->status === 'closed';
    }
}
