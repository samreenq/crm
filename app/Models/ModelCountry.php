<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCountry extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';
    protected $primaryKey="id";

    public function getColumnById($id,$column_name)
    {
       $collection = $this->select("$column_name")->where('id',$id)->first();
       if($collection){
            $data = $collection->toArray();
            return $data[$column_name];
       }
       return false;

    }

}
