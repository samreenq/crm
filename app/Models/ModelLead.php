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
}
