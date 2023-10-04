<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = ['document', 'path', 'document_type'];
    protected $table = 'documents';
    public $timestamps = true;
    protected $primaryKey = 'id';

}
