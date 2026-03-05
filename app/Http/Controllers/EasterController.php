<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EasterController extends Controller
{

    public function tabelaEaster() {
    $easterGifts = DB::table('easter_gift')
        ->join('users', 'users.id', '=', 'easter_gift.user_id')
        ->select('easter_gift.*', 'users.name as user_name')
        ->get();

    foreach ($easterGifts as $gift) {
        $diferenca = $gift->valor_previsto - $gift->valor_gasto;
        if ($diferenca < 0) {
            $diferenca = $diferenca * -1;
        }
        $gift->diferenca = $diferenca;
    }

    return view('easter.tabelaeaster', compact('easterGifts'));
}


    public function viewEaster($id)
    {
        $gift = DB::table('easter_gift')
            ->join('users', 'users.id', '=', 'easter_gift.user_id')
            ->select('easter_gift.*', 'users.name as user_name')
            ->where('easter_gift.id', $id)
            ->first();
            $diferenca = $gift->valor_previsto - $gift->valor_gasto;

            if ($diferenca < 0) {
            $diferenca = $diferenca * -1;
            }
            $gift->diferenca = $diferenca;

        return view('easter.viewEaster', compact('gift'));
    }


    public function deleteEaster($id)
    {
        DB::table('easter_gift')->where('id', $id)->delete();
        return redirect()->route('Easter.tabelaEaster');
    }


}
