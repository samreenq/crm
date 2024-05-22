<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPlans extends Model
{
    use HasFactory;
    protected $table="plans";
    protected $primaryKey="plan_id";

    public function getSubPlans()
    {
        return $this->hasMany('App\Models\ModelSubPlans','plan_id', 'plan_id');
    }
}
