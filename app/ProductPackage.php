<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'package_name', 'description', 'price', 'on_sale'
    ];

   /**
     * Set PrimaryKey
     */
    protected $primaryKey = 'product_package_id';

    /**
     * this table doesn't need timestamps
     */
    public $timestamps = false;
}
