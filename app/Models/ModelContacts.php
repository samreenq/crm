<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelContacts extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="contacts";
    protected $primaryKey="id";
    
    protected $fillable = [
        'name','user_id','organization_id','gender','date_of_birth','country_id','zipcode','status',
        'created_at','updated_at','deleted_at'
    ];

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

     /**
     * Get by id
     */
    public function getById($id)
    {
        $record =  $this->where('id',$id)->first();
        return $record;
    }

       /**
     * Create new record
     */
    public static function addContact($data)
    {
        //echo '<pre>'; print_r($data); exit;
        $createRecord = self::create([
            'name'  =>  $data['name'],
            'user_id'  =>  $data['user_id'],
            'organization_id'  =>  $data['organization_id'],
            'gender'  =>  $data['gender'],
            'date_of_birth'  =>  $data['date_of_birth'],
            'country_id'  =>  $data['country_id'],
            // 'state_id'  =>  $data['state_id'],
            // 'city_id'  =>  $data['city_id'],
            'zip_code'  =>  $data['zip_code'],
            'address'  =>  $data['address'],
            'status'  =>  $data['status'],
        ]);
        return $createRecord;
    }
}
