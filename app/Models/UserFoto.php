<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFoto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_user',
        'foto',
        'delete_mark',
        'created_by',
        'updated_by',
    ];

    protected $primaryKey = 'no_foto';

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
