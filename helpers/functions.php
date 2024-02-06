<?php

use App\Models\debt;

function summa($client_id){
    $summa = debt::where('client_id' , $client_id)->sum('summa');
    return $summa;
}

?>