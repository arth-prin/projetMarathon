<?php

use App\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

 ?>

@extends('layouts.app')

@section('content')

</table>
<form action="{{route('modifier_chapitre', ['id' => $chapitre->id])}}" method="POST">
  <fieldset><legend>Modifier Chapitre</legend>
    {!! csrf_field() !!}
    <div class="form-group row">
        <div class="col-md-4">
            <textarea name="titre" id="titre" rows="1" class="form-control"
                      value="{{ old('titre') }}" placeholder="Insérez votre titre">{{ $chapitre->titre }}</textarea>
        </div>
        <div class="col-md-4">
            <textarea name="titrecourt" id="titrecourt" rows="1" class="form-control"
                      value="{{ old('titrecourt') }}" placeholder="Insérez votre titre court">{{ $chapitre->titrecourt }}</textarea>*
        </div>
        <div class="col-md-4">
            <textarea name="texte" id="texte" rows="1" class="form-control"
                      value="{{ old('texte') }}" placeholder="Insérez votre texte">{{ $chapitre->texte }}</textarea>*
        </div>
        <div class="col-md-4">
            <textarea name="photo" id="photo" rows="1" class="form-control"
                      value="{{ old('photo') }}" placeholder="Insérez votre photo">{{ $chapitre->photo }}</textarea>
        </div>
        <div class="col-md-4">
            <textarea name="question" id="question" rows="1" class="form-control"
                      value="{{ old('question') }}" placeholder="Insérez votre question">{{ $chapitre->question }}</textarea>
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
    <div class="text-center">
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
  </fieldset>
</form>
@endsection
