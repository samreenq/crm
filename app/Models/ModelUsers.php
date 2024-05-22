<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ModelUsers extends Model
{
    use HasFactory;
    protected $table="users";
    protected $primaryKey="id";
    use Softdeletes;

    public function getCompany()
    {
        return $this->hasOne('App\Models\ModelCompanies','id', 'user_id');
    }

    public function getInvoices()
    {
        return $this->hasMany('App\Models\ModelInvoices','id', 'user_id');
    }

    public function fetchMeetingDetails()
    {
        return $this->hasMany('App\Models\ModelMeetingDetails','user_id', 'id');
    }

    public function fetchUserDetails()
    {
        return $this->hasMany('App\Models\ModelMeetingDetails','id', 'user_id');
    }

    public function fetchPUserDetails()
    {
        return $this->belongsTo('App\Models\ModelMeetings','user_id', 'id');
    }

    public function list($login_id)
    {
        $fetchData = self::whereNotIn('id',[$login_id])->get()->keyBy("id")->toArray();
        return empty($fetchData) ? null : $fetchData;
    }
}
