<?php

namespace App\Http\Controllers;

use App\Events\PrivateEvent;
use Illuminate\Http\Request;
use App\Events\NewTradeEvent;

class TradeController extends Controller
{
    public function testEvent()
    {
        $data = [
            ['id'=>1,'name'=>'Kush Kumar Soni','email'=>'test@gmail.com'],
            ['id'=>2,'name'=>'Abhishek','email'=>'abhishek@gmail.com'],
            ['id'=>3,'name'=>'Sachin Singh','email'=>'sachinsingh@gmail.com'],
            ['id'=>4,'name'=>'Kausubh Sharma','email'=>'kausubh@gmail.com'],
            ['id'=>5,'name'=>'Deepak Yadav','email'=>'deepakYadav@gmail.com']
        ];
        event(new NewTradeEvent($data));
    }

    public function checkTestEvent()
    {
      return view('checking');
    }

    public function privateMessage()
    {
        $data = [
            ['id'=>1,'name'=>'Kush Kumar Soni','email'=>'test@gmail.com'],
            ['id'=>2,'name'=>'Abhishek','email'=>'abhishek@gmail.com'],
            ['id'=>5,'name'=>'Deepak Yadav','email'=>'deepakYadav@gmail.com']
        ];
        event(new PrivateEvent($data));
    }

}
