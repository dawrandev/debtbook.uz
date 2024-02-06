<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\debt;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{

    public function debtpage()
    {
        return view('debt');
    }
    public function single($client_id)
    {
        $i = 1;
        $single = Client::where('id', $client_id)->first();
        $debts = debt::where('client_id', $client_id)->paginate(5);
        return view('debt', compact('single', 'debts', 'i'));
    }
    public function adddebt(Request $request)
    {
        $validate = $request->validate([
            'summa' => 'required|min:3'
        ]);
        $adddebt = debt::create([
            'user_id'=>Auth::user()->id,
            'client_id' => $request->client_id,
            'summa' => '+' . $request->summa,
            'date' => date('d-m-Y')
        ]);
        return $this->single($request->client_id);
    }
    
    public function subtdebt(Request $request)
    {
        $validate = $request->validate([
            'summa' => 'required|min:3'
        ]);
        $subtdebt = debt::create([
            'user_id'=>Auth::user()->id,
            'client_id' => $request->client_id,
            'summa' => '-' . $request->summa,
            'date' => date('d-m-Y')
        ]);
        return $this->single($request->client_id);
    }
}


