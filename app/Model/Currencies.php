<?php


namespace App\Model;

use Carbon\Carbon;
use Curl\Curl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Currencies extends Model
{
    protected $table = 'currencies';
    public $timestamps = false;
    protected $primaryKey = 'r030';


    public static function loader($date)
    {
        $curl  = new Curl();
        $curl->get(env('API_URL')."&date=".$date);

        $res = $curl->response;


        foreach ($res as $item)
        {
           $data = self::where('r030',$item->r030)->whereBetween('exchangedate', [Carbon::parse($item->exchangedate)->toDateTimeString().' 00:00:00', Carbon::parse($item->exchangedate)->toDateTimeString().' 23:59:59'])->first();

           if($data)
           {
               if($data->rate != $item->rate)
               {
                   $data->rate = $item->rate;
                   $data->save();
               }
           }else
           {
               $date  = Carbon::parse($item->exchangedate);

               $item->exchangedate = $date->toDateTimeString();

               self::insert((array)$item);
           }
        }
        return $res;
    }

}
