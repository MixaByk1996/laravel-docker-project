<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\Currency;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class CurrencyController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $count = Currency::all()->count();
        if($count == 0){
            Excel::import(new ExcelImport(), storage_path('app/public/list-one.xls'));
        }
        $currencies = Currency::query()->paginate(20);
        return view('welcome', ['currencies' => $currencies]);
    }

    public function setStatus(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $currency = Currency::query()->where('id', $id)->first();
        $currency->update([
            'is_active' => $request->is_active
        ]);
        return response()->json([
            'message' => 'Ok'
        ]);
    }
}
