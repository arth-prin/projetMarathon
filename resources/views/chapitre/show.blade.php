<?php

use App\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

 ?>

@extends('layouts.app')

@section('content')
  <ul>
  @if($chap->premier==1)
    <li  ><a class="chap" href="{{route('chapitre', ['id' =>  $chap->id])}}">Chapitre 1</a></li>
  @else
    <?php
    $tmp = $chap;
    $parents = array();
    while(1){
      $parents[]=$tmp;
      $idP = DB::table('suite')->select('chapitre_source_id')->where('chapitre_destination_id', $tmp->id)->first()->chapitre_source_id;
      $tmp = Chapitre::where('id',$idP)->first();
      if($tmp->premier==1){
        $parents[]=$tmp;
        break;
      }
    }
    $parentsR = array_reverse($parents);
    $i=1; ?>
    @foreach ($parentsR as $parent)
      <li  ><a class="chap" href="{{route('chapitre', ['id' => $parent->id])}}">Chapitre {{ $i }}</a></li>
      <?php $i++; ?>
    @endforeach
  @endif
</ul>

<div id="grillestories">
      <ul id="grid3">
        <div>  <li class="pitch2">{{ $chap->titrecourt}}</li> </div>
        <div>  <li class="photo"><img src="{{ $chap->photo}}"/></li> </div>
        <div>  <li class="pitch">{!! $chap->texte !!}</li> </div>
      </ul>


<ul class="question" >{{ $chap->question}}

      @foreach($chap->suites as $suite)
      <div class="flex">
        <li ><a class="choix" href="{{route('chapitre', ['id' =>  $suite->id])}}">{{ DB::table('suite')->select('reponse')->where('chapitre_source_id',$chap->id)->where('chapitre_destination_id',$suite->id)->first()->reponse }}</a></li>
</div>
      @endforeach
</ul>
</div>
@endsection
