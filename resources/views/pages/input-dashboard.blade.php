@extends('master')

@section('title')
    Input Dashboard
@endsection

@section('master.content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Masukkan Data</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card-body">
                        <form action="/simpanBiodata" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputNama">Nama</label>
                                <input type="text" id="exampleInputNama" name="nama" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTanggal">Tanggal lahir</label>
                                <input type="date" id="exampleInputTanggal" name="tanggal"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAlamat">Alamat</label>
                                <input type="text" id="exampleInputAlamat" name="alamat"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputHobi">Hobi</label>
                                <input type="text" id="exampleInputHobi" name="hobi" class="form-control form-control-sm">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
