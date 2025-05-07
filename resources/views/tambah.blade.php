@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Data Kopi Baru</h4>
                        <a href="{{ route('pengelolaan') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="jenis_kopi" class="form-label">Jenis Kopi</label>
                            <input type="text" class="form-control @error('jenis_kopi') is-invalid @enderror"
                                   id="jenis_kopi" name="jenis_kopi" value="{{ old('jenis_kopi') }}" required>
                            @error('jenis_kopi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kualitas" class="form-label">Kualitas</label>
                            <select class="form-select @error('kualitas') is-invalid @enderror" id="kualitas" name="kualitas" required>
                                <option value="">Pilih Kualitas</option>
                                <option value="Premium" {{ old('kualitas') == 'Premium' ? 'selected' : '' }}>Premium</option>
                                <option value="Standar" {{ old('kualitas') == 'Standar' ? 'selected' : '' }}>Standar</option>
                                <option value="Ekonomi" {{ old('kualitas') == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                            </select>
                            @error('kualitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                   id="stok" name="stok" min="0" value="{{ old('stok') }}" required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                       id="harga" name="harga" value="{{ old('harga') }}" required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="form-label">Gambar Kopi</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                   id="gambar" name="gambar" accept="image/*" required>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format: JPEG, PNG, JPG, GIF (Maksimal 2MB)</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-undo"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
