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
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope=row><img src="img/document_logo/pdf.svg"/></th>
            <td>Peraturan MWA No.012/2014 Tentang Sistem Perencanaan ITB PTNBH <br> <small>Direktorat Sistem dan Teknologi Informasi</small></td>
            <td><button class="btn btn-warning btn-sm">Detail</button>&nbsp;<button class="btn btn-info btn-sm">Unduh</button></td>
          </tr>
          <tr>
            <th scope=row><img src="img/document_logo/pdf.svg"/></th>
            <td>Peraturan MWA No.010/2014 Tentang Kode Etik Mahasiswa ITB <br> <small>Direktorat Sistem dan Teknologi Informasi</small></td>
            <td><button class="btn btn-warning btn-sm">Detail</button>&nbsp;<button class="btn btn-info btn-sm">Unduh</button></td>
          </tr>
          <tr>
            <th scope=row><img src="img/document_logo/doc.svg"/></th>
            <td>Laporan Rektor ITB Tahun 2015 <br> <small>Direktorat Sistem dan Teknologi Informasi</small></td>
            <td><button class="btn btn-warning btn-sm">Detail</button>&nbsp;<button class="btn btn-info btn-sm">Unduh</button></td>
          </tr>
          <tr>
            <th scope=row><img src="img/document_logo/doc.svg"/></th>
            <td>Laporan Kinerja dan Keuangan ITB 2015 <br> <small>Direktorat Sistem dan Teknologi Informasi</small></td>
            <td><button class="btn btn-warning btn-sm">Detail</button>&nbsp;<button class="btn btn-info btn-sm">Unduh</button></td>
          </tr>
          <tr>
            <th scope=row><img src="img/document_logo/doc.svg"/></th>
            <td>Rencana Strategis ITB 2016-2020 <br> <small>Direktorat Sistem dan Teknologi Informasi</small></td>
            <td><button class="btn btn-warning btn-sm">Detail</button>&nbsp;<button class="btn btn-info btn-sm">Unduh</button></td>
          </tr>
          <tr>
            <th scope=row><img src="img/document_logo/doc.svg"/></th>
            <td>BAN PT No.328/SK/BAN-PT/Akred/S/V/2015 ttg Peringkat Akreditasi Prodi  <br> <small>Direktorat Sistem dan Teknologi Informasi</small></td></td>
            <td><button class="btn btn-warning btn-sm">Detail</button>&nbsp;<button class="btn btn-info btn-sm">Unduh</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection
