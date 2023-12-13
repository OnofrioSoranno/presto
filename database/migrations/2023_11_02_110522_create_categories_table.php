<?php


use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });
        $categories=[
        ['name'=>'Smartphone', 'img'=>'/img/smartphone.webp'], 
        ['name'=>'Pc', 'img'=>'/img/pc.png'], 
        ['name'=>'Console', 'img'=>'/img/console.png'] , 
        ['name'=>'Tv', 'img'=>'/img/tv.webp'], 
        ['name'=>'Soundbar', 'img'=>'/img/saundbar.png'], 
        ['name'=>'Frigoriferi', 'img'=>'/img/frigorifero.png'],
        ['name'=>'Modem', 'img'=>'/img/modem.png'], 
        ['name'=>'Tablet', 'img'=>'/img/tablet.png'] ,
        ['name'=>'Webcam', 'img'=>'/img/webcam.png'], 
        ['name'=>'Macchine Fotografiche', 'img'=>'/img/fotocamera.png'],
    ];
        foreach($categories as $category){
            Category::create([
                'name'=>$category['name'],
                'img'=>$category['img']
            ]);

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
