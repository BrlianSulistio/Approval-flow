@extends('lucid')

@push('css')
<link href="{{ URL::asset('assets/vendor/jquery-datatable/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="block-header">
  <div class="row">
    <div class="col-lg-5 col-md-8 col-sm-12">
      <div class="d-flex flex-row mb-3">
        <a href="javascript:void(0);" style="z-index: 10;" class="btn btn-xs text-primary pt-2 btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>

        <ul class="breadcrumb">
          <li class="p-1"><a :href="web_url"><i class="icon-home"></i></a></li>
          <li class="p-1"><i class="fa fa-angle-right"></i></li>
          <li class="p-1 text-primary">Settings Page</li>
        </ul>
      </div>

    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row clearfix">
    <div class="card ">
      <div class="body table-responsive p-0 py-2">
        <div class="d-flex justify-content-between align-items-center  mx-0">
          <div class="p-2">
            <h6>Daftar Permohonan</h6>
          </div>
          <div class="">
            <button class="btn btn-primary m-2 float-right " id="TambahData"><i class="fa fa-plus"></i> Tambah</button>
          </div>
        </div>
        @csrf
        <table class="table p-0 table-hover js-basic-example dataTable table-custom display responsive" style="width: 100%;" id="table-workflow">
          <thead>
            <tr>
              <th class="text-center" style="width: 5%">No</th>
              <th class="text-center" style="width: 15%">Modul</th>
              <th class="text-center" style="width: 20%">Type</th>
              <th class="text-center" style="width: 15%">Value</th>
              <th class="text-center" style="width: 15%">aksi</th>
            </tr>

          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ URL::asset('assets/vendor/jquery-datatable/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/vendor/jquery-datatable/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/subjs/settings-page.js') }}" type="text/javascript"></script>
@endpush