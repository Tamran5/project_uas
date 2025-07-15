<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer')->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        $order->load('details.product', 'customer');
        return view('dashboard.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
            'tracking_number' => 'nullable|string|max:255',
        ]);

        if ($validated['status'] === 'completed' && !$validated['tracking_number']) {
            return back()->with('errorMessage', 'Nomor resi wajib diisi jika status dikirim.');
        }

        $order->update($validated);

        // Optional: kirim ke HUB
        // $this->syncToHub($order);

        return redirect()->route('dashboard.orders.index')->with('successMessage', 'Pesanan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
