@extends('master')

@section('title')
    Dashboard
@endsection

@section('master.content')
    <section class="section">
        <div class="section-body">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header flex justify-content-between">
                    <h4>Tabel Biodata</h4>
                    <a href="/input-dashboard" class="btn btn-primary mt-3">Insert</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Hobi</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($biodata as $d)
                                <tr>
                                    <td scope="row">{{ $id++ }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->tanggal_lahir }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->hobi }}</td>
                                    <td>
                                        <a href="/ubah/{{ $d->id }}" class="btn btn-info btn-sm">Update</a>
                                        <a href="/delete/{{ $d->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ini?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
