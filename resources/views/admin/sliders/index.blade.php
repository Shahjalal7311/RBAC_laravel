@extends('admin.layouts.master')

@section('custom-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="card-title">{{ $title }}</h4></div>
                <div class="col-md-6">
                    <span class="shortlink">
                        <a style="margin-right: 0px; font-size: 16px;" class="btn btn-outline-info btn-lg" href="{{ route('useradd.page') }}">
                            <i class="fa fa-plus-circle"></i> Add New
                        </a>                            
                    </span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection  