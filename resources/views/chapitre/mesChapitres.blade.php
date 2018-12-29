<?php

use App\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

 ?>

@extends('layouts.app')

@section('content')

<!-- <ul>

  @foreach($chapitres as $chapitre)

  <td>
    <ul>
      <a href="/mesHistoires/{{ $chapitre->id }}/mesChapitres/{{ $chapitre->id }}">
        <li class="pitch">{{ $chapitre->titrecourt}}</li>
        <li class="photo"><img src="{{ $chapitre->photo}}"/></li>
        <li class="pitch">{!! $chapitre->texte !!}</li>
      </a>
  </ul>
</li>

  @endforeach

</ul> -->
<div class="formulaire1">
<div class="panel panel-primary">
    <form action="{{route('active_histoire', ['id' => $histoire->id])}}" method="POST">
        {!! csrf_field() !!}
        <div>
            Histoire active ? <input type="checkbox" name="active" value="active" {{($histoire->active ? "checked" : "") }} ><button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
<table class="table table-striped table-condensed">
  @foreach($chapitres as $chapitre)
  <tr>

      <!-- <a href="/mesHistoires/{{ $chapitre->id }}/mesChapitres/{{ $chapitre->id }}"> -->
        <td class="pitch">{{ $chapitre->id}}</td>
        <td class="pitch">{{ $chapitre->titrecourt}}</td>
        <td class="pitch">{!! $chapitre->texte !!}</td>
        <td class="pitch">{!! $chapitre->question !!}</td>
        <td class="pitch"><form action="{{ route('editerChapitre', ['idC' => $chapitre->id]) }}"><input type="submit" value="Editer" style="width:100%"></form></td>
</tr>
  @endforeach
</table class="table-striped">
</div>
<form action="{{route('enregistrer_chapitre', ['histoire_id' => $histoire->id])}}" method="POST">
  <fieldset>
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3><i class="far fa-edit"></i> Crée un chapitre</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div class="form-group row">

        <div class="col-md-4">
          <p class="texteform"> Votre titre:      * </p>
            <textarea name="titre" id="titre" rows="1" class="form-control"
                      value="{{ old('titre') }}" placeholder="Insérez votre titre"></textarea>
        </div>
        <div class="col-md-4">
          <p class="texteform"> Votre titre court:      * </p>
            <textarea name="titrecourt" id="titrecourt" rows="1" class="form-control"
                      value="{{ old('titrecourt') }}" placeholder="Insérez votre titre court"></textarea>
        </div>
        <div class="col-md-4">
          <p class="texteform"> Votre texte:      * </p>
            <textarea name="texte" id="texte" rows="1" class="form-control"
                      value="{{ old('texte') }}" placeholder="Insérez votre texte"></textarea>
        </div>
        <div class="col-md-4">
          <p class="texteform"> Votre photo:      * </p>
            <textarea name="photo" id="photo" rows="1" class="form-control"
                      value="{{ old('photo') }}" placeholder="Insérez votre photo"></textarea>
        </div>
        <div class="col-md-4">
          <p class="texteform"> Votre question:      * </p>
            <textarea name="question" id="question" rows="1" class="form-control"
                      value="{{ old('question') }}" placeholder="Insérez votre question"></textarea>
        </div>

        <div class="col-md-4">
            Premier chapitre ?
            <label>
                Oui
                <input type="radio" name="premier" value="1">
            </label>
            <label>
                Non
                <input type="radio" name="premier" value="0">
            </label>
        </div>
        <label class="col-md-2 form-control-label" for="select">
            <strong>Accomplie ?</strong>
        </label>
    </div>
    <br>
      * champ obligatoire
    <div class="text-center">
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
  </fieldset>
</form>

<br>
<br>
<br>
{{$histoire->id}}
<form action='{{route('enregistrer_liaison', ['histoire_id' => $histoire->id])}}' method='POST'>
    @csrf
    <h3>Lier les chapitres</h3>
    <label>
        Chapitre source
        <select name="chapitre_source_id">
            @foreach($chapitres as $chapitre)
                <option value='{{$chapitre->id}}'>{{$chapitre->titrecourt}}</option>
            @endforeach
        </select>
    </label>
    <label>
        Chapitre destination
        <select name="chapitre_destination_id">
            @foreach($chapitres as $chapitre)
                <option value='{{$chapitre->id}}'>{{$chapitre->titrecourt}}</option>
            @endforeach
        </select>
    </label>
    <label>
        Réponse
        <input type="text" placeholder="Réponse" name="reponse" id="reponse">
    </label>
    <button type="submit">Valide</button>
</form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
