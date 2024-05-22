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
}
