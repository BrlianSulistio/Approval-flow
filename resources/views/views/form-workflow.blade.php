@extends('lucid')

@push('css')
<link href="{{ URL::asset('assets/vendor/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />

<style>
  .section-divider {
    border-top: 1px solid #EBEBEB;
    margin-top: 20px;
    padding-top: 10px;
  }

  .form {
    border: 1px solid #EBEBEB;
    padding: 15px;
    border-radius: 10px;
    color: #424242;
  }
</style>
@endpush

@section('content')
<div class="block-header">
  <div class="row">
    <div class="col-lg-5 col-md-8 col-sm-12">
      <div class="d-flex flex-row ">
        <a href="javascript:void(0);" style="z-index: 10;" class="btn btn-xs text-primary pt-2 btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
        <ul class="breadcrumb">
          <li class="p-1"><a :href="web_url"><i class="icon-home"></i></a></li>
          <li class="p-1"><i class="fa fa-angle-right"></i></li>
          <li class="p-1 text-primary">Tambah WorkFlow</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">

  <div class="d-flex justify-content-between align-items-center my-2 mx-0">
    <div class="">
      <h6 class="text-dark p-0 ">Form WorkFlow</h6>
      <p class="text-muted p-0">Lengkapi data-data di bawah ini</p>
    </div>
    <form id="formWorkFlow" autocomplete="off">
      @csrf
      <div class=" ">
        <button class="btn btn-primary me-auto mx-1" id="btnSimpan" type="submit">Simpan</button>
        <a href="{{ route('settings') }}" class="btn btn-light mx-1 me-auto">Kembali</a>

      </div>
  </div>

  <div class="row clearfix section-divider">
    <div class="col-lg-4">
      <h6 class="text-dark ">Input Form WorkFlow</h6>
    </div>
    <div class="col-lg-8 form">
      <div class="row p-1 ">
        <div class="col form-group">
          <label for="modul" class="form-label">Nama Modul</label>
          <input type="text" class="form-control" name="modul" value="" id="modul">

        </div>

      </div>
      <div class="row">
        <div class="col form-group">
          <label for="type" class="form-label">Type Modul<span class="text-danger">*</span></label>
          <select class="form-control" name="type" id="type" style="width:100%">
            <option selected value="">
              Pilih Type Modul</option>
            <option value="Custom">
              Custom</option>
            <option value="HRIS">
              HRIS</option>
            <option value="Total Amount >=">
              Total Amount >=</option>
            <option value="Total Amount >">
              Total Amount ></option>
            <option value="Total Amount <=">
              Total Amount <=</option> <option value="Total Amount <">
                Total Amount < </option> </select> </div> <div class="col form-group">
                  <label for="value" class="form-label">Value/Level</label>
                  <input type="text" class="form-control" disabled id="value" value="" name="value">
        </div>
      </div>

    </div>
  </div>

  <div class="row clearfix section-divider d-none" id="data-approval">
    <div class="col-lg-4">
      <h6 class="text-dark ">Data Approval</h6>
    </div>
    <div class="col-lg-8 form">
      <div class="row p-0">
        <div class="col-lg-12 form-group mb-0">
          <label for="approval" class="form-label">Nik Approval<span class="text-danger">*</span></label>
          <select class="form-control pilih-approval" name="approval[]" id="approval" style="width:100%" multiple>
          </select>
        </div>
      </div>

    </div>
  </div>
  <div class="row-lg-12 d-flex flex-row-reverse mb-5 my-4 ">
    <a href="{{ route('settings') }}" class="btn btn-light mx-1 me-auto">Kembali</a>
    <button class="btn btn-primary me-auto mx-1" id="btnSimpan" type="submit">Simpan</button>
  </div>
  </form>





</div>
























@endsection

@push('scripts')

<script src="{{ URL::asset('assets/vendor/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/subjs/form-work-flow.js') }}" type="text/javascript"></script>
@endpush