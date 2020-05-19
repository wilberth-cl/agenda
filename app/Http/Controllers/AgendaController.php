<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth',['only'=>'create']);  //** Aplicarlo de manera individual
        //$this->middleware('auth')->only(['create']); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $buscar = $request->get('buscarpor');   
        $tipo = $request->get('tipo');
 
        $variablesurl = $request->all();     

        $Agenda = Agenda::buscarpor($tipo, $buscar)->paginate(5)->appends($variablesurl);
        return view('agenda.index',compact('Agenda'));
    }

        #para utilizar un solo filtro index(Request $request)
        #$nombre = $request->get('buscarpor');
        #$Agenda = Agenda::where('nombres','like',"%$nombre%")->paginate(5);
        #return view('agenda.index',compact('Agenda')); 

        /**
                "%$nombre%" buscar por palabras que contengan lo que se recibe
                $nombre buscar palabras especifica que contengan -- falta comprobar
        */

        //$Agenda = Agenda::paginate(5); // muestra todo

        //$Agenda = Agenda::all(); // muestra todo

        //return dd($Agenda);         -----------ver que estoy mandando
        //return view('agenda.index');
        //return ('agenda.index');    -----------es una Ruta
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Agenda = new Agenda;
        $Agenda->nombres = $request->nombres;
        $Agenda->apellidos = $request->apellidos;
        $Agenda->telefono = $request->telefono;
        $Agenda->celular = $request->celular;
        $Agenda->genero = $request->genero;
        $Agenda->email = $request->email;
        $Agenda->posicion = $request->posicion;
        $Agenda->departamento = $request->departamento;
        $Agenda->salario = $request->salario;
        $Agenda->fechanacimiento = $request->fechadenacimiento;
        $Agenda->save();

        return redirect()->route('agenda.index')->with('guardando','¡Registro guardado correctamente!');
        //return dd($request);    
        //return 'Guardado Correctamente';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Agenda=Agenda::findOrFail($id);
        return view('agenda.show',compact('Agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Agenda=Agenda::findOrFail($id);
        return view('agenda.edit',compact('Agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Agenda=Agenda::findOrFail($id);
        $Agenda->nombres = $request->nombres;
        $Agenda->apellidos = $request->apellidos;
        $Agenda->telefono = $request->telefono;
        $Agenda->celular = $request->celular;
        $Agenda->genero = $request->genero;
        $Agenda->email = $request->email;
        $Agenda->posicion = $request->posicion;
        $Agenda->departamento = $request->departamento;
        $Agenda->salario = $request->salario;
        $Agenda->fechanacimiento = $request->fechadenacimiento;
        $Agenda->save();

        return redirect()->route('agenda.index')->with('guardando','¡Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Agenda = Agenda::findOrFail($id);
        $Agenda->delete();
        return redirect()->route('agenda.index')->with('guardando','¡Registro eliminado correctamente!');
    }

    public function confirm($id)
    {
        $Agenda = Agenda::findOrFail($id);
        return view('agenda.confirmaeliminar',compact('Agenda'));
    }
}
