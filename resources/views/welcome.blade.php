<x-layout >
  @if (session('access.denied'))
  <div class="alert alert-success">
    {{ session('access.denied') }}
  </div>
  @endif
  

 

      {{-- carosello dispositivi grandi  --}}
      <div class="container d-none d-md-block">
        <div class="row">
          <div class="col-12">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner carousel-inner ">
                <div class="carousel-item active" data-bs-interval="3000">
                  <img src="https://cdn.mos.cms.futurecdn.net/8E6totXLziTcHNNtStGadb.jpg" class="d-block immagini-carosello carosello-home img-fluid w-100 h-50 rounded-5 " alt="https://picsum.photos/800">
                </div>
                <div class="carousel-item " data-bs-interval="3000">
                  <img src="https://assets-prd.ignimgs.com/2022/11/26/amazon-buy-2-get-1-free-deal-ign-cyber-monday-2022-1669465169940.png" class="d-block carosello-home img-fluid w-100 h-50 rounded-5" alt="https://picsum.photos/801">
                </div>
                <div class="carousel-item " data-bs-interval="3000">
                  <img src="https://hd2.tudocdn.net/971566?w=1920" class="d-block carosello-home img-fluid w-100 h-50 rounded-5" alt="https://picsum.photos/802">
                </div>
                
                
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      {{-- Fine Carosello dispositivi grandi  --}}

      {{-- carosello display piccoli  --}}
      <div class="container d-md-none">
        <div class="row">
          <div class="col-12">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner carousel-inner ">
                <div class="carousel-item active" data-bs-interval="3000">
                  <img src="https://cdn.mos.cms.futurecdn.net/8E6totXLziTcHNNtStGadb.jpg" class="d-block immagini-carosello carosello-home w-100 h-100 rounded-5 " alt="https://picsum.photos/800">
                </div>
                <div class="carousel-item " data-bs-interval="3000">
                  <img src="https://assets-prd.ignimgs.com/2022/11/26/amazon-buy-2-get-1-free-deal-ign-cyber-monday-2022-1669465169940.png" class="d-block carosello-home w-100 h-100 rounded-5" alt="https://picsum.photos/801">
                </div>
                <div class="carousel-item " data-bs-interval="3000">
                  <img src="https://hd2.tudocdn.net/971566?w=1920" class="d-block carosello-home w-100 h-100 rounded-5" alt="https://picsum.photos/802">
                </div>
                
                
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
  
      {{-- fine carosello display piccoli  --}}
  
      {{-- Categorie dispositivi grandi  d-md-block --}}
      <div class=" container d-none d-md-block mb-5 box-prodotti bg-body-tertiary p-2 shadow rounded-5 justify-content-center mt-5 ">
        <div class="row m-5 justify-content-evenly ">
          <div class="col-12">
            <h1 class="text-center font-h1 mb-5 display-4 ">{{__('ui.categorie')}}</h1>
          </div>
          
            @foreach ($categories as $category)
            <div class="col-6 col-md-2 me-md-1">
            <div data-aos-offset="300" data-aos-easing="ease-in-sine">
              <div class="m-3 " >
               <a href="{{route('categoryShow', compact('category'))}}"><img src="{{$category->img}}"data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="categorie-bordo bg-body-secondary card-img-top hvr-float-shadow"  alt="immagini"></a> 
                <div class="card-body">
                  <a class="nav-link text-body-secondary m-4 fs-3 hvr-float-shadow justify-content-center d-flex text-center" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a>
                </div>
              </div>                 
            </div> 
          </div> 
            @endforeach
        </div>
      </div>
      {{-- fine Categorie Dispositivi grandi --}}

      {{-- Inizio Categorie Dispositivi Piccoli --}}
        <div class="container d-md-none mb-5 bg-card shadow rounded-5 justify-content-center" style="margin-top: 110px" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <div class="row m-5 ">
            <div class="col-12">
              <h1 class="text-center font-h2 text-white mb-5 ">{{__('ui.categorie')}}</h1>
            </div>
              <div class="col-12">
                <div id="carouselExample" class="carousel slide">
                  <div class="carousel-inner ">
                    @foreach ($categories as $category)
                      <div class="carousel-item @if($loop->first) active @endif" >
                        <a href="{{route('categoryShow', compact('category'))}}"><img src="{{$category->img}}" class=" categorie-bordo-phone fs-5 card-img-top rounded-5 " alt="immagini"></a>
                        <div class="card-body">
                          <a class="btn-bordo m-4 fs-3 btn hvr-float-shadow btn-warning justify-content-center d-flex text-center" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a>
                        </div>
                      </div>      
                    @endforeach 
                  </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                </div>
              </div>
            </div>  
          </div>
        </div>
      {{-- fine Categorie dispositivi piccoli  --}}

{{-- INSERIMENTO CARD --}}


<div class="container bg-card p-2 shadow rounded-5" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
  <div class="row justify-content-center">
    <div class="col-12 "data-aos="fade-up" data-aos-anchor-placement="bottom-center">
      <div class=" m-5  justify-content-center d-flex">
          <a  class="fs-2 btn btn-dark hvr-bounce-to-right"href="{{route('create_article')}}">{{__('ui.inserisciAnnuncio')}}</a>
      </div>
    </div>
  </div>
  <div class="row m-5">
    <h1 class="text-center font-h1 text-white mb-5">{{__('ui.ultimiArticoli')}}</h1>
    @forelse ($articles as $article)
          <div class="col-md-8 col-lg-8 col-xl-4 mx-auto mb-4 justify-content-center d-flex hvr-float-shadow " data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
            <div class="card card mb-5 " style="width: 18rem;">
                  <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,300) : '/img/colleghi.jpg'}}" class="card-img-top" alt="immagini">
                  <div class="card-body ">
                    <h5 class="card-title text-center">{{$article->titolo}}</h5>
                    <hr>
                    <p class="card-text ">{{__('ui.categoria')}}: <strong> {{$article->category->name}}</strong></p>
                    <p class="card-text text-truncate">{{$article->descrizione}}</p>
                    <p class="card-text">€ {{$article->prezzo}}</p>
                    
                      <div class="card-footer m-3 text-body-secondary">
                        {{__('ui.pubblicato')}} {{$article->created_at->format('d/m/y')}} <hr> - {{__('ui.autore')}}: {{$article->user->name}}
                      </div>
                      <a href="{{route('showArticle', compact('article'))}}" class="btn hvr-forward btn-warning">{{__('ui.visArticolo')}}</a>
                  </div>               
            </div>          
          </div>
        @empty
        <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4">
            <div class="alert alert-warning py-3 shadow">
              <p class="lead">{{__('ui.nessunannuncio')}}</p>
            </div>
        </div>
      @endforelse
  </div>
</div>

</x-layout>

