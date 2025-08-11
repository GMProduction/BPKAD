<!-- resources/views/components/page-header.blade.php -->
<div class="page-content">
    <div class="background-overlay">
        <div class="overlay-text">
            {!! $slot !!}
        </div>
    </div>
    <img class="background-image" src="{{ asset('assets/local/produkhukum.png') }}" alt="Background" />
</div>
