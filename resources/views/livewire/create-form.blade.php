<div class="container rounded-5 p-2 shadow" style="background-color: rgb(35, 46, 62)" style="margin-top: 130px ">
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center d-flex">
                <img class="logo-extend" src="/img/colleghi.jpg" alt="logo">
            </div>
        </div>
    </div>
    <h2 class=" display-3 m-5 text-center text-white font-creaannuncio ">{{__('ui.creann')}}</h2>
    <div class="container mt-5  mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
                <form wire:submit.prevent='store'>
                    @csrf
                    <div class="mb-3">
                      <label for="titolo text-white" class="form-label text-white">{{__('ui.titolocf')}}</label>
                      <input type="text" wire:model.live='titolo' placeholder={{__('ui.inst')}} class="form-control" id="titolo">
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-labe text-white ">{{__('ui.categoria')}}</label>
                        <select wire:model.defer="category" id="disabledSelect"  class="form-select">
                          <option value="">{{__('ui.scegcat')}}</option>
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                         
                        </select>
                      </div>
                    <div class="mb-3">
                      <label for="descrizione" class="form-label text-white">{{__('ui.descrizione')}}</label>
                      <input type="text" wire:model.live="descrizione" placeholder= "{{__('ui.sdesc')}}" class="form-control" id="descrizione">
                    </div>
                    <div class="mb-3">
                        <label for="prezzo" class=" text-white">{{__('ui.prezzo')}}</label>
                        <input type="number" wire:model.live="prezzo" class="form-control" placeholder="{{__('ui.insp')}}" id="prezzo" >
                    </div>
                    <div class="mb-3">
                        <label class="text-white" for="text">{{__('ui.scegliimmagine')}}</label>
                        <input wire:model="temporary_images" multiple class="form-control shadow @error('img') is-invalid @enderror" type="file">
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>{{__('ui.anteprimaimg')}}</p>
                                <div class="row border border-4 border-info rounded shadow py-4">
                                    @foreach ($images as $key=>$image)
                                        <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded" style="background-image:url({{$image->temporaryUrl()}});"></div>
                                        <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click='removeImage({{$key}})'>{{__('ui.cancella')}}</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    
                        
                    @endif
                    <button type="submit" class="btn btn-primary">{{__('ui.creaannuncio')}}</button>
                  </form>
            </div>
        </div>
    </div>
</div>
