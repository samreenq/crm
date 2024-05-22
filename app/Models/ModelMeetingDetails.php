<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMeetingDetails extends Model
{
    use HasFactory;
    protected $table="meetings_detail";
    protected $primaryKey="md_id";

    public function fetchMeeting()
    {
        return $this->belongsTo('App\Models\ModelMeetings','m_id', 'm_id');
    }

    public function fetchUserDetails()
    {
        return $this->belongsTo('App\Models\ModelUsers','user_id', 'id');
    }
}
