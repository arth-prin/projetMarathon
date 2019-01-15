@extends('layouts.app')

@section('title')
{{ config('app.name') }} - Mes Histoires
@stop

@section('content')
<div class="grandtitre"> Mes Histoires</div>
<div  id="grillestories">

    @if(!(count($stories) === 0))
    <ul class="listStorie" id="grid">
              @foreach($stories as $storie)
              @if (Auth::id() == $storie->user_id || $storie->active==1)
            <li class="storie">
              <a href="{{ route('mesChapitres',['id' => $storie->id]) }}">
              <ul class=" listStorie" >

              <div>  <li><img src="{{ $storie->photo}}"/></li> <div>
                <div id="liste">
                <div> <li class="titrestorie">{{ $storie->titre}}</li> <div>
                <div> <li class="descrip">{{ $storie->pitch}}</li> <div>
                </div>
                </a></li>

              </ul>
              @endif
              @endforeach
    </ul>
    @else
      <p class="noStorie">Pas d'histoires</p>
    @endif
</div>
@endsection
