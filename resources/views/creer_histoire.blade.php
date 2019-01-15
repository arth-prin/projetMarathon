<?php
    use Illuminate\Support\Facades\DB;
?>

@extends('layouts.app')

@section('title')
{{ config('app.name') }} - Créer une histoire
@stop

@section('content')

<div class="formulaire">
    <form action="{{route('enregistrer_histoire')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Créer une histoire</h3>
            <hr class="mt-2 mb-2">
        </div>

        <div id=""
        <div class="form-group row">
            <div class="col-md-4">
              <p class="texteform"> Votre titre:      * </p>
                <textarea name="titre" id="titre" rows="1" class="form-control"
                          value="{{ old('titre') }}" placeholder="Insérez votre titre"></textarea>
                          <br>
            </div>
<div class="col-md-4">
  <select name="genre_id">
    <option></option>
    <?php $genres = DB::table('genre')->select('*')->get(); ?>
    @foreach ($genres as $genre)
<option value="{{$genre->id }}">{{ $genre->label }}</option>
@endforeach
</select>
</div>
            <div class="col-md-4">
                <p class="texteform"> Votre pitch:    * </p>
                <textarea name="pitch" id="pitch" rows="1" class="form-control"
                          value="{{ old('pitch') }}" placeholder="Insérez votre pitch"></textarea>
            </div>
            <div class="col-md-4">
                <p class="texteform"> Votre photo:    * </p>
                <textarea name="photo" id="photo" rows="1" class="form-control"
                          value="{{ old('photo') }}" placeholder="Insérez votre photo"></textarea>
            </div>
        </div>
        <br>
          * champ obligatoire
        <div class="text-center">
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>

  </div>
  <br>
  <br>
@endsection
