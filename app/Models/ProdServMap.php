<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdServMap extends Model
{
    use HasFactory;
    protected $table = 'prod_serv_maps';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'service_id',
        'status',
    ];
}
