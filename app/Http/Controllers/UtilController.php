<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;



class UtilController extends Controller
{
   public function home() {
    //Variel de servido: no futuro ira carregar dados a partir da based de dados
    $classname = "Tecnico Especialista de Programação de Sistemas e Informação";
    $cursoInfo=[
        'Classnr' => 5,
        'hrs' => '1500h',
        'responsable' => 'Dra Anabela'
    ];
    $cesaeInfo=[
        'name' =>'Cesae',
        'address'=>'Rua Ciriaco Cardoso 186,4150-212 Porto',
        'email' => 'cesae@cesae.pt'
    ];
    //fazer debug do codigo
    //dd($cursoInfo);
    $classes=['TEPSI','Softare Development','low code'];
     $tarefasAula = $this->getTarefas();


    return view('Utils.Home', compact('classname', 'cursoInfo', 'cesaeInfo', 'tarefasAula',));
}
    public function welcome() {
    return view('welcome');
}

        public function addUsers() {
            return view('users.add_users');
        }

        public function fallback() {
            return view('Utils.fallback');
        }

        protected function getTarefas(){
        $tarefasAula = [
            'Comprar fruta, legumes e bens essenciais no supermercado.','Discutir o planeamento semanal e os novos objetivos.','Liquidar as contas da eletricidade e da água deste mês.','Fazer o treino de musculação e 20 minutos de cardio.'
        ];
        return $tarefasAula;
        }


}

