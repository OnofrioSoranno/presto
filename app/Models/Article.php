<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{   use Searchable;
    
    public function toSearchableArray(){
        $category = $this->category;
        $array = [
            'id'=>$this->id,
            'titolo'=>$this->titolo,
            'descrizione'=>$this->descrizione,
            'prezzo'=>$this->prezzo,
            'category'=>$category,
        ];
        return $array;
        }


        protected $fillable = [
        'titolo',
        'categoria',
        'descrizione',
        'prezzo',
    ]; 


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    
    public static function toBeRevisionedCount(){
        return Article::where('is_accepted', null)->count();
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

}
