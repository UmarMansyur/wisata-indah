<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $destination = Tour::with(['gallery', 'costTour', 'typeTour', 'costTour.passenger'])->get();
        return view('admin.order.index', compact('destination'));
    }

    public function addToCart(Request $request)
    {
        try {

            dd($request->all());
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        return view('admin.order.index');
    }
}
