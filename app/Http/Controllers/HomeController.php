<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Document;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = DB::table('documents')->where('author_id', '=', Auth::user()->id)->get();
        $documents_count = count($documents);
        $hit_count = 0;
        $download_count = 0;
        foreach ($documents as $document) {
          $hit_count = $hit_count + $document->hit;
          $download_count = $download_count + $document->download;
        }
        $documents = DB::table('documents')->where('author_id', '=', Auth::user()->id)->orderBy('download')->take(1)->get();
        $most_hit = "Belum ada";
        foreach ($documents as $document) {
          if($document->hit!=0){
            $most_hit = $document->title;
          }
        }
        $documents = DB::table('documents')->where('author_id', '=', Auth::user()->id)->take(8)->get();
        return view('home', ['documents'=>$documents, 'documents_count'=>$documents_count,'hit_count'=>$hit_count,'download_count'=>$download_count,'most_hit'=>$most_hit]);
    }



}
