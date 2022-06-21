<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\TruckRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truck;

class TruckController extends Controller
{
    public function index() {
        $trucks = Truck::all();
        return view('user.truck.index', compact('trucks'));
    }

    public function create() {

        return view('user.truck.add');
    }

    public function store(TruckRequest $request) {
        try {   
            $truck = Truck::create($request->validated());
            return redirect()->route('trucks.index')->with('success', 'Truck information created successfully.');
            
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Truck $truck) {
        try {
            return view('user.truck.edit', compact('truck'));
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(TruckRequest $request, Truck $truck) {
        try {
            $truck->update($request->validated());
            return redirect()->route('trucks.index')->with('success', 'Truck information updated successfully.');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Truck $truck) {
        try {
            $truck->delete();
            
            return redirect()->route('trucks.index')->with('success', 'Truck information deleted successfully.');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
