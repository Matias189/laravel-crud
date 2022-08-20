<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;        // Referencia al modelo 

class ArticuloController extends Controller
{
    
    public function index()
    {
        $articulos = Articulo::all();       // Metodo all para ver todos los registros de la tabla
        return view('articulo.index')->with('articulos',$articulos); // Enviar variable $articulos a la vista index(with) para ver los datos
    }

    
    public function create()
    {
        return view('articulo.create'); // Retornar la vista create, para el formulario
        
    }

    // Vista no funcionando
    public function archive()
    {
        $articulos = Articulo::onlyTrashed();       
        return view('articulo.archive')->with('articulos',$articulos);
        
        
    }

    
    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'codigo' => 'required|string|min:3|max:10',
            'descripcion'=> 'required|string|min:10|max:50',
            'cantidad'=> 'required | numeric ',
            'precio'=> 'required'
        ]);

        $articulos= new Articulo();     // Instancia de la clase
        $articulos->codigo=$request->get('codigo');     // Metodo get para capturar codigo
        $articulos->descripcion=$request->get('descripcion');   // Metodo get para capturar descripcion
        $articulos->cantidad=$request->get('cantidad');     // Metodo get para capturar cantidad
        $articulos->precio=$request->get('precio');     // Metodo get para capturar precio

        // If para mostrar el mensaje "Articulo guardado"
        if ($articulos->save()){    
            return redirect('/articulos')->with('flash', 'Artículo Guardado');  
        }else{
            return  redirect('/articulos');
        }

        
    }

    
    public function show($id)
    {
        $articulos = Articulo::onlyTrashed();       
        return view('articulo.archive')->with('articulos',$articulos);
    }

    
    public function edit($id)
    {
        $articulo= Articulo::find($id);
        return view('articulo.edit')->with('articulo',$articulo);
    }

    
    public function update(Request $request, $id)
    {
        // Validaciones
        $request->validate([
            'codigo' => 'required|string|min:3|max:10',
            'descripcion'=> 'required|string|min:10|max:50',
            'cantidad'=> 'required | numeric ',
            'precio'=> 'required'
        ]);


        $articulo=Articulo::find($id);      // Trae un solo articulo con el metodo find para ser editado

        $articulo->codigo=$request->get('codigo');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->cantidad=$request->get('cantidad');
        $articulo->precio=$request->get('precio');

        if ($articulo->save()){     // If para mostrar el mensaje "Articulo Editado"
            return redirect('/articulos')->with('flash2', 'Artículo Editado');
        }else{
            return  redirect('/articulos');
        }

        
    }

    public function destroy($id)
    {
        $articulo=Articulo::find($id);  // Trae un solo articulo con el metodo find para ser eliminado

        if ($articulo->delete()){       // If para mostrar el mensaje "Articulo editado"
            return redirect('/articulos')->with('flash3', 'Artículo Eliminado');
        }else{
            return  redirect('/articulos');
        }


    }

    
}
