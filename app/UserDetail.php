<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'phone', 'postalcode', 'gender', 'address', 'city', 'birthdate'
    ];
    
    /**
     * Set PrimaryKey
     */
    protected $primaryKey = 'user_detail_id';

    /**
     * automaticly set created_at when creating records
     */
    public $timestamps = false;
    public function setUpdatedAt($value) {  
        static::creating( function ($model) {
            $model->setCreatedAt($model->freshTimestamp());
        });
    }
}
