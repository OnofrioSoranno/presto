<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateForm extends Component
{
    use WithFileUploads;
    
    public $titolo;
    public $category;
    public $descrizione;
    public $testo;
    public $prezzo;
    public $temporary_images;
    public $images = [];
    public $article;

    
    protected $rules=[
        'titolo'=> 'required|min:2',
        'category'=> 'required',
        'descrizione'=> 'required|min:5',
        'prezzo'=> 'required|numeric',
        'images.*'=>'image|max:1024|required',
        'temporary_images.*'=>'image|max:1024|required',
        
    ];
    
    protected $messages = [
        'titolo.required'=> 'Il testo è obbligatorio',
        'titolo.min'=> 'il titolo deve avere minimo 2 caratteri ',
        'category.required'=> 'La Categoria è obbligatoria',
        'descrizione.required'=>'La descrizione è obbligatoria ',
        'descrizione.min'=>'La descrizione deve essere minimo di 5 caratteri',
        'prezzo.required'=>"L'inserimento del prezzo è obbligatorio",
        'images.max'=>'L\' immagine dev\'essere massimo di 1mb',
        'images.image'=>'Il file deve essere un\'immagine',
        'temporary_images.*.image'=> 'I file devono essere delle immagini',
        'temporary_images.*.max'=>'L\' immagine dev\'essere massimo di 1mb',
        
    ];
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>"image|max:1024"
        ])){
            foreach ($this->temporary_images as $image) {
                $this->images[]= $image;
            }
        }
    } 

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
    

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function store(){
        $this->validate();
        $category= Category::find($this->category);

        $this->article = Category::find($this->category)->articles()->create($this->validate());      
        if(count($this->images)) {
            foreach ($this->images as $image) {
                // $this->article->images()->create(['path' =>$image->store ('images' , 'public')]);
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path'=>$image->store($newFileName,'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }



        Auth::user()->articles()->save($this->article);
        $this->cleanForm();
        session()->flash('message', 'Articolo creato con successo, sarà pubblicato dopo la revisione.');

    }
    

    public function cleanForm(){
        $this->titolo= '';
        $this->descrizione ='';
        $this->prezzo = '';
        $this->images=[];
        $this->temporary_images=[]; 
    }


    public function render()
    {
        return view('livewire.create-form');
    }
   
}
