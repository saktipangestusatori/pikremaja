@extends('layouts.admin')

@section('title')
Konseling
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">pikremaja</a>
                        </li>
                        <!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Konseling</a>
                        </li>

                    </ol>
                </div>
                <h4 class="page-title">Balas Konseling</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('konseling.index') }}" class="btn btn-primary mb-3"><i
                            class="mdi mdi-backburger"></i>
                        Kembali
                    </a>
                    @if ($errors->any())
                    <div class="row my-3">
                        <div class="col-sm-12">
                            <div class="alert alert-danger dark" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('konseling.update',$item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3 row">
                            <label for="topik" class="col-sm-2 col-form-label">Topik</label>
                            <div class="col-sm-10">
                                <input type="text" name="topik" id="topik" class="form-control"
                                    placeholder="Masukan Topik" value="{{ $item->topik }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                            <div class="col-sm-10">
                                <textarea name="pesan" id="pesan" cols="30" rows="3" class="form-control ckeditor"
                                    required>{{ $item->pesan }}</textarea>
                            </div>
                        </div>



                        <div class="mb-3 row">
                            <div class="col-sm-2 col-form-label">
                                <button type="submit" class="btn btn-success"><i class="mdi mdi-database-plus"></i>
                                    Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!--end row-->


</div><!-- container -->

@endsection
@push('add-js')
<script src="{{ url('backend/ckeditor/ckeditor.js') }}"></script>
@endpush