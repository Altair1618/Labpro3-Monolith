@extends('main')

@section('container')
  <div class="my-5 mx-4">
    <div class="mb-5">
      <h1>Data Barang {{ $data['kode'] }}</h1>
    </div>
    
    @if ($data)
      <ul class="list-group">
        <li class="list-group-item">
          <strong>Nama:</strong> {{ $data['nama'] }}
        </li>
        <li class="list-group-item">
          <strong>Harga:</strong> {{ $data['harga'] }}
        </li>
        <li class="list-group-item">
          <strong>Stok:</strong> {{ $data['stok'] }}
        </li>
      </ul>

      <div class="mt-4">
        <a href="{{ route('catalog') }}" class="btn btn-primary">Kembali</a>
        <a href="{{ route('catalog.buy', ['id' => $data['id']]) }}" class="btn btn-success">Beli</a>
      </div>
    @else
      <p>No data available</p>
    @endif
  </div>
@endsection
