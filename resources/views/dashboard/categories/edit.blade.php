<x-layouts.app :title="__('Categories')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Category</flux:heading>
        <flux:subheading size="lg" class="mb-6">Update Product Category</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @method('patch')
        @csrf
        
        <flux:input label="Name" name="name" value="{{ $category->name }}" class="mb-3" />

        <flux:textarea label="Description" name="description" class="mb-3">{{ $category->description }}</flux:textarea>

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('categories.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>
