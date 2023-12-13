<x-layout>
  {{-- Saluto  --}}
  <div class="container">
    <div class="row">
      <div class="col-12 bg-card p-3 rounded-5">
        <h2 class="font-h2 text-white text-center">  Ciao {{Auth::user()->name}}</h2>
      </div>
    </div>
  </div>
      
      
  {{-- Profilo  --}}
      <div class="container d-none d-md-block shadow bg-card mt-4 p-4 rounded-5 text-white">
        <div class="row justify-content-center">
          <div class="col-4 justify-content-center d-flex">
            <img class="rounded-5" height="300px" src="https://cdn-icons-png.flaticon.com/512/17/17004.png" alt="">
          </div>
            <div class="col-4 fs-3">
              <a href="" class="me-4 text-reset">
                <i data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="bi bi-facebook"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="bi bi-twitter"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="bi bi-google"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="bi bi-instagram"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="bi bi-linkedin"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="bi bi-github"></i>
              </a>
            </div>
            <div class="col-4 justify-content-center">
              <h3>I Tuoi Dati:</h3>
              <hr>
              <h4>Nome:</h4>
              <p>{{Auth::user()->name}}</p>
              <h4>E-Mail</h4>
              <p>{{Auth::user()->email}}</p>
            </div> 
        </div>
      </div>

      {{-- dispositivi Piccoli  --}}
      <div class="d-md-none">
        <div class="container  shadow bg-card mt-4 p-4 rounded-5 text-white">
        <div class="row justify-content-center">
          <div class="col-4 justify-content-center d-flex">
            <img class="rounded-5" height="150px" src="https://cdn-icons-png.flaticon.com/512/17/17004.png" alt="">
          </div>
        </div>
      </div>
          <div class="container shadow bg-card mt-4 p-4 rounded-5 text-white">
            <div class="row justify-content-center">
              <div class="col-4 ">
              <h3>I Tuoi Dati:</h3>
              <hr>
              <h4>Nome:</h4>
              <p>{{Auth::user()->name}}</p>
              <h4>E-Mail</h4>
              <p>{{Auth::user()->email}}</p>
            </div> 
            </div>
          </div>
      </div>
      
            
        


  {{-- Annunci Creati  --}}
    <div class="container shadow bg-white rounded-5">
      <h3 class="text-center testo-3 p-4 mt-5">Articoli Creati:</h3>
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-4 col-12 col-lg-8 col-xl-4 mx-auto mb-4 justify-content-center d-flex hvr-float-shadow " data-aos="fade-right"
            data-aos-offset="300"
            data-aos-easing="ease-in-sine">
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
          @endforeach
        </div>
    </div>





</x-layout>