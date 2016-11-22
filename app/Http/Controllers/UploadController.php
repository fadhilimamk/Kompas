<?php

namespace App\Http\Controllers;

use App\Document;
use App\Link;
use App\Category;
use Request;
use Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Auth;
use DB;
use Input;

class UploadController extends Controller{
    public function index() {
      $categories = DB::table('categories')->get();
      return view('upload',['categories'=>$categories]);
    }

    public function uploadFiles() {
      var_dump(Request::all());
      if(Request::file('file')==NULL || Request::input('judul') == NULL || Request::input('tanggal') == NULL || Request::input('kategori') == NULL){
        Session::flash('message', 'Data belum lengkap! Mohon lengkapi terlebih dahulu');
        return redirect('/home/upload');
      }else{
        $file = Request::file('file');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
        $entry = new Document();
        $link = new Link();
        $user = Auth::user();
        $entry->filetype = $file->getClientOriginalExtension();
        $entry->filename = $file->getClientOriginalName();
        $entry->filesize = $file->getSize();
        $entry->author = $user->name;
        $entry->author_id = $user->id;
        $entry->title = Request::input('judul');
        $temp = substr_replace(Request::input('tanggal'),'1/',3,0);
        $entry->tanggal_arsip = date('Y-m-d H:i:s', strtotime($temp));
        $cats = Request::input('kategori');
        foreach ($cats as $cat) {
          $x = DB::table('categories')->where('value', '=', $cat)->get();
          if (!count($x)) {
            $category = new Category;
            $category->value = $cat;
            $category->text = $cat;
            $category->save();
          }
        }
        $entry->category = json_encode($cats);
        $entry->save();
        $link->id = $entry->id;
        $link->url = $file->getFilename().'.'.$extension;
        $link->save();

        Session::flash('message', 'Dokumen berhasil diunggah!');
        return redirect('/home');
      }
    }
}
