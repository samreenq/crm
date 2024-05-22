<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelInvoices extends Model
{
    use HasFactory;
    protected $table = "invoices";
    protected $primaryKey = "invoice_id";

    
    public function getPurchasersDetail()
    {
        return $this->hasOne('App\Models\ModelUsers','id', 'user_id');
    }
}