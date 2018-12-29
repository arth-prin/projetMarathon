<?php

namespace App\Http\Controllers;

use App\Histoire;
use App\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ControleurVisualisation extends Controller
{
    public function index() {
        $histoires = Histoire::get();
        return view("index",array('stories' => $histoires,'home' => 1));

    }

    public function histoire($n){
        $histoire = Histoire::where('id',$n)->first();
        if (Auth::id() == $histoire->user_id || $histoire->active==1){
          if(Auth::id()){
            $tmp = DB::table('lecture')->select('*')->where('user_id',Auth::id())->where('histoire_id',$histoire->id)->first();
            if($tmp!=null){
              // return view('chapitre.show', ['chap' => Chapitre::where('id',$tmp->chapitre_id)->first()]);
              return redirect('/chapitre/'.$tmp->chapitre_id);
            }
            else{
              return view('histoire.show', ['storie' => $histoire]);
            }
          }
          else{
            return view('histoire.show', ['storie' => $histoire]);
          }
        }
        else{
          return redirect('/');
        }
    }

    public function mesHistoires(){
      if(Auth::id()){
        $histoires = Histoire::where('user_id',Auth::id())->get();
        return view("histoire.mesHistoires",array('stories' => $histoires));
      }
      else{
        return redirect('/');
      }
    }

    public function chapitre($n){
      $chap = Chapitre::where('id',$n)->first();
      $histoire = $chap->histoire()->first();
      if(Auth::id()){
        if(Auth::id() == $chap->histoire()->first()->user_id || $chap->histoire()->first()->active==1){
          $tmp = DB::table('lecture')->select('*')->where('user_id',Auth::id())->where('histoire_id',$histoire->id)->first();
          if($tmp!=null){
            DB::table('lecture')->where('user_id',Auth::id())->where('histoire_id',$histoire->id)->update(
              [
                  'chapitre_id' => $chap->id
              ]
            );
          }
          else{
            DB::table('lecture')->insert(
                [
                    'histoire_id' => date("Y-m-d H:i:s"),
                    'user_id' => Auth::id(),
                    'chapitre_id' => $chap->id,
                    'histoire_id' => $histoire->id,
                    'num_sequence' => 0
                ]
            );
          }

          return view('chapitre.show', ['chap' => $chap]);
        }
        else{
          return redirect('/');
        }
      }
      else{
        if($chap->histoire()->first()->active==1){
          return view('chapitre.show', ['chap' => $chap]);
        }
        else{
          return redirect('/');
        }
      }
    }

    public function mesChapitres($id){
      if(Auth::id()){
        $histoire = Histoire::where('id',$id)->first();
        $chapitres = Chapitre::where('histoire_id',$id)->get();
        return view("chapitre.mesChapitres",array('histoire' => $histoire,'chapitres' => $chapitres));
      }
      else{
        return redirect('/');
      }
    }

    public function editerChapitre($idC){
      $chap = Chapitre::where('id',$idC)->first();
      return view('chapitre.edition', ['chapitre' => $chap]);
    }

    public function recherche(){
      $tmp = DB::table('histoire')
      ->join('users', 'users.id', '=', 'histoire.user_id')
      // ->join('genre', 'genre.id', '=', 'histoire.genre_id')
      ->where('titre','LIKE','%'.$_GET['truc'].'%')
      ->orWhere('pitch','LIKE','%'.$_GET['truc'].'%')
      ->orWhere('name','LIKE','%'.$_GET['truc'].'%')
      // ->orWhere('label','LIKE','%'.$_GET['truc'].'%')
      ->select('histoire.id')
      ->get();

      $histoires = array();
      foreach ($tmp as $h) {
        $histoires[] = Histoire::where('id',$h->id)->first();
      }
      return view("index",array('stories' => $histoires, 'home' => 1));
    }



}
