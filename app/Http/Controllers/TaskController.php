<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
     public function todasTarefas(){


        $todasTarefasFromDB = $this->getTarefasFromDB();

            return view('tasks.tarefas', compact('todasTarefasFromDB',));
        }

    public function viewTarefa($id){
        $tarefa = DB::table('tasks')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select('tasks.*', 'users.name as responsavel')
            ->where('tasks.id', $id)
            ->first();
        return view('tasks.viewT', compact('tarefa'));
    }

    public function deleteTarefa($id){
        DB::table('tasks')->where('id', $id)->delete();
        return back();
    }



        protected function getTarefasFromDB(){
            $tasks = DB::table('tasks')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select('tasks.*','users.name as responsavel')
            ->get();
            return $tasks;
        }


    public function addTarefas() {

        $users = DB::table('users')->get();
        return view('tasks.add_tasks', compact('users'));
    }

    public function storeTasks(Request $request) {
        $request->validate([
            'name' => 'required|string|max:50',
            'descricaoTarefa' => 'required|string',
            'user_id' => 'required',
        ]);

        DB::table('tasks')->insert([
            'name' => $request->name,
            'description' => $request->descricaoTarefa,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('Tarefas.todos')->with('message', 'Tarefa adicionada com sucesso!');
    }

}
