<?php
  use App\Histoire;
 ?>

@extends('layouts.app')

@section('content')
<img src="{{ asset('img/titre.png') }}" class="titre_img">
<div id="grillestories">

    @if(!(count($stories) === 0))
    <ul class="listStories" id="grid">
              @foreach($stories as $storie)
              @if (Auth::id() == $storie->user_id || $storie->active==1)
            <li class="storie">
              <ul class=" listStorie">
                  <div><li><img src="{{ $storie->photo}}"/></li></div>
                  <div id="liste">

                    <li class="titrestorie">{{ $storie->titre}}</li>
                    <li class="auteur">Ecrit part : {{ $storie->utilisateur()->first()->name}}</li>
                    <br>
                    <li class="descrip">{{ $storie->pitch}}</li>
                    <a href="./histoire/{{ $storie->id}}"><button class="commencer" type="button">Commencer</button></a>
                  </div>

                </li>
              </ul>
            </li>
              @endif
              @endforeach
    </ul>
    @else
      <p class="noStorie">Pas d'histoires</p>
    @endif
</div>
@endsection
