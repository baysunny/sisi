<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'deskripsi',
        'status',
        'menu_id',
        'delete_mark',
        'created_by',
        'created_date',
    ];

    protected $primaryKey = 'no_activity';
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->delete_mark = '1';
            $model->save();
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
