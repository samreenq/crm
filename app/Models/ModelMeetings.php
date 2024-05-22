<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMeetings extends Model
{
    use HasFactory;
    protected $table="meetings";
    protected $primaryKey="m_id";

    public function fetchMeetingDetails()
    {
        return $this->hasMany('App\Models\ModelMeetingDetails','m_id', 'm_id');
    }

    public function fetchUserDetails()
    {
        return $this->belongsTo('App\Models\ModelUsers','user_id', 'id');
    }
}
