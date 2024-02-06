<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;


class HistoryController extends Controller
{
    public function history()
    {
        $user_id = Auth::user()->id;
        $histories = DB::table('clients')
        ->join('debts', function($join) use($user_id){
            $join->on('clients.user_id', '=', 'debts.user_id')
            ->on('clients.id', '=', 'debts.client_id')
            ->where('clients.user_id', '=', $user_id)
            ->select('clients.name', 'clients.phone', 'debts.summa', 'debts.date');
        })->paginate(5);
        $i = 1;
        return view('history', compact('histories', 'i'));
    }
}
