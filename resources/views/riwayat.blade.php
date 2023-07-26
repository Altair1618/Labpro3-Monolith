@extends('main')

@section('container')
  @if ($data)
    <div class="my-4 mx-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Waktu Pembelian</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
              <td>
                {{ $item['kode'] }}
              </td>
              <td>
                {{ $item['nama'] }}
              </td>
              <td>
                {{ $item['harga'] * $item['jumlah'] }}
              </td>
              <td>
                {{ $item['created_at'] }}
              </td>
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
    <p>Tidak ada riwayat pembelanjaan</p>
  </div>
  @endif
@endsection
