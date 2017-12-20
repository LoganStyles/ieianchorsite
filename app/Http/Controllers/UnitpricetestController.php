<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitpricestest;
use App\Unit_price;

class UnitpricetestController extends Controller {

    public function index() {
        return Unitpricestest::all();
    }

    public function show(Unitpricestest $unitprice) {
        return $unitprice;
    }

    public function store(Request $request) {
        print_r($request->all());
//        $unitprice = Unitpricestest::create($request->all());
//        return response()->json($unitprice,201);
    }

    public function update(Request $request, Unitpricestest $unitprice) {
        $unitprice->update($request->all());
        return response()->json($unitprice,200);
    }

    public function delete(Unitpricestest $unitprice) {
        $unitprice->delete();
        return response()->json(null,204);
    }

}
