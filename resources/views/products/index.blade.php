@extends('layouts.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Product</h1>
    {{-- <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary mb-3">← Kembali ke Dashboard</a> --}}

    <div class="card">
        <div class="card-header">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Tambah data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Foto</th>
                        <th width="280px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->jenis }}</td>
                        <td>{{ $k->harga_jual }}</td>
                        <td>{{ $k->harga_beli }}</td>
                        <td>
                            @empty($k->foto)
                                <img src="{{ url('image/nophoto.jpg') }}" alt="nophoto" style="max-width: 100px;">
                            @else
                                <img src="{{ url('image/' . $k->foto) }}" alt="foto" style="max-width: 100px;">
                            @endempty
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-secondary">Show</a>
                            <a href="{{ route('products.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Tombol Modal Hapus -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
                            <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Hapus Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data <strong>{{ $k->nama }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection
