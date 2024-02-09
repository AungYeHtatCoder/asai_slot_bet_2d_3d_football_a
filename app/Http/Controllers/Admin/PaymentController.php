<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentList;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = PaymentList::all();
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'phone' => "required",
            "receiver_name" => 'required'
        ]);
        PaymentList::create($request->all());
        return redirect()->route('admin.payments.index')->with('success', 'Payment method created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentList $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentList $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentList $payment)
    {
        $request->validate([
            'payment_method' => 'required',
            'phone' => "required",
            "receiver_name" => 'required'
        ]);
        $payment->update($request->all());
        return redirect()->route('admin.payments.index')->with('success', 'Payment method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentList $payment)
    {
        $payment->delete();
        return redirect()->back()->with('success', 'Payment method deleted successfully.');
    }
}
