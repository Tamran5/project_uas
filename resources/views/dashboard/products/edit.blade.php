<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Update Product</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="post">
        @method('patch')
        @csrf
        
        <flux:input label="Name" name="name" value="{{ $product->name }}" class="mb-3" />

        <flux:select label="Category" name="category" class="mb-3">
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
            {{ $product->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
            </option>
            @endforeach
        </flux:select>


        <flux:input type="number" label="Price (Rp)" name="price" value="{{ $product->price }}" class="mb-3" />

        <flux:input type="number" label="Stock" name="stock" value="{{ $product->stock }}" class="mb-3" />

        <flux:textarea label="Description" name="description" class="mb-3">{{ $product->description }}</flux:textarea>

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>
