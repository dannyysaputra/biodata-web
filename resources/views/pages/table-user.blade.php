@extends('master')

@section('title')
    Tabel User
@endsection

@section('master.content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header flex justify-content-between">
                    <h4>Tabel User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($data as $d)
                                <tr>
                                    <td scope="row">{{ $id++ }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->email }}</td>
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
