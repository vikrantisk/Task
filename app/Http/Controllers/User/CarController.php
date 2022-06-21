<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\CarRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index() {

        $cars = Car::all();
        return view('user.car.index', compact('cars'));
    }

    public function create() {

        return view('user.car.add');
    }

    public function store(CarRequest $request) {
        try {   
            $car = Car::create($request->validated());
            return redirect()->route('cars.index')->with('success', 'Car information created successfully.');
            
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Car $car) {
        try {
            return view('user.car.edit', compact('car'));
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(CarRequest $request, Car $car) {
        try {
            $car->update($request->validated());
            return redirect()->route('cars.index')->with('success', 'Car information updated successfully.');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Car $car) {
        try {
            $car->delete();
            
            return redirect()->route('cars.index')->with('success', 'Car information deleted successfully.');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
