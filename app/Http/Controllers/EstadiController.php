<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EstadiController extends Controller
{
    public $estadis=[
        ['nom'=> 'Estadi Johan Cruyff','ciudad'=>'Sant Joan Despí', 'aforo'=>'6000', 'equip'=> 'FC Barcelona Femení'],
        ['nom'=> 'Centro Deportivo Wanda Alcalá de Henares','ciudad'=>'Alcalá de Henares', 'aforo'=>'2800', 'equip'=> 'Atlètic de Madrid Femení'],
        ['nom'=> 'Estadio Alfredo Di Stéfano','ciudad'=>'Madrid', 'aforo'=>'6000', 'equip'=> 'Real Madrid Femení']
    ];

    public function index(){
        $estadi = Session::get('estadis', $this->estadis);
        return view('estadis.index',compact('estadis'));
    }

    public function show(int $id){
        $estadis = Session::get('estadis', $this->estadis);
        abort_if(!isset($estadis[$id]), 404);

        $estadi = $estadis[$id];

        return view('estadis.show', compact('estadi'));
    }

    public function create(){
        return view('estadis.create');
    }
    public function store(Request $request){

        $validated = $request->validate([
            'nom'=>'required',
            'ciudad'=>'required',
            'aforo'=>'required|integer|min:0',
            'equip'=>'required',
        ])

    }
}