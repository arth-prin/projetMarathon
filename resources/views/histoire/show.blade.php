@extends('layouts.app')

@section('title')
{{ config('app.name') }} - {{$storie->titre}}
@stop

@section('content')
<div id="grillestories">
      <ul id="grid2">
          <!-- <li class="id">{{ $storie->id}}</li> -->
         <div> <li class="photo"><img src="{{ $storie->photo}}"/></li></div>
          <div><li class="titre">{{ $storie->titre}}</li></div>
          <div><li class="pitch">{{ $storie->pitch}}</li></div>

         <div> <a class="commencer" href="{{route('chapitre', ['id' =>  $storie->premierChapitre()['id'] ])}}">Commencer</a></div>
         <br>
         <br>
         <br>
         <br>
         <br>
      
      </ul>
      <br>
      <br>
      <br>
      <br>


</div>
@endsection
