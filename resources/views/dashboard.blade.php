@extends('layouts.app')

@push('styles')
    <style>
          .jumbotron {
            background-image: url("{{ asset('img/bg-kopi.jpg') }}");
            background-size: cover;
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="text-light">Setiap biji kopi menyimpan cerita. <br> Nikmati kisahnya dalam <br> setiap tegukan.</h1>
        <p class="text-light">Baik kamu yang baru mulai mencicipi, maupun yang <br> sudah berpengalaman, kini kamu bisa mengenal <br> berbagai jenis kopi dengan mudah melalui website ini.</p>
    </div>
</div>
<div class="container-kopi">
    <div class="jenis-kopi">
        <h1 class="fw-bolder">ARABICA</h1>
    </div>
        <div class="kopi-content">
            <img src="{{ asset('img/arabica.jpeg') }}" class="arabica" alt="">
        <div class="text-arabica">
            <p>Kopi Arabika (Coffea arabica) adalah jenis kopi yang paling populer dan banyak dikonsumsi di dunia, dikenal dengan cita rasanya yang halus, kompleks, dan aromanya yang wangi. Tanaman kopi ini tumbuh optimal di dataran tinggi dengan suhu sejuk, seperti di wilayah pegunungan Indonesia, Amerika Latin, dan Afrika Timur. Dibandingkan dengan jenis Robusta, kopi Arabika memiliki kadar kafein yang lebih rendah, namun menawarkan karakter rasa yang lebih kaya—mulai dari manis, asam buah-buahan, hingga floral, tergantung dari tempat tumbuhnya. Kopi ini umumnya lebih mahal karena proses penanaman dan perawatannya yang lebih rumit, serta lebih rentan terhadap hama. Namun, kualitas rasa yang dihasilkan membuat Arabika sangat disukai, terutama oleh para penikmat kopi spesialti.
            </p>
        </div>
    </div>
</div>
<div class="container-kopi2">
    <div class="jenis-kopi">
        <h1 class="fw-bolder">ROBUSTA</h1>
    </div>
    <div class="kopi-content">
        <div class="text-robusta">
            <p>Kopi Robusta (Coffea canephora) adalah jenis kopi yang dikenal dengan rasa yang kuat, pahit, dan memiliki kadar kafein yang lebih tinggi dibandingkan Arabika. Kopi ini tumbuh baik di dataran rendah dan lebih tahan terhadap hama serta perubahan iklim, sehingga lebih mudah dibudidayakan dan memiliki hasil panen yang lebih tinggi. Ciri khas Robusta terletak pada body-nya yang tebal, aroma earthy atau nutty, serta aftertaste yang cenderung lebih keras. Karena karakteristik tersebut, Robusta sering digunakan dalam campuran kopi instan atau espresso untuk menambah kekuatan dan crema. Meskipun harganya cenderung lebih terjangkau, kopi Robusta tetap memiliki tempat tersendiri di kalangan penikmat kopi yang menyukai rasa yang bold dan energik.</p>
        </div>
        <div class="image-wrapper">
            <img src="{{ asset('img/robusta.jpg') }}" alt="Biji Kopi Robusta" class="robusta">
        </div>
    </div>
</div>
<div class="container-kopi">
    <div class="jenis-kopi">
        <h1 class="fw-bolder">LIBERIKA</h1>
    </div>
        <div class="kopi-content">
            <img src="{{ asset('img/liberika.jpg') }}" class="arabica" alt="">
        <div class="text-arabica">
            <p>Kopi Liberika (Coffea liberica) adalah jenis kopi yang unik dan langka, dengan cita rasa yang berbeda dari Arabika maupun Robusta. Biji kopi Liberika berukuran lebih besar dan bentuknya cenderung tidak simetris. Rasa kopi ini khas, dengan aroma yang kuat dan kompleks, seringkali digambarkan memiliki nuansa kayu, rempah, dan sedikit fruity atau floral. Liberika tumbuh baik di daerah dataran rendah dan lembap, serta lebih tahan terhadap hama dan penyakit tanaman. Di Indonesia, kopi Liberika banyak dibudidayakan di wilayah Jambi, Kalimantan, dan Riau. Meskipun tidak sepopuler Arabika atau Robusta, kopi ini memiliki daya tarik tersendiri di kalangan pecinta kopi yang mencari pengalaman rasa yang lebih eksotis dan berbeda.
            </p>
        </div>
    </div>
</div>
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {

    function checkScroll() {
        const elements = document.querySelectorAll('.container-kopi, .container-kopi2, .kopi-content, .text-arabica, .text-robusta, .image-wrapper');
        const windowHeight = window.innerHeight;
        const triggerPoint = windowHeight * 0.8;

        elements.forEach((element, index) => {
            const elementTop = element.getBoundingClientRect().top;

            if (elementTop < triggerPoint) {
                setTimeout(() => {
                    element.classList.add('animate-up');
                }, 150 * index);
            }
        });
    }

    window.addEventListener('load', checkScroll);
    window.addEventListener('scroll', checkScroll);

    checkScroll();
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    const revealSections = () => {
        const sections = document.querySelectorAll('.container-kopi, .container-kopi2');

        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (sectionTop < windowHeight - 100) {
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }
        });
    };

    document.querySelectorAll('.container-kopi, .container-kopi2').forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(50px)';
        section.style.transition = 'all 0.6s ease-out';
    });

    window.addEventListener('scroll', revealSections);
    revealSections();

    const coffeeImages = document.querySelectorAll('.arabica, .robusta');
    coffeeImages.forEach(img => {
        img.addEventListener('mouseenter', () => {
            img.style.transform = 'scale(1.03)';
            img.style.boxShadow = '0 10px 25px rgba(0,0,0,0.2)';
        });

        img.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
            img.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
        });
    });
});
</script>
@endpush
@endsection
