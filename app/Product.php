<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'on_sale'
    ];

   /**
     * Set PrimaryKey
     */
    protected $primaryKey = 'product_id';

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
