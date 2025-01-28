<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelOrganization extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization';
    protected $primaryKey="id";
    use SoftDeletes;

    public function list()
    {
        $fetchData = self::get()->toArray();
        return empty($fetchData) ? null : $fetchData;
    }

    /**
     * Get list for dropdown
     */
    public static function dropdownList()
    {
        $return = array();
        $data = self::all('id','name');

        if($data){
            $data_arr = $data->toArray();
            foreach($data_arr as $value){
                $return[$value['id']] = $value['name'];
            }
        }
        return $return;
    }

    /**
     * Create new record
     */
    public function createRecord($data)
    {
        $this->name = $data['name'];
        $this->type = $data['type'];
        $this->email = $data['email'];
        $this->description = $data['description'];
        $this->phone = $data['phone'];
        $this->no_of_employees = $data['no_of_employees'];
        $this->annual_revenue = $data['annual_revenue'];
        $this->address = $data['address'];
        $this->profile_link = $data['profile_link'];
        $this->status = $data['status'];
        $id = $this->save();
        return $id;
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
     * Update Record
     */
    public function updateRecord($data,$id)
    {
        $updateRecord = self::where('id',$id)->update([
            'name' => $data['name'],
           'type' => $data['type'],
           'email' => $data['email'],
           'phone' => $data['phone'],
            'description' => $data['description'],
            'no_of_employees' => $data['no_of_employees'],
            'annual_revenue' => $data['annual_revenue'],
            'address' => $data['address'],
            'profile_link' => $data['profile_link'],
            'status' => $data['status']
        ]);

        return $updateRecord;
    }

    public function deleteRecord($id)
    {
        $deleteRecored = $this->where('id',$id)->delete();
        return $deleteRecored;
    }
}
