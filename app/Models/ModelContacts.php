<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelContacts extends Model
{
    use HasFactory;
    protected $table="contacts";
    protected $primaryKey="id";
    use SoftDeletes;

    public function list()
    {
        $fetchData = self::with('user')->with('organization')->get()->toArray();
        return empty($fetchData) ? null : $fetchData;
    }

    /**
     * User Relationship
     */
    public function user()
    {
        return $this->belongsTo('App\Models\ModelUsers','user_id', 'id');
    }

    /**
     * Organization Relationship
     */
    public function organization()
    {
        return $this->belongsTo('App\Models\ModelOrganization','organization_id', 'id');
    }

      /**
     * Get User list for dropdown
     */
    public static function dropdownList()
    {
        $return = array();
        $data = self::where('status','active')->get(['id','name']);

        if($data){
            $data_arr = $data->toArray();
            foreach($data_arr as $value){
                $return[$value['id']] = $value['name'];
            }
        }
        return $return;
    }


}
