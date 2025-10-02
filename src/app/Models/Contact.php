<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name','last_name','gender','email','tel','address','detail','category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


/* search function */
    public function scopeAllSearch($query,$name_email,$gender,$date,$category_content)
    {
        if(! empty($name_email))
        {
            $query->where(function ($q)use ($name_email){
                $q->where('first_name', 'like', "%{$name_email}%")
                ->orWhere('last_name','like',"%{$name_email}%")
                ->orWhere('email','like',"%{$name_email}%");
            });
        }

        if(! empty($gender))
        {
            $query->where('gender',$gender);
        }

        if(! empty($date)){
            $query->whereDate('created_at',$date);
        }

        if(!empty($category_content)){
            $query->whereHas('category',function ($q)use ($category_content){
                $q->where('content',$category_content);
            });
        }

        return $query;

    }
}
