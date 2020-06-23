<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $table='main_categories';
    protected $fillable = [
       'id', 'translation_lang', 'translation_of','name', 'slug','photo','active','created_at','updated_at'
    ];
    public  function scopeActive($query){
        return $query->where('active',1);
    }
    public  function scopeSelection($query){
        return $query->select('id', 'translation_of','name', 'slug','photo','active');
    }
    public  function  getActive(){
        return $this->active==1?'مفعل':'غير مفعل';
    }

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/'.$val) : "";

    }
}
