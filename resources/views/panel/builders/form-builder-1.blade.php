@extends('panel.layouts.simple.master')
@section('title', 'Form Builder 1')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Form Builder 1</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Builders</li>
<li class="breadcrumb-item active">Form Builder 1</li>
@endsection

@section('content')
<div class="form-builder">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Drag & Drop components</h5>
            <span>Copy the html code from View HTML tab </span>
          </div>
          <div class="card-body">
            <div class="row clearfix form-builder">
              <div class="col-lg-12 col-xl-6">
                <div class="form-builder-header-1">
                  <ul class="nav nav-primary" id="formtabs"></ul>
                </div>
                <form class="form-horizontal theme-form" id="components">
                  <fieldset>
                    <div class="tab-content"></div>
                  </fieldset>
                </form>
              </div>
              <div class="col-lg-12 col-xl-6 lg-mt-col">
                <div class="form-builder-header-1">
                  <h6>Drag Elements Here</h6>
                </div>
                <div id="build">
                  <form class="form-horizontal drag-box" id="target"></form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/form-builder/form-builder-1/require.js')}}"></script>
<script src="{{asset('assets/js/form-builder/form-builder-1/main-built.js')}}"></script>
@endsection

