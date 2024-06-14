@extends('layout.adm-main1')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangmasuk.update', $barangMasuk->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" name="tgl_masuk" value="{{ old('tgl_masuk', $barangMasuk->tgl_masuk) }}" placeholder="Masukkan Tanggal Masuk">

                                @error('tgl_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Qty Masuk</label>
                                <input type="number" class="form-control @error('qty_masuk') is-invalid @enderror" name="qty_masuk" value="{{ old('qty_masuk', $barangMasuk->qty_masuk) }}" placeholder="Masukkan Jumlah Barang Masuk">

                                @error('qty_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Barang</label>
                                <select class="form-control @error('barang_id') is-invalid @enderror" name="barang_id">
                                    <option value="">Pilih Barang</option>
                                    @foreach($rsetBarang as $barang)
                                        <option value="{{ $barang->id }}" {{ old('barang_id', $barangMasuk->barang_id) == $barang->id ? 'selected' : '' }}>{{ $barang->merk . ' ' . $barang->seri }}</option>
                                    @endforeach
                                </select>

                                @error('barang_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
