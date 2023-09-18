<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table ='services';
    protected $fillable = [
        'service',
        'slug',
        'media_id',
        'img_alt',
        'description',
        'about',
        'documents',
        'stdcosttime',
        'process',
        'seotitle',
        'seodescription',
        'seokeywords',
        'seometa',
        'faq',
        'status',
    ];
}
