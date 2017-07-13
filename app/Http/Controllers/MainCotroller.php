<?php

namespace App\Http\Controllers;

use App\Model\Currencies;
use Illuminate\Http\Request;

class MainCotroller extends Controller
{
    public function index(Request $request)
    {
        return view('main');
    }
    public function get_currencies(Request $request)
    {
        try {
            $date = $request->input('date');
            $data = Currencies::whereBetween('exchangedate', [$date . ' 00:00:00', $date . ' 23:59:59'])->get();

            return response()->json($data);
        } catch (\Exception $e)
        {
            return response()->json([
                'res' => 0,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function fast_load_currencies(Request $request)
    {
        try
        {
            $date = $request->input('date');
            $data = Currencies::get_res($date);

            return response()->json($data);
        }catch (\Exception $e)
        {
            return response()->json([
                'res' => 0,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function load_currencies(Request $request)
    {
        try
        {
            $date = $request->input('date');
            $data = Currencies::loader($date);

            return response()->json([
                'res' => 1,
                'data' =>$data
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'res' => 0,
                'error' => $e->getMessage()
            ]);
        }

    }
}