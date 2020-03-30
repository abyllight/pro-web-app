<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'title', 'uuid', 'ticket_id',
    ];

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }
}
