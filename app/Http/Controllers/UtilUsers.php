<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $search = request()->query('search')? request()->query('search') :null;
        $usersFromDB = DB::table('users');
        if($search){
            $usersFromDB =$usersFromDB->where('name','LIKE', "%{$search}%")
            ->orWhere('email','LIKE', "%{$search}%")
            ->orWhere('nif','LIKE', "%{$search}%");
        };
        $usersFromDB=$usersFromDB->get();
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
    public function storeUsers(Request $request){
        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:8',
        ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('Users.todos')->with('message', 'User adicionado com sucesso!');

    }

    public function updateUsers(Request $request){
        $request->validate([
            'name'=>'required|string|max:50',
            'nif'=>'min:8',
        ]);
        User::where('id',$request->id)->update([
            'name' => $request->name,
            'nif'=>$request->nif
            ]);
            return redirect()->route('Users.todos')->with('message', 'Atualizado com sucesso!');
    }



}
