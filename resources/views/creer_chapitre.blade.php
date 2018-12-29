@extends('layouts.app')

@section('content')

    C'est la page du formulaire de création d'un chapitre

    <form action="{{route('enregistrer_chapitre')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Crée un chapitre</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <textarea name="histoire_id" id="histoire_id" rows="1" class="form-control"
                          value="{{ old('histoire_id') }}" placeholder="Insérez l'id de l'histoire"></textarea>
            </div>
            <div class="col-md-4">
                <textarea name="titre" id="titre" rows="1" class="form-control"
                          value="{{ old('titre') }}" placeholder="Insérez votre titre"></textarea>
            </div>
            <div class="col-md-4">
                <textarea name="titrecourt" id="titrecourt" rows="1" class="form-control"
                          value="{{ old('titrecourt') }}" placeholder="Insérez votre titre court"></textarea>*
            </div>
            <div class="col-md-4">
                <textarea name="texte" id="texte" rows="1" class="form-control"
                          value="{{ old('texte') }}" placeholder="Insérez votre texte"></textarea>*
            </div>
            <div class="col-md-4">
                <textarea name="photo" id="photo" rows="1" class="form-control"
                          value="{{ old('photo') }}" placeholder="Insérez votre photo"></textarea>
            </div>
            <div class="col-md-4">
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
        <div class="text-center">
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>


@endsection
