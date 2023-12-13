<x-layout>
    <div class="container  mb-5" style="margin-top: 120px">
        <div class="row m-5">
            <div class=" col-md-6 col-lg-6 col-xl-6 mx-auto mb-4">
                <div class="container text-center shadow p-3 rounded-5 bg-body-secondary">
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4">
                            <h1 class="display-5"><strong>{{$article->titolo}}</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="container  p-5 colore-box rounded-5 mt-5">
                    <p><strong>Categoria:</strong></p>  
                    <p><a class="btn btn-success" href="{{route('categoryShow',['category'=>$article->category])}}"> {{$article->category->name}}</a></p></p>
                    <p><strong>Descrizione prodotto:</strong> </p>
                    <p> {{$article->descrizione}}</p>
                    <p class="bottone-offerta">Prezzo</p>
                    <p>{{$article->prezzo}}€</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mb-4">
                <div id="carouselExampleFade" class="carousel ms-5 slide carousel-fade">
                    @if($article->images)
                    <div class="carousel-inner rounded-5 shadow">
                        @foreach ($article->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                          <img src="{{$image->getUrl(400,300)}}" class="d-block w-100" alt="...">
                        </div>  
                        @endforeach
                      </div>
                      @else
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/800" class="rounded-5 d-block w-100" alt="https://picsum.photos/800">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/801" class="rounded-5 d-block w-100" alt="https://picsum.photos/801">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/802" class="rounded-5 d-block w-100" alt="https://picsum.photos/802">
                        </div>
                    </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    
    
</x-layout>