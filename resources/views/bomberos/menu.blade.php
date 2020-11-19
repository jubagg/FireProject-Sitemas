<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Nuevo</a>
    @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)
    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Listado</a>
    @endif
  </div>
