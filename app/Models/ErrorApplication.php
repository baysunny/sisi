<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'error_date',
        'modules',
        'controller',
        'function',
        'error_line',
        'error_message',
        'status',
        'param',
        'delete_mark',
        'created_by',
        'updated_by',
    ];

    protected $primaryKey = 'error_id';

}
