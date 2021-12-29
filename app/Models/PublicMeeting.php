<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicMeeting extends Model
{
    use HasFactory;

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function chairman()
    {
        return $this->belongtsTo(User::class, 'id', 'chairman_id');
    }

    public function wtLeader()
    {
        return $this->belongtsTo(User::class, 'id', 'wt_leader_id');
    }

    public function wtReader()
    {
        return $this->belongtsTo(User::class, 'id', 'wt_reader_id');
    }
}
