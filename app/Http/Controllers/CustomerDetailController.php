<?php
namespace App\Http\Controllers;

use App\Models\CustomerDetail;
use Illuminate\Http\Request;

class CustomerDetailController extends Controller
{
    public function index()
    {
        $customers = CustomerDetail::all();
        return view('customer.index', compact('customers'));
    }

    public function create() 
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:15',
            'amount' => 'nullable|numeric',
        ]);

        CustomerDetail::create($request->all());
        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    public function show($id)
    {
        $customer = CustomerDetail::find($id);
        return view('customer.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = CustomerDetail::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:15',
            'amount' => 'nullable|numeric',
            // Add other validations as needed
        ]);

        $customer = CustomerDetail::find($id);
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        $customer = CustomerDetail::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
}
