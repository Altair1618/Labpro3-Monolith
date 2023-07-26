@extends('main')

@section('container')
  @if ($data)
    <div class="my-4 mx-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga Barang</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
              <td>
                <a href="{{ route('catalog.detail', ['id' => $item['id']]) }}" class="fw-bold">
                  {{ $item['kode'] }}
                </a>
              </td>
              <td>
                <a href="{{ route('catalog.detail', ['id' => $item['id']]) }}" class="fw-bold">
                  {{ $item['nama'] }}
                </a>
              </td>
              <td>{{ $item['harga'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    <div class="d-flex justify-content-center">
      {{ $data->links() }}
    </div>
  @else
  <div class="my-4 mx-4">
    <p>Tidak ada data barang yang tersedia saat ini.</p>
  </div>
  @endif
@endsection
