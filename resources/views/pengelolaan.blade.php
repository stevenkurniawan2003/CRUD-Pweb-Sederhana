{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Kopi</h1>
        <a href="{{ route('tambah') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="row justify-content-center">
        @foreach($katalog as $post)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card coffee-card border-0 shadow-sm">
                <img src="{{ asset('storage/kopi/' . $post->gambar) }}"
                class="card-img-top img-fluid"
                alt="{{ $post->jenis_kopi }}"
                style="height: 200px; object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $post->jenis_kopi }}</h5>
                    <p class="card-text text-muted">{{ $post->kualitas }}</p>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-{{ $post->stok > 5 ? 'success' : 'warning' }}">
                            Stok: {{ $post->stok }}
                        </span>
                        <span class="fw-bold text-coffee">Rp.{{ $post->harga }}</span>
                    </div>
                </div>

                <div class="card-footer bg-white">
                    <a href="{{ route('edit', $post->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit">Edit</i></a>

                    <form action="{{ route('delete', $post->id) }}" method="post">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger float-end">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Kopi</h1>
        <a href="{{ route('tambah') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="row justify-content-center">
        @foreach($katalog as $post)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card coffee-card border-0 shadow-sm">
                <img src="{{ asset('storage/kopi/' . $post->gambar) }}"
                     class="card-img-top img-fluid"
                     alt="{{ $post->jenis_kopi }}"
                     style="height: 200px; object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $post->jenis_kopi }}</h5>
                    <p class="card-text text-muted">{{ $post->kualitas }}</p>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-{{ $post->stok > 5 ? 'success' : 'warning' }}">
                            Stok: {{ $post->stok }}
                        </span>
                        <span class="fw-bold text-coffee">Rp.{{ number_format($post->harga, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <a href="{{ route('edit', $post->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>

                    <form action="{{ route('delete', $post->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    });
</script>

<style>
    .coffee-card {
        transition: transform 0.3s ease;
    }
    .coffee-card:hover {
        transform: translateY(-5px);
    }
    .card-footer {
        padding: 0.75rem 1.25rem;
    }
</style>
@endsection
