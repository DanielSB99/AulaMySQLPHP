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
        $gift->diferenca = abs($gift->valor_previsto - $gift->valor_gasto);
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
            $gift->diferenca = abs($gift->valor_previsto - $gift->valor_gasto);

            $users = DB::table('users')->get();

        return view('easter.viewEaster', compact('gift', 'users'));
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
            'user_id' => 'required|exists:users,id',
            'valor_previsto' => 'required|numeric',

        ]);

        DB::table('easter_gift')->insert([
            'nome_da_prenda' => $request->name,
            'user_id' => $request->user_id,
            'valor_previsto' => $request->valor_previsto,

        ]);

        return redirect()->route('Easter.tabelaEaster')->with('message', 'Presente adicionado com sucesso!');
    }
    public function updateEaster(Request $request){
        $request->validate([
            'name'=>'required|string|max:50',
            'user_id' => 'required|exists:users,id',
            'valor_previsto' => 'required|numeric',
            'valor_gasto' => 'numeric',
        ]);
        DB::table('easter_gift')->where('id',$request->id)->update([
            'nome_da_prenda' => $request->name,
            'user_id' => $request->user_id,
            'valor_previsto' => $request->valor_previsto,
            'valor_gasto'=>$request->valor_gasto
            ]);
            return redirect()->route('Easter.tabelaEaster')->with('message', 'Atualizado com sucesso!');
    }

}
