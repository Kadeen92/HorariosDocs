<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sede as Sede;
class Sede1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {	
    	$sede = new Sede;
		$parametros['ruta'] 				= ['route' => 'sede.store'];
		$parametros['metodo'] 				= 'POST';
		$parametros['sede'] 		=  '';
		$parametros['idprovincia'] 		=  '';
        // llama al for del mantenimiento de roles
        return view('sede')->with('parametros', $parametros)->with('sede', $sede);  ;
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
			$sede = new Sede;
			$sede->sede			= $request->input('sede');
			$sede->idprovincia	= $request->input('idprovincia');
			$sede->save();
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
    public function edit(Request $request,$id)
    {
        //
        $sede = Sede::find($id);
		$parametros['ruta'] 		 	= ['route' => ['sede.update', $id], 'method' => 'patch'];
		$parametros['sede'] 		 	= $sede->sede;
		$parametros['idprovincia'] 	 	= $sede->idprovincia;
		return view('sede')->with('parametros', $parametros)->with('sede',$sede);
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
        $sede = Sede::find($id);
        
		$sede->sede 				= $request->input('sede');
		$sede->idprovincia 			= $request->input('idprovincia');
		$sede->save();
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
        Sede::destroy($id);
		return \Redirect::route('sede.index');
    }
}
