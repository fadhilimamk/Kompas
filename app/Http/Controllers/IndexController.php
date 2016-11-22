<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Document;
use DB;
use Session;

class IndexController extends Controller
{
  public function index()
  {
      $documents = DB::table('documents')->orderBy('hit','download')->take(10)->get();
      $documents_count = count($documents);

      return view('index', ['documents'=>$documents,'documents_count'=>$documents_count]);
  }

  public function detailindex($author_id,$id)
  {
    $documents = DB::table('documents')->where('id', '=', $id)->get();
    DB::table('documents')->where('id', '=', $id)->increment('hit');
    $links = DB::table('links')->where('id', '=', $id)->get();
    $path = storage_path(). '/app/public/' . $links[0]->url;
    $filetype = $documents[0]->filetype;
    $path = str_replace('\\','/',$path);
    return view('viewer',['url'=>$links[0]->url, 'filetype'=>$filetype, 'path'=>$path, 'properties'=>$documents[0]]);
  }

  public function ShowCategories()
  {
    $categories = DB::table('categories')->get();
    $datas = array();
    foreach ($categories as $category) {
      array_push($datas,["value"=>$category->id,"text"=>$category->text]);
    }
    echo json_encode($datas);
  }

  public function SearchCategory(){
    header('content-type: text/json');
    $search = preg_quote(isset($_REQUEST['search']) ? $_REQUEST['search'] : '');
    $start = (isset($_REQUEST['start']) ? $_REQUEST['start'] : 1);
    $obj = json_decode(file_get_contents(url('categories')), true);
    $ret = array();

    foreach($obj as $item)
    {
        if(preg_match('/' . ($start ? '^' : '') . $search . '/i', $item['text']))
        {
            $ret[] = array('value' => $item['text'], 'text' => $item['text']);
        }
    }

    echo json_encode($ret);

  }

}
