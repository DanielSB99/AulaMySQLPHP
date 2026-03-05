<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilUsers extends Controller
{
    public function addUsers() {
        $classDelegate = "Daniel Borges";
        $usersNotFromDB = $this->getUsersNotFromDB();



    return view('users.add_users', compact('classDelegate', 'usersNotFromDB',));
    }
    protected function getUsersNotFromDB() {
    //simulação de users vindos da base de dados
        $usersNotFromDB =[
            ['id'=>1, 'name'=>'Sara', 'email'=>'sara@gmail.com'],
            ['id'=>2, 'name'=>'Maria', 'email'=>'maria@gmail.com'],
            ['id'=>3, 'name'=>'Ricardo', 'email'=>'Ricardo@gmail.com'],
            ['id'=>4, 'name'=>'António', 'email'=>'António@gmail.com'],
        ];
        return $usersNotFromDB;
    }

    public function todosUsers() {
        //Carregar todos os dados da tabela de users
        $usersFromDB = User::get();
        //->first();
        //->where('password','cesae1234')


        return view('users.todos_users', compact('usersFromDB'));
    }

      public function viewUser($id){
        $user=User::where('id',$id)->first();
        return view('users.view', compact('user'));
    }
     public function deleteUser($id){
        DB::table('tasks')->where('user_id', $id)->delete();

        User::where('id', $id)->delete();

        return back();
    }

}
