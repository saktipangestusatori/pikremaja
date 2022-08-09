@extends('layouts.admin')

@section('title')
Data Remaja
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
                        <li class="breadcrumb-item"><a href="#">Data Remaja</a>
                        </li>

                    </ol>
                </div>
                <h4 class="page-title">Data Remaja PIK Remaja</h4>
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
                    <a href="{{ route('management-users.create') }}" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i>
                        Tambah User
                    </a>

                    @if (Session::get('status'))
                    <div class="my-3 alert alert-primary alert-dismissible fade show border-0 b-round" role="alert">
                        <strong>{{ Session::get('status') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table" id="table-datatables">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Usia</th>
                                    <th>Username</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nik }}</td>
                                    <td>{{ $user->tanggallahir }}</td>
                                    <td>{{ $user->usia }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td> <img src="{{ asset('backend/images/users/'.$user->foto) }}" alt="" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ route('management-users.edit', $user->id) }}" title="Edit"
                                            class="btn btn-warning btn-sm mb-1"><i
                                                class="mdi mdi-square-edit-outline"></i>
                                        </a>
                                        <a href="{{ route('management-users.show', $user->id) }}" title="Ganti Password"
                                            class="btn btn-info btn-sm"><i class="mdi mdi-shield-key"></i>
                                        </a>

                                        <form class="d-inline"
                                            action="{{ route('management-users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda Yakin?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" title="Hapus" class="btn btn-danger btn-sm"><i
                                                    class="mdi mdi-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!--end row-->


</div><!-- container -->
@endsection

@push('add-plugins-css')
<link href="{{ asset('backend/plugins/datatables/datatable.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('add-plugins-js')
<script src="{{ asset('backend/plugins/datatables/simple-datatables.js') }}"></script>
@endpush

@push('add-js')
<script>
    const dataTable = new simpleDatatables.DataTable("#table-datatables", {
        searchable: true,
        fixedHeight: false,
    })
</script>
@endpush