<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Tractament;

class EntradasController extends Controller {

    public function index() {
        $clientes = Client::all();
        $tratamientos = Tractament::all();

        return view('index', ['clientes' => $clientes, 'tratamientos' => $tratamientos]);
    }

    public function detalle_cliente($id) {
        $cliente = Client::find($id);

        return view('cliente.detalle', ['cliente' => $cliente]);
    }

    public function delete_cliente($id) {
        $auxiliar = Client::find($id);
        $tratamientos = Tractament::all();

        foreach ($tratamientos as $tratamiento) {
            $auxiliar->tractaments()->detach($tratamiento->id);
        }

        $cliente = Client::find($id)->delete();

        return redirect()->action('EntradasController@index');
    }

    public function formulario_cliente() {
        $tratamientos = Tractament::all();
        return view('cliente.formulario', ['tratamientos' => $tratamientos]);
    }

    public function save_cliente(Request $request) {
        
        $validate = $this->validate($request, [
            'nom' => 'required|string|max:100',
            'cognoms' => 'required|string|max:255',
            'data_naixement' => 'required|date',
        ]);
        
        // Es crea un client nou
        $cliente = new Client;
        $cliente->nom = $request->input('nom');
        $cliente->cognoms = $request->input('cognoms');
        $cliente->data_naixement = $request->input('data_naixement');
        $cliente->save();

        // Agafo tots els tractaments
        $tratamientos = Tractament::all();

        // Agafo la ID del client que s'acaba de crear
        $nuevo = Client::orderBy('id', 'DESC')->first();
        $client = Client::find($nuevo->id);

        // Comprobo quins tractaments s'han de relacionar amb el client
        foreach ($tratamientos as $tratamiento) {
            $test = $request->input($tratamiento->nom_tractament);
            if ($tratamiento->id == $test) {
                // S'efectua la relació
                $client->tractaments()->attach($test);
            }
        }

        return redirect()->action('EntradasController@index');
    }

    public function editar_cliente($id) {
        $cliente = Client::find($id);
        $tratamientos = Tractament::all();
        $auxiliar = array();

        foreach ($cliente->tractaments as $tractament) {
            $auxiliar[] = $tractament->pivot->tractament_id;
        }

        return view('cliente.formulario', ['cliente' => $cliente, 'tratamientos' => $tratamientos, 'auxiliar' => $auxiliar]);
    }

    public function update_cliente(Request $request) {
        
        $validate = $this->validate($request, [
            'nom' => 'required|string|max:100',
            'cognoms' => 'required|string|max:255',
            'data_naixement' => 'required|date',
        ]);
        
        $id = $request->input('id');
        $cliente = Client::find($id);
        $cliente->nom = $request->input('nom');
        $cliente->cognoms = $request->input('cognoms');
        $cliente->data_naixement = $request->input('data_naixement');
        $cliente->save();
        
        // Metemos Los tratamientos que ya tiene el cliente en un array
        $auxiliar = array();
        foreach ($cliente->tractaments as $tractament) {
            $auxiliar[] = $tractament->pivot->tractament_id;
        }

        $tratamientos = Tractament::all();
        
        
        // Añadir nuevos tratamientos al cliente existente (ALGUNOS FALLOS)
        foreach ($tratamientos as $tratamiento) {
            //-----------dd($request->input($tratamiento->pivot));
            // Recorremos todos los tratamientos que nos devuelve el Request
            foreach ($request->input($tratamiento->pivot) as $valor) {
                //-----------echo $valor.'<br/>';
                // Si hay alguno que no esté ya en el array (y con eso conlleva que no esté en la DB) y coincide su id con un tratamiento que nos devuelve el Request, lo añadimos
                if (!in_array($tratamiento->id, $auxiliar) && $tratamiento->id == $valor) {
                    $cliente->tractaments()->attach($tratamiento->id);
                }
            }
        }
        
        
        // ELIMINAR TRATAMIENTOS EN LA ACTUALIZACION (NO OPERATIVO)
        /*
        $auxiliar2 = array();
        var_dump($auxiliar);
        var_dump($request->input($tratamiento->pivot));
        
        foreach ($request->input($tratamiento->pivot) as $variable){
            //echo $variable;
            if(in_array($variable, $auxiliar) && $variable == $tratamiento->id){
                //dd($cliente->tractaments[0]->id);
                //echo $variable.'<br/>';
                $auxiliar2[] = (int)$variable;
            }
        }
        //var_dump($auxiliar2);
        foreach($auxiliar as $aux){
            if(!in_array($aux, $auxiliar2)){
                echo $aux;
                $cliente->tractaments()->detach($aux);
            }
        }
        */
        return redirect()->action('EntradasController@index');
    }
    
    public function detalle_tratamiento($id) {
        $tratamiento = Tractament::find($id);

        return view('tratamiento.detalle', ['tratamiento' => $tratamiento]);
    }
    
    
    public function formulario_tratamiento() {

        return view('tratamiento.formulario');
    }
    
    public function save_tratamiento(Request $request) {
        
        $validate = $this->validate($request, [
            'nom_tractament' => 'required|string|max:255',
            'descripcio' => 'required|string'
        ]);
        
        // Es crea un client nou
        $tractament = new Tractament;
        $tractament->nom_tractament = $request->input('nom_tractament');
        $tractament->descripcio = $request->input('descripcio');
        $tractament->save();

        return redirect()->action('EntradasController@index');
    }
    
    public function delete_tratamiento($id) {
        $tratamiento = Tractament::find($id);
        $clientes = Client::all();

        foreach ($clientes as $cliente) {
            $cliente->tractaments()->detach($tratamiento->id);
        }
        $tratamiento->delete();
        
        return redirect()->action('EntradasController@index');
    }
    
    public function editar_tratamiento($id) {

        $tratamiento = Tractament::find($id);

        return view('tratamiento.formulario', ['tratamiento' => $tratamiento]);
    }
    
    public function update_tratamiento(Request $request) {
        
        $validate = $this->validate($request, [
            'nom_tractament' => 'required|string|max:100',
            'descripcio' => 'required|string',
        ]);
        
        $id = $request->input('id');
        $tratamiento = Tractament::find($id);
        $tratamiento->nom_tractament = $request->input('nom_tractament');
        $tratamiento->descripcio = $request->input('descripcio');
        $tratamiento->save();
        
        return redirect()->action('EntradasController@index');
    }

}
