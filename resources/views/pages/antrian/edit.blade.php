@extends('layout.app')

@section('title', 'Kirim Pasien ke Kamar Inap')

@push('addon-style')
<!-- Include Choices CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
<style>
    select[readonly] {
        background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
        pointer-events: none;
        touch-action: none;
    }
</style>
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kirim Pasien ke Kamar Inap</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/pasien">Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kirim Pasien ke Kamar Inap</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kirim Pasien ke Kamar Inap</h4>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('antrian.update', $antrian->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nomor Pasien</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nomor_pasien" class="form-control" name="nomor_pasien" value="{{ $nomor_pasien }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama Pasien</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" value="{{ $antrian->nama_pasien }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Umur</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="umur" class="form-control" name="umur" value="{{ $antrian->umur }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">TTL</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="ttl" class="form-control" name="ttl" value="{{ $antrian->ttl }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" readonly>{{ $antrian->nama_pasien }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nomor yang bisa dihubungi</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="no_hp" class="form-control" name="no_hp" value="{{ $antrian->no_hp }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <fieldset class="form-group">
                                        <select class="form-select" readonly="readonly" tabindex="-1" aria-disabled="true" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="L" {{ $antrian->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ $antrian->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama Kepala Keluarga</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nama_kepala_keluarga" class="form-control" name="nama_kepala_keluarga" value="{{ $antrian->nama_kepala_keluarga }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Diagnosa Masuk</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="diagnosa_masuk" class="form-control" name="diagnosa_masuk" value="{{ $antrian->diagnosa_masuk }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Jenis Pasien</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="jenis_pasien" class="form-control" name="jenis_pasien" value="{{ $antrian->jenis_pasien }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Kamar</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    @if ($kamarTersedia < 1)
                                    <h5 class="text-danger">Seluruh kamar rawat inap telah penuh. Tidak bisa memasukkan pasien!</a></h5>
                                    @else
                                    <fieldset class="form-group">
                                        <select class="form-select" id="id_kamar" name="id_kamar">
                                            <option value="" selected hidden>Pilih Kamar</option>
                                            @forelse ($kamar as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_kamar }} - Kelas {{ $data->kelas }} - Gedung {{ $data->gedung }}</option>
                                            @empty
                                            <option value="" selected hidden>Kamar Kosong</option>
                                            @endforelse
                                        </select>
                                    </fieldset>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Dokter yang menangani</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="id_dokter" name="id_dokter">
                                            <option value="" selected hidden>Pilih Dokter</option>
                                            @foreach ($dokter as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_dokter }} - Spesialis {{ $data->spesialis }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/antrian" class="btn btn-warning d-inline">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<!-- Include Choices JavaScript -->
<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endpush