<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCompanies extends Model
{
    use HasFactory;
    protected $table="companies";
    protected $primaryKey="c_id";

    public function getPlanDetail()
    {
        return $this->hasMany('App\Models\ModelPaidUsers','user_id', 'user_id');
    }
    public function getUserDetail()
    {
        return $this->hasMany('App\Models\ModelUsers','id', 'user_id');
    }
}
