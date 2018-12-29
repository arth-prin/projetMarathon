@extends('layouts.app')

@section('content')

    <form action='{{route('enregistrer_liaison')}}' method='POST'>
        {!! ! csrf_field() !!}
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


@endsection
