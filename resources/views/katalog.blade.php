@extends('main')

@section('container')
  <div id="data-container">
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
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    function updateData() {
      $.ajax({
        type: 'GET',
        url: "{{ route('catalog.short-poll') }}",
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            if (Array.isArray(response.data.data)) {
              var tableContent = '';
              response.data.data.forEach(function(item) {
                tableContent += '<tr>' +
                  '<td><a href="' + item.detail_url + '" class="fw-bold">' + item.kode + '</a></td>' +
                  '<td><a href="' + item.detail_url + '" class="fw-bold">' + item.nama + '</a></td>' +
                  '<td>' + item.harga + '</td>' +
                  '</tr>';
              });
              $('#data-container tbody').html(tableContent);
            } else {
              console.error('Data is not in the expected format:', response.data);
            }
          } else {
            console.error('Data update failed:', response.message);
          }
        },
        error: function(error) {
          console.error('Error during data update:', error);
        }
      });
    }

    updateData();

    setInterval(updateData, 10000);
  </script>
@endsection
