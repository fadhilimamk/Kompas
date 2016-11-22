@extends('layouts.app')

@section('head')
  <link rel="stylesheet" href="{{asset('css/tokenize2.css')}}" />
  <link rel="stylesheet" href="{{asset('css/datepicker.css')}}" />
  <link href="{{asset('css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<div class="container">
  @if (Session::has("message"))
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
            {{ Session::get("message") }}
        </div>
      </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{url('/home')}}"><span class="fa fa-home" aria-hidden="true"></span> Depan</a> / Unggah Dokumen</div>
                <div class="panel-body">
                  <form class="form-horizontal" action="{{url('/home/upload/add')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="judul">Judul:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul dokumen">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="kategori">Kategori:</label>
                      <div class="col-sm-10">
                        <select class="category" name="kategori[]" id="kategori" multiple>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="tahun_arsip">Tanggal Arsip:</label>
                      <div class="col-sm-10">

                        <div class="input-group date" id="tanggal_arsip" data-date="12/2016" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="add-on fa fa-calendar"></i></button>
                          </span>
                          <input size="16" type="text" value="12/2016" id="tanggal" name="tanggal" readonly>
                        </div>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="tahun_arsip">Dokumen:</label>
                      <div class="col-sm-10">
                        <input type="file" name="file" id="file"/>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-default submit" value="Simpan">
                        <button class="btn btn-default">Batal</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('foot')
  <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="{{asset('js/tokenize2.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js/plugins/canvas-to-blob.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/plugins/sortable.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/plugins/purify.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/fileinput.min.js')}}"></script>
  <script src="{{asset('js/locales/id.js')}}"></script>
  <script>
  window.onload = function() {
    $('.category').tokenize2(
      {
        placeholder: "Tulis kategori dokumen anda",
        dataSource: '{{url("search-category")}}',
        tokensMaxItems: 5,
        tokensAllowCustom	:true
      }
    );

    $('#tanggal_arsip').datepicker()

    $("#file").fileinput({
      maxFileCount: 1,
      showUpload: false
    });

  }
  </script>

@endsection
