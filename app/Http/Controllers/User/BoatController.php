<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\BoatRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boat;

class BoatController extends Controller
{
    public function index() {
        $boats = Boat::all();
        return view('user.boat.index', compact('boats'));
    }

    public function create() {

        return view('user.boat.add');
    }

    public function store(BoatRequest $request) {
        try {   
            $boat = Boat::create($request->validated());
            return redirect()->route('boats.index')->with('success', 'Boat information created successfully.');
            
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Boat $boat) {
        try {
            return view('user.boat.edit', compact('boat'));
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(BoatRequest $request, Boat $boat) {
        try {
            $boat->update($request->validated());
            return redirect()->route('boats.index')->with('success', 'Boat information updated successfully.');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Boat $boat) {
        try {
            $boat->delete();
            
            return redirect()->route('boats.index')->with('success', 'Boat information deleted successfully.');
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
