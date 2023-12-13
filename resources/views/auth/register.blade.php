<x-layout>

<div style="background-color: rgb(35, 46, 62)" class="m-3 rounded-5">
    {{-- logo  --}}

    <div class="container" style="margin-top: 120px">
        <div class="row">
            <div class="col-12 justify-content-center d-flex">
                <img class="logo-extend" src="/img/colleghi.jpg" alt="logo">
            </div>
        </div>
    </div>


    {{-- form  --}}
    <div class="container rounded-5 rounded-5 shadow bg-body-secondary w-75  ">
        <div class="row justify-content-center ">
            <h2 class="text-center mb-5 mt-3 display-4"><strong>Registrati</strong> </h2>
            <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4 ">
                        <label for="name" class="form-label">Nome e Cognome</label>
                        <input type="text" name="name" placeholder="Inserisci Nome e Cognome" class="form-control" id="name">
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4 ">
                        <label for="email" class="form-label">Indirizzo E-Mail</label>
                        <input type="email" placeholder="Inserisci e-mail" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" placeholder="Inserisci Password" class="form-control" id="password">
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" placeholder="Conferma Password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="justify-content-center d-flex">
                        <button type="submit" class="btn btn-warning">Registrati</button>

                    </div>
                </form> 
            </div>          
        </div>
    </div>   
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mb-5 justify-content-center d-flex">    
                <div class="justify-content-center d-flex flex-column">
                    <h3 class="text-white mb-4">Hai già un Account?</h3>
                    <a href="{{route('login')}}" class="btn btn-warning">Accedi</a>
                </div>
            </div>
        </div>
    </div> 
</div>   
</x-layout>