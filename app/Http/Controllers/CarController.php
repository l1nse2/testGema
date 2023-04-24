<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        //dd($cars);
        return view('index' , compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carViews/newCar');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'marca'=>'required',
            'modelo'=>'required',            
            'version'=>'required',
            'precio'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'anio'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'fecha_ingreso'=>'required|date'
        ],[
    		'required' => 'Cuidado!! el campo :attribute no se puede dejar vacio',
    		'valor.max' => 'Cuidado!! el campo :attribute no puede superar los 10 caracteres',
    		'valor.regex' => 'Cuidado!! el campo :attribute solo admite numeros' 
		]);

        if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);            
        }else{
            if($request->file())
            {
                $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();            
                if($request->file->move(public_path('images/cars'), $fileName)){                
                    $auto = new Car();
                    $auto->imagen=($fileName);
                    $auto->marca= $request->get('marca');
                    $auto->modelo= $request->get('modelo');
                    $auto->version= $request->get('version');
                    $auto->anio= $request->get('anio');
                    $auto->precio= $request->get('precio');
                    $auto->fecha_ingreso= $request->get('fecha_ingreso');
                    
                    if($auto->save())
                    {
                        $success = 'Se a agregado con exito el nuevo auto a la lista';
                        $cars = Car::all();
                        return view('index' , compact('success' , 'cars'));
                    }else
                    {
                        dd('error no guardo');
                    }
                }else 
                {
                    dd('error');
                }
            }else
            {
                $error= 'Error al cargar la imagen';
                return Redirect::back()->withErrors($error); 
            }
        }


       
    }

    public function show(string $id)
    {
        $car = Car::find($id);
        //$files = Storage::disk('public')->allFiles('/images/cars');
        //dd($files);
        return view('carViews/showCar' , compact('car'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
