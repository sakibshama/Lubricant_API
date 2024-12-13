<?php

// app/Http/Controllers/Api/InvestmentController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::with('paymentType')->get();
        return response()->json($investments, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'investor_name' => 'required|string|max:255',
            'payment_id' => 'required|exists:payment_types,id',
            'amount' => 'required|numeric',
            'status' => 'nullable|boolean',
        ]);

        $investment = Investment::create($validated);
        return response()->json($investment, Response::HTTP_CREATED);
    }

    public function show(Investment $investment)
    {
        return response()->json($investment->load('paymentType'), Response::HTTP_OK);
    }

    public function update(Request $request, Investment $investment)
    {
        $validated = $request->validate([
            'investor_name' => 'string|max:255',
            'payment_id' => 'exists:payment_types,id',
            'amount' => 'numeric',
            'status' => 'boolean',
        ]);

        $investment->update($validated);
        return response()->json($investment, Response::HTTP_OK);
    }

    public function destroy(Investment $investment)
    {
        $investment->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
