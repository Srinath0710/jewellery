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
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_number' => 'required|numeric',
            'amount' => 'nullable|numeric',
            'date_of_purchase' => 'required|date',
            'renewal_date' => 'nullable|date',
            'loan_number' => 'nullable|string|max:255',
            'interest_percentage' => 'nullable|numeric',
            'gold_weight' => 'nullable|numeric',
            'silver_weight' => 'nullable|numeric',
            'number_of_gold' => 'nullable|numeric',
            'number_of_silver' => 'nullable|numeric',
            'gold' => 'nullable|string|max:255',
        ]);
    
        // Create and save a new customer
        $customer = CustomerDetail::create($validated);
    
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
            'address' => 'nullable|string|max:255',
            'contact_number' => 'required|numeric',
            'amount' => 'nullable|numeric',
            'date_of_purchase' => 'required|date',
            'renewal_date' => 'nullable|date',
            'loan_number' => 'nullable|string|max:255',
            'interest_percentage' => 'nullable|numeric',
            'gold_weight' => 'nullable|numeric',
            'silver_weight' => 'nullable|numeric',
            'number_of_gold' => 'nullable|numeric',
            'number_of_silver' => 'nullable|numeric',
            'gold' => 'nullable|string|max:255',
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
