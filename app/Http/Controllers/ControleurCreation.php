<?php

namespace App\Http\Controllers;

use App\Chapitre;
use App\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControleurCreation extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    //---------------------------------------------------------
    public function creerHistoire() {
        return view('creer_histoire');
    }

    public function enregistrerHistoire(Request $request) {
         // TODO
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'genre' => 'nullable',
                'pitch' => 'required',
                'photo' => 'required',
            ]
        );
        $input = $request->only(['titre', 'pitch', 'photo', 'genre_id']);

        DB::table('histoire')->insert(
            [
                'user_id' => Auth::id(),
                'titre' => $input['titre'],
                'genre_id' => $input['genre_id'],
                'pitch' => $input['pitch'],
                'photo' => $input['photo'],
                'active' => '0',
            ]
        );
        $var=Histoire::orderBy('id', 'DESC')->limit(1)->first();
        //return redirect('/mesHistoires/mesChapitres/'.$var);
        return redirect(route('mesChapitres', ['id' => $var->id]));
    }

    public function activeHistoire(Request $request, $id){
        $input = $request->only(['active']);
        $histoire = Histoire::find($id);
        if (isset($input['active'])) {
            $histoire->active = 1;
        } else {
            $histoire->active = 0;
        }
        $histoire -> save();
        return redirect(route('mesChapitres', ['id' => $id]));
    }


    //---------------------------------------------------------

    public function creerChapitre() {
        return view('creer_chapitre');
    }

    public function enregistrerChapitre(Request $request) {
        // TODO
        $this->validate(
            $request,
            [
                'histoire_id' => 'required',
                'titre' => 'nullable',
                'titrecourt' => 'required',
                'texte' => 'required',
                'photo' => 'nullable',
                'question' => 'nullable',
                'premier' => 'required',
            ]
        );
        $input = $request->only(['histoire_id', 'titre', 'titrecourt', 'texte', 'photo', 'question', 'premier']);
        DB::table('chapitre')->insert(
            [
                'histoire_id' => $input['histoire_id'],
                'titre' => $input['titre'],
                'titrecourt' => $input['titrecourt'],
                'texte' => $input['texte'],
                'photo' => $input['photo'],
                'question' => $input['question'],
                'premier' => $input['premier'],
            ]
        );

        return redirect(route('mesChapitres', ['id' => $input['histoire_id']]));
    }

    public function modifierChapitre(Request $request) {
        // TODO
        $this->validate(
            $request,
            [
                'id' => 'required',
                'titre' => 'nullable',
                'titrecourt' => 'required',
                'texte' => 'required',
                'photo' => 'nullable',
                'question' => 'nullable',
                'premier' => 'required',
            ]
        );
        $input = $request->only(['id','titre', 'titrecourt', 'texte', 'photo', 'question', 'premier']);
        DB::table('chapitre')->where('id', $input['id'])->update(
            [
                'titre' => $input['titre'],
                'titrecourt' => $input['titrecourt'],
                'texte' => $input['texte'],
                'photo' => $input['photo'],
                'question' => $input['question'],
                'premier' => $input['premier'],
            ]
        );
        $var=Chapitre::where('id', $input['id'])->first()->histoire()->first();
        return redirect(route('mesChapitres', ['id' => $var->id]));
    }





    //---------------------------------------------------------

    public function lierChapitre($histoire_id) {
        $chapitres = Chapitre::where('histoire_id', $histoire_id)->get();
        return view('lier_chapitre');
    }

    public function enregistrerLiaison(Request $request) {
        // TODO
        $this->validate(
            $request,
            [
                'chapitre_source_id' => 'required',
                'chapitre_destination_id' => 'required',
                'reponse' => 'required',
            ]
        );
        $input = $request->only(['chapitre_source_id', 'chapitre_destination_id', 'reponse']);
        DB::table('suite')->insert(
            [
                'chapitre_source_id' => $input['chapitre_source_id'],
                'chapitre_destination_id' => $input['chapitre_destination_id'],
                'reponse' => $input['reponse']
            ]
        );
        $var=Chapitre::where('id', $input['chapitre_source_id'])->first()->histoire()->first();
        return redirect(route('mesChapitres', ['id' => $var->id]));
    }
}
