<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use Notifiable;
    protected $table='vendors';
    protected $fillable = [
       'longitude','latitude', 'name', 'mobile', 'address','password', 'email', 'logo', 'category_id', 'active','created_at','updated_at'
    ];
    protected $hidden = ['category_id','password'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
    public function scopeSelection($query)
    {
        return $query->select('longitude','latitude','id', 'category_id','active','address','email', 'name', 'logo', 'mobile');
    }
    public function category(){
       return $this->belongsTo('App\Models\MainCategory','category_id','id');
    }
    public  function  getActive(){
        return $this->active==1?'مفعل':'غير مفعل';
    }

    public  function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password']=bcrypt($password);
        }
    }
}
