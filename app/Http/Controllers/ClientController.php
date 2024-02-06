<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Jsonable;

class ClientController extends Controller
{
    public $clients;
    public $debts;
    public $summa;
    public $user_id;

    public function __construct(){
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        $this->user_id = Auth::user()->id;
        $this->clients = Client::where('user_id', $this->user_id)
            ->paginate(5);
        $this->debts = Debt::where('user_id', $this->user_id)
            ->paginate(5);
        return $next($request);
    });
}
    public function clientsPage(){
        $clients = $this->clients;
        $debts = $this->debts;
        $summa = $this->summa;
        $i = 1;
        return view('client', compact('clients', 'i', 'debts', 'summa'));
    }
    private function calculateSumma()
    {
        return Debt::sum('summa');
    }
    
    public function addclient(Request $request)
    {
       $existingClient = Client::where([
        'phone'=>$request->phone
       ])->first();
       
        if($existingClient->user_id == Auth::user()->id){
            $this->clients = Client::where([
                'phone'=>$request->phone
            ])->paginate(5);
            return $this->clientsPage();
        }else{
        $validate = $request->validate([
            'name'=>'required|min:2',
            'phone'=>'required|unique:clients|min:8|max:9',
            'summa'=>'required|min:3'
        ]);
        $addClient = Client::create([
            'user_id'=>Auth::user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        
        $addDebt = Debt::create([
            'user_id'=>$this->user_id,
            'client_id' => $addClient->id,
            'summa' => $request->summa,
            'date' => date('m-d-Y')
        ]);
        $this->clients = Client::paginate(5);
        $this->debts = Debt::all();
        $this->summa = $this->calculateSumma();
        
        return back();
    }
}
        public function searchClient(Request $request){
            $clients = DB::table('clients')
            ->orwhere('name', 'LIKE', '%'.$request->search.'%')
            ->orwhere('phone', 'LIKE', '%'.$request->search.'%')
            ->first();
            if($request->user_id == $clients->user_id){
                $this->clients = Client::where('name', 'LIKE', '%'.$request->search.'%')
                ->orwhere('phone', 'LIKE', '%'.$request->search.'%')
                ->paginate(5);
                return $this->clientsPage();
            }{
                $this->clients = "Null";
                return $this->clientsPage();
            }
        }
}