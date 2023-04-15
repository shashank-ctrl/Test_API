<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = ['title','description' ,'image'];

   

    public function addPosts($input)
    {
     
        return static::create(array_only($input,$this->fillable));
    }


    public function findPosts($id)
    {
        return static::where('id',$id)->first();
    }

    
    public function updatePosts($id, $input)
    {
        return static::where('id',$id)->update(array_only($input,$this->fillable));
    }


    public function deletePosts($id)
    {
        return static::where('id',$id)->delete();
    }

}
