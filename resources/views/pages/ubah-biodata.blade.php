@extends('master')

@section('title')
    Edit Biodata
@endsection

@section('master.content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card-body">
                        @foreach ($biodata as $d)
                            <form action="{{ route('updateBiodata') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$d->id}}">
                                <div class="form-group">
                                    <label for="exampleInputNama">Nama</label>
                                    <input type="text" id="exampleInputNama" name="nama" value="{{$d->nama}}" class="form-control form-control-sm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTanggal">Tanggal lahir</label>
                                    <input type="date" id="exampleInputTanggal" name="tanggal" value="{{$d->tanggal_lahir}}"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAlamat">Alamat</label>
                                    <input type="text" id="exampleInputAlamat" name="alamat" value="{{$d->alamat}}"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputHobi">Hobi</label>
                                    <input type="text" id="exampleInputHobi" name="hobi" value="{{$d->hobi}}" class="form-control form-control-sm">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
