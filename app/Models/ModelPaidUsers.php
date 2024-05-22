<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPaidUsers extends Model
{
    use HasFactory;
    protected $table="paid_users";
    protected $primaryKey="paid_id";

    // public function getCustomer()
    // {
    //     return $this->belongsTo('App\Models\ModelCompanies','c_id', 'c_id');
    // }

    
    public function getCompany()
    {
        return $this->hasOne('App\Models\ModelCompanies','user_id', 'user_id');
    }
}
