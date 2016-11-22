@extends('layouts.master')

@section('content')

<!-- Main Section -->
<section id="main">
  <div class="row center">
    <div class="col-md-12 center">
      <form class="form-inline">
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Cari dokumen dengan judul atau pemilik">
          <button class="btn btn-default">Temukan</button>
        </div>
      </form>
    </div>
  </div>
  <br>
  <div class="row center">
    <div class="col-md-12 center">
      @if($documents_count>0)
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Aksi</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
        @foreach($documents as $document)
          <tr>
            @if($document->filetype == 'pdf')
              <th scope=row><img src="img/document_logo/pdf.svg"/></th>
            @else
              <th scope=row><img src="img/document_logo/doc.svg"/></th>
            @endif
            <td>{{ $document->title }}<br> <small>{{ $document->author }}</small></td>
            <td><a href="{{ url('/detail/'.$document->author_id.'/'.$document->id) }}"><button class="btn btn-warning btn-sm">Detail</button></a>&nbsp;<button class="btn btn-info btn-sm">Unduh</button></td>
            <td>{{ $document->hit }}
                @if($document->hit > 1)
                  Hits
                @else
                  Hit
                @endif
            </td>
          </tr>
        @endforeach
          </tbody>
        </table>
      @else
        <p>Maaf, belum ada data dokumen dalam server.<p>
      @endif
    </div>
  </div>
</section>

@endsection
