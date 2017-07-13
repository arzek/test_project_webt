<?php

namespace App\Http\Controllers;

use App\Model\Currencies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mockery\Exception;

class MainCotroller extends Controller
{
    public function index(Request $request)
    {
//        $date_0 = $request->input('date_0');
//        $date_1 = $request->input('date_1');
//
//
//        if($date_0 && $date_1)
//        {
//            $data = Currencies::whereBetween('exchangedate', [$date_0.' 00:00:00', $date_0.' 23:59:59'])->get();
//
//            if(count($data) == 0)
//                $data = Currencies::loader($date_1);
//
//        }else
//        {
//            $date = Carbon::now();
//            $f_date  = $date->year.'/'.$date->month.'/'.$date->day;
//        }





        return view('main');
    }
    public function get_currencies(Request $request)
    {
        $date = $request->input('date');
        $data = Currencies::whereBetween('exchangedate', [$date.' 00:00:00', $date.' 23:59:59'])->get();

        return response()->json($data);
    }

    public function fast_load_currencies(Request $request)
    {
        $date = $request->input('date');
        $data = Currencies::get_res($date);

        return response()->json($data);
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