@extends('layouts.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
 
            <div class="card-header">
                {{-- <i class=""></i> --}}
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Foto</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ( $products as $k )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->jenis }}</td>
                            <td>{{ $k->harga_jual }}</td>
                            <td>{{ $k->harga_beli }}</td>
                            <td>
                                @empty($k->foto)
                                <img src="{{url('image/nophoto.jpg')}}"
                                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @else
                                <img src="{{url('image')}}/{{$k->foto}}"
                                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @endempty
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-secondary">show</a>
                                <a href="{{ route('products.edit', $k->id) }}" class="btn btn-sm btn-warning">edit</a>
                                <!-- Tombol Modal Hapus -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $k->id }}">
    hapus
</button>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="modalHapus{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $k->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('index.destroy', $k->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel{{ $k->id }}">Konfirmasi Hapus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Yakin ingin menghapus produk <strong>{{ $k->nama }}</strong>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </div>
    </form>
  </div>
</div>
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
