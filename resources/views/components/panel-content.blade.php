    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="container">
            <div class="visi-misi-wrapper">

                <!-- Kiri: Kartu Visi & Misi -->
                <div class="visi-misi-cards" style="{{ $cardStyle ?? '' }}">

                    <!-- Card Visi -->
                    <div class="card-visimisi ">
                        <div class="card-header">{{ $title }}</div>
                        <div class="card-body">
                            {!! $slot !!}
                        </div>
                    </div>
                </div>
    </section>
