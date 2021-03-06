<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Cargos\Cargos;

use App\Cargos as Cargoss;
class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //parametros iniciales de la vista cargos
        $cargos = new Cargoss;
		$parametros['ruta'] 				= ['route' => 'cargos.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['cargo'] 		=  '';
		//lamamos al form de registro personas
		return view('cargos')->with('parametros', $parametros)->with('cargos', $cargos);  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $cargos = new Cargoss;
		$cargos->cargo			= $request->input('cargo');
		$cargos->save();
		return redirect()->back();       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
         $cargos = Cargoss::find($id);
		
		$parametros['ruta'] 		 	= ['route' => ['cargos.update', $id], 'method' => 'patch'];
		
		$parametros['cargo'] 	= $cargos->cargo;
		return view('cargos')->with('parametros', $parametros)->with('cargos', $cargos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        //
        $cargos = Cargoss ::find($id);
		$cargos->cargo					= $request->input('cargo');
		$cargos->save();
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        Cargoss::destroy($id);
		return \Redirect::route('cargos.index');
    }
}
