@extends('main')

@section('container')
  <div class="row d-flex justify-content-center my-5 mx-4">
    <div class="mb-5">
      <h1>Data Pembelian Barang {{ $data['kode'] }}</h1>
    </div>

    <form method="POST" action={{ route('catalog.buy.post', ['id' => $data['id']]) }}>
      @csrf

      <div>
        <strong> Nama Barang: </strong> {{ $data['nama'] }}
      </div>

      <div>
        <strong> Harga Barang: </strong> {{ $data['harga'] }}
      </div>

      <div>
        <strong> Stok Tersedia: </strong> {{ $data['stok'] }}
      </div>
      
      <div class="d-flex flex-row mt-3">
        <strong> Jumlah: </strong>
        <div class="col-xs-2">
          <input type="number" name="jumlah" class="form-control form-control-sm mx-3" min="0" max={{ $data['stok'] }} placeholder="Jumlah"/>
        </div>
      </div>
        
      @if($errors->has('jumlah'))
        <div class="text-danger">
          {{ $errors->first('jumlah') }}
        </div>
      @endif

      <a href="{{ route('catalog.detail', ['id' => $data['id']]) }}" class="btn btn-danger mx-1 mt-4">Batal</a>
      <button class="btn btn-success mt-4" type="submit">Checkout</button>
    </form>
  </div>
@endsection
