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

    public function addEaster() {

        $users = DB::table('users')->get();
        return view('easter.addEaster', compact('users'));
    }

     public function storeEaster(Request $request) {
        $request->validate([
            'name' => 'required|string|max:50',
            'user_id' => 'required',
            'valor_previsto' => 'required|numeric',

        ]);

        DB::table('easter_gift')->insert([
            'nome_da_prenda' => $request->name,
            'user_id' => $request->user_id,
            'valor_previsto' => $request->valor_previsto,
            
        ]);

        return redirect()->route('Easter.tabelaEaster')->with('message', 'Presente adicionado com sucesso!');
    }

}
