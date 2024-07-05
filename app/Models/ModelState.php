<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelState extends Model
{

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "states";
    protected $primaryKey="id";

    /**
     * Get List by state and country
     */
    public static function getStateIdByName($state_name)
    {
        $getStateIdByName = self::select('id','country_id')
            ->where('name',$state_name)
            ->first();
       
        return $getStateIdByName;
    }

}
