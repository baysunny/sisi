<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'level',
        'delete_mark',
        'created_by',
        'updated_by',
    ];

    protected $primaryKey = 'id_level';

    public $incrementing = false;
    // public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = 'MLID_' . uniqid();
        });

        static::deleting(function ($model) {
            $model->delete_mark = '1';
            $model->save();
        });
    }

    public function menus(){
        return $this->hasMany(Menu::class, 'id_level');
    }
}