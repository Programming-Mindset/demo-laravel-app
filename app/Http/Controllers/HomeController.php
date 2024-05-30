<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Xenon\LaravelBDSms\Facades\SMS;
use Xenon\LaravelBDSms\Provider\Ssl;
use Xenon\LaravelBDSms\Sender;

class HomeController
{

    public function upload(Request $request)
    {
        //echo SMS::shoot('01733499574', 'hi');

        $sender = Sender::getInstance();
        $sender->setProvider(Ssl::class);
        $sender->setMobile(['017XXYYZZAA','01733499574']);
//$sender->setMobile(['017XXYYZZAA','018XXYYZZAA']);
        $sender->setMessage('helloooooooo boss!');
        $sender->setQueue(false); //if you want to sent sms from queue
        $sender->setConfig(
            [
                'api_token' => 'api token goes here',
                'sid' => 'text',
                'csms_id' => 'sender_id'
            ]
        );
        echo $status = $sender->send();
    }


    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $time = Carbon::parse($request->timestamp);

            return Shift::where(function ($query) use ($time) {

                $query->where(function ($query) use ($time) {
                    $query->whereTime('start', '>=', $time->toTimeString())
                        ->orWhereTime('end', '<=', $time->toTimeString());
                })->orWhere(function ($query) use ($time) {
                    $query->where('has_next_day', 1)
                        ->where(function ($q) use ($time) {
                            $q->whereTime('start', '>=', $time)
                                ->orWhereTime('end', '<=', $time);
                        });
                });
            })->when($request->has('company_id') && !empty($request->company_id), function ($query) use ($request) {
                $query->where('company_id', $request->company_id);
            })->get();
        }

        $companies = Shift::select('company_name', 'company_id')->get();
        return view('search')->with('companies', $companies);
    }
}
