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
    protected $table = "cities";
    protected $primaryKey="id";

    /**
     * Get List by state and country
     */
    public static function getByStateAndCountry($country_id,$state_id)
    {
       $city_list = array();
       $collection = self::select('id','name')
       ->where('country_id',$country_id)
        ->where('state_id',$state_id)
        ->get();

        if($collection){
            $city_data = $collection->toArray();
            foreach($city_data as $key => $city)
            {
                $city_list[$city['id']] = $city['name'];
            }
            return $city_list;
       }
       return false;
    }


}
