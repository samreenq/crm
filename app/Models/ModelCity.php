<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCity extends Model
{

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';
    protected $primaryKey="id";

    /**
     * Get List by state and country
     */
    public function getByStateAndCountry($country_id,$state_id)
    {
       $collection = $this->select('id','name')
       ->where('country_id',$country_id)
        ->where('state_id',$state_id)
        ->get();

        if($collection){
            $data = $collection->toArray();
            return $data;
       }
       return false;
    }


}
