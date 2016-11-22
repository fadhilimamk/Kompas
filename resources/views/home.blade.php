@extends('layouts.app')

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
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>
                <div class="panel-body">
                    <h3 style="margin-top:10px">{{ Auth::user()->name }}</h3>
                    <table>
                      <tr><td>Kampus</td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><b>{{ Auth::user()->campus }}</b></td></tr>
                      <tr><td>Email</td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><b>{{ Auth::user()->email }}</b></td></tr>
                      <tr><td>Username</td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><b>{{ Auth::user()->username }}</b></td></tr>
                      <tr><td>Website</td><td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><a href="#">{{ Auth::user()->website }}</a></td></tr>
                    </table>
                    <br>
                    <p>Aktif sejak {{ date_format(Auth::user()->created_at,"d F Y") }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-default text-center">
              <div class="panel-heading">Unggah Dokumen</div>
              <div class="panel-body">
                  <p>Bagikan dokumenmu ke masyarakat umum, sehingga mereka dapat tahu tentang pergerakan yang telah anda lakukan</p>
                  <a href="{{url('home/upload')}}"><button>Unggah</button></a>
              </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if($documents_count>0)
                      <p>Terimakasih, anda sudah membagikan <span style="font-size:18pt;font-weight:bold">{{ $documents_count }}</span> dokumen.<p>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Judul</th>
                            <th>Hit</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach($documents as $document)
                        <tr>
                          <td>{{ $document->title }}</td>
                          <td>{{ $document->hit }} kali</td>
                          <td><button class="btn btn-sm">Edit</button>&nbsp;<button class="btn btn-sm">Hapus</button></td>
                        </tr>
                      @endforeach
                        </tbody>
                      </table>
                      <button>Lihat Semua</button>
                    @else
                      <p>Maaf, anda belum menunggah dokumen sama sekali, pergi ke menu <a href="{{ url('home/upload') }}">Unggah</a> untuk membagikan dokumen anda.<p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-default">
              <div class="panel-heading">Statistik</div>
              <div class="panel-body">
                <p>Jumlah Dokumen : {{ $documents_count }}</p>
                <p>Jumlah Hit : {{ $hit_count }}</p>
                <p>Jumlah Unduh : 10</p>
                <p>Dokumen paling banyak dilihat : {{ $most_hit }}</p>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
