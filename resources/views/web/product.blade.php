<x-layout>
    <h1>{{ $product['name'] }}</h1>
    <hr>

    {{-- Tampilkan gambar --}}
    <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" width="300">

    <p>{{ $product['description'] }}</p>
</x-layout>
