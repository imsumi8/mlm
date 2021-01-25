<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    // use SoftDeletes;

    // protected $fillable = ['name','phone','email','address'];

    protected $guarded=[];

    protected $table="hrm_post";
    protected $primaryKey = 'ID';

    public $timestamps=false;
    protected $dates = ['HRM_ADDED_TIME','HRM_DATE'];


    public function sells()
    {
        return $this->hasMany(Sell::class);
    }

    public function payments()
    {
        return $this->hasMany(PaymentFromCustomer::class);
    }
}
