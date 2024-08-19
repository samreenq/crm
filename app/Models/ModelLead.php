<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelLead extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leads';
    protected $primaryKey="id";
    use SoftDeletes;

    protected $fillable = [
         'name', 'description', 'annual_revenue', 'source', 'type', 'contact_id', 'organization_id', 
         'expected_close_date','status' , 'created_at','updated_at','deleted_at'
    ];

    public function list()
    {
        $fetchData = self::with('contact')->with('organization')->get()->toArray();
        return empty($fetchData) ? null : $fetchData;
    }

      /**
     * User Relationship
     */
    public function contact()
    {
        return $this->belongsTo('App\Models\ModelContacts','contact_id', 'id');
    }

    /**
     * Organization Relationship
     */
    public function organization()
    {
        return $this->belongsTo('App\Models\ModelOrganization','organization_id', 'id');
    }

     /**
     * Get by id
     */
    public function getById($id)
    {
        $record =  $this->where('id',$id)->first();
        return $record;
    }

    public static function addLeads($data)
    {
        $createRecord = self::create([
            'name'               =>  $data['name'],
            'description'        =>  $data['description'],
            'annual_revenue'     =>  $data['annual_revenue'],
            'source'             =>  $data['source'],
            'type'               =>  $data['type'],
            'contact_id'         =>  $data['contact_id'],
            'organization_id'    =>  $data['organization_id'],
            'expected_close_date'=>  $data['expected_close_date'],
            'status'             =>  $data['status']
        ]);
        return $createRecord;
    }

    public static function updateRecord($data, $id)
    {
        $updateRecord = self::where('id',$id)->update([
            'name'               =>  $data['name'],
            'description'        =>  $data['description'],
            'annual_revenue'     =>  $data['annual_revenue'],
            'source'             =>  $data['source'],
            'type'               =>  $data['type'],
            'contact_id'         =>  $data['contact_id'],
            'organization_id'    =>  $data['organization_id'],
            'expected_close_date'=>  $data['expected_close_date'],
            'status'             =>  $data['status']
        ]);
        // echo '<pre>'; print_r($updateRecord); exit;
        return $updateRecord;
    }
}
