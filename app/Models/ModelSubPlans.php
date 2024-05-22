<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSubPlans extends Model
{
    use HasFactory;
    protected $table="sub_plans";
    protected $primaryKey="s_plan_id";

    public function getParentPlan()
    {
        return $this->belongsTo('App\Models\ModelPlans','plan_id', 'plan_id');
    }
}
