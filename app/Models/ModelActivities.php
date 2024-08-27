<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelActivities extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activities';
    protected $primaryKey="id";
    use SoftDeletes;

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
     * Create new record
     */
    public function createRecord($data)
    {
        $this->title = $data['title'];
        $this->type = $data['type'];
        $this->contact_id = $data['contact_id'];
        $this->organization_id = $data['organization_id'];
        $this->date_time = date('Y-m-d h:i:s',strtotime($data['date_time']));
        $this->subject = $data['subject'];
        $this->description = $data['description'];
        $this->status = $data['status'];
        $id = $this->save();
        return $id;
    }

}
