<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertisments extends Model
{
    use HasFactory;
    protected $table = 'advertisment';
    protected $fillable = [
        'user_id',
        'ad_uuid',
        'ad_name',
        'ad_company',
        'Description',
        'ad_type',
        'Estimated_budget',
        'File',
        'Project_Start',
        'Project_End',
    ];
  
}
