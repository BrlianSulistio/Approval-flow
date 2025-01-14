@extends('lucid')

@push('css')
<link href="{{ URL::asset('assets/vendor/jquery-datatable/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/vendor/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
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
                    <li class="p-1 text-primary">Home</li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="container ">
            <h1 class="font-weight-bold text-dark">Halo!👋🏻</h1>
            <div class="row clearfix">
                <div class="card ">
                    <div class="body table-responsive p-0 py-2">
                        <div class="d-flex justify-content-between align-items-center  mx-0">
                            <div class="p-2">
                                <h6>Data Transaksi anda</h6>
                            </div>
                            <div class="">
                                <button class="btn btn-primary m-2 float-right " id="TambahData"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        @csrf
                        <table class="table p-0 table-hover js-basic-example dataTable table-custom display responsive" style="width: 100%;" id="table-transaksi">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%">No</th>
                                    <th class="text-center" style="width: 15%">Modul</th>
                                    <th class="text-center" style="width: 20%">Type</th>
                                    <th class="text-center" style="width: 15%">Value</th>
                                    <th class="text-center" style="width: 15%">Amount</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            @if (auth()->user()->role == 'admin')



            @else

            @endif
        </div>

    </div>
</div>



<div class="modal fade" id="modalInputTransaksi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="title" style="margin-bottom: -5px;">Input Transaksi</h4>
            </div>
            <div class="modal-body">
                <div style="background-color: #F6FCFE;border-radius:10px" class="row-lg-12 p-2 mb-3">
                    <p class="p-0 m-0" style="color:#0459A7;"> <i style="color: #757575;" class="fa fa-info-circle "></i> Lengkapi Data Transaksi dengan Benar </p>
                </div>
                <form id="formTransaksi" autocomplete="off">
                    @csrf
                    <div class="row p-0 form text-dark  " id="container">
                        <div class="col-12 col-md-12 form-group m-0 py-0">
                            <label for="jenis_jangka_waktu_perlaksaan" class="form-label ">Data Transaksi</label>
                            <div class="row p-0 form  ">
                                <div class="col-lg-6 form-group">
                                    <label for="modul" class="form-label">Pilih Modul<span class="text-danger">*</span></label>
                                    <select class="form-control" name="modul" id="getmodul" style="width:100%">
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group ">
                                    <label for="amount" class="form-label">Amount<span class="text-danger">*</span></label>
                                    <input type="number" pattern="\d*" inputmode="numeric" class="form-control form-control-sm" value="" id="amount" name="amount">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="simpanTermin" class="btn btn-primary">Simpan</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>




@endsection

@push('scripts')
<script src="{{ URL::asset('assets/vendor/jquery-datatable/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/vendor/jquery-datatable/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/vendor/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/subjs/home.js') }}" type="text/javascript"></script>
@endpush