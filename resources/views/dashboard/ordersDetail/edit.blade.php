<x-layouts.app :title="'Update Pesanan #' . $order->id">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Status Pesanan</flux:heading>
        <flux:subheading size="lg" class="mb-6">Ubah status dan masukkan nomor resi</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <div class="mb-3 w-full rounded bg-lime-100 border border-lime-400 text-lime-800 px-4 py-3">
            {{ session()->get('successMessage') }}
        </div>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 wf-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <flux:select label="Status Pesanan" name="status" onchange="toggleResi(this)">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pesanan Diterima</option>
            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Sedang Diproses</option>
            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Sedang Dikirim</option>
        </flux:select>

        <div id="resiField" class="{{ $order->status != 'completed' ? 'hidden' : '' }} mt-3">
            <flux:input name="tracking_number" label="Nomor Resi Pengiriman" value="{{ $order->tracking_number }}" />
        </div>

        <div class="mt-4">
            <flux:button type="submit">Simpan Perubahan</flux:button>
            <flux:link href="{{ route('orders.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>

    <script>
        function toggleResi(select) {
            const resiField = document.getElementById('resiField');
            resiField.classList.toggle('hidden', select.value !== 'completed');
        }
    </script>
</x-layouts.app>