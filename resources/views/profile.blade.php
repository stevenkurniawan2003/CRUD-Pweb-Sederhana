@extends('layouts.app')

@section('content')
<div class="kontainer-profil">
    <div class="profile-atas text-center">
        <h1 class="judul-profil">Tentang Saya, {{ session('user_name') }}</h1>
        <p class="penjelasan">Fasilkom Informatika Angkatan 23, Yang Gagah Dan Berani</p>
    </div>

    <div class="konten-profil">
        <div class="profile-section">
            <h2 class="judul-section">Profile</h2>
            <p class="deskripsi-profile">
                Saya adalah saya yang dimana tidak ada orang lain yang bisa seperti saya.
            </p>
        </div>

        <div class="detail-profil">
            <div class="kolom-details">
                <div class="item-details">
                    <span class="detail-label">Ultah</span>
                    <span class="detail-value">02 Juni 2003</span>
                </div>
                <div class="item-details">
                    <span class="detail-label">Umur</span>
                    <span class="detail-value">Panjang</span>
                </div>
            </div>

            <div class="kolom-details">
                <div class="item-details">
                    <span class="detail-label">Negara</span>
                    <span class="detail-value">Indonesia</span>
                </div>
                <div class="item-details">
                    <span class="detail-label">Alamat</span>
                    <span class="detail-value">Kalo di jember, di perumahan mastrip blok v-15</span>
                </div>
            </div>

            <div class="kolom-details">
                <div class="item-details">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ session('user_email') }}</span>
                </div>
                <div class="item-details">
                    <span class="detail-label">No</span>
                    <span class="detail-value">+62895-0790-8957</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
