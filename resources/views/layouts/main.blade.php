@extends('layouts.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Produk</h1>

    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">+ Tambah Produk</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->jenis }}</td>
                        <td>{{ number_format($k->harga, 0, ',', '.') }}</td>
                        <td>
                            <img src="{{ url('image/' . ($k->foto ?? 'nophoto.jpg')) }}" alt="foto" style="max-width: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Tombol Modal Hapus -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $k->id }}">
                                Hapus
                            </button>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapus{{ $k->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $k->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $k->id }}">Hapus Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus produk <strong>{{ $k->nama }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('products.destroy', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
