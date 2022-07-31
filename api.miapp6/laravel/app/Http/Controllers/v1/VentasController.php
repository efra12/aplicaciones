<?php
 
namespace App\Http\Controllers\v1;

use App\Models\Venta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 
class VentasController extends Controller
{
    public function getAll()
    {
        $response_local=new \stdclass();

        $ventas = Venta::all();

        $response_local->success=true;
        $response_local->data=$ventas;

        return response()->json($response_local,200);
    }

    public function getItem($id) 
    {
        $response_local=new \stdClass();

        $ventas = Venta::find($id);

        $response_local->data=$venta;
        $response_local->success=true;
        return response()->json($response_local,200);  
    }
        
    public function store(Request $request)
    {
        $response_local=new \stdClass();

        $venta = new Venta();
        $venta->codigo=$request->codigo;
        $venta->producto=$request->producto;
        $venta->cantidad=$request->cantidad;
        $venta->descuento=$request->descuento;
        $venta->total=$request->total;
        $venta->tarjeta=$request->tarjeta;
        $venta->fecha=$request->fecha;
        $venta->distrito=$request->distrito;
        $venta->provincia=$request->provincia;
        $venta->vendedor=$request->vendedor;
        $venta->promocion=$request->promocion;
        $venta->cupon=$request->cupon;
        $venta->save();

        $response_local->data=$venta;
        $response_local->success=true;
        return response()->json($response_local,200);  
       
    }

    public function update(Request $request,$id)
    {
        $response_local= new \stdclass();

        $venta = Venta::find($id);
        $venta->codigo=$request->codigo;
        $venta->producto=$request->producto;
        $venta->cantidad=$request->cantidad;
        $venta->descuento=$request->descuento;
        $venta->total=$request->total;
        $venta->tarjeta=$request->tarjeta;
        $venta->fecha=$request->fecha;
        $venta->distrito=$request->distrito;
        $venta->provincia=$request->provincia;
        $venta->vendedor=$request->vendedor;
        $venta->promocion=$request->promocion;
        $venta->cupon=$request->cupon;
        $venta->save();

        $response_local->data=$venta;
        $response_local->success=true;
        return response()->json($response_local,200);
    }

    public function patchUpdate(Request $request,$id)
     {
        $response_local = new \stdClass();
        $venta = Ventas::find($id);


        if($request->id!=null)
        {
            $venta->id=$request->id;
        }

        if($request->producto!=null)
        {
            $venta->producto=$request->producto;
        }

        if($request->cantidad!=null)
        {
            $venta->cantidad=$request->cantidad;
        }

        if($request->total!=null)
        {
            $venta->total=$request->total;
        }

        if($request->tarjeta!=null)
        {
            $venta->tarjeta=$request->tarjeta;
        }

        if($request->fecha!=null)
        {
            $venta->fecha=$request->fecha;
        }

        if($request->distrito!=null)
        {
            $venta->distrito=$request->distrito;
        }

        if($request->provincia!=null)
        {
            $venta->provincia=$request->provincia;
        }

        if($request->vendedor!=null)
        {
            $venta->vendedor=$request->vendedor;
        }

        if($request->promocion!=null)
        {
            $venta->promocion=$request->promocion;
        }

        if($request->cupon!=null){
            $venta->cupon=$request->cupon;
        }

        $venta->save();

        $response_local->data=$venta;
        $response_local->success=true;
        return response()->json($response_local,200);
    }
    public function delete($id)
    {
        $response_local=new \stdClass();

        $venta = Venta::find($id);
        $venta->delete();

        $response_local->data=Venta::all();
        $response_local->success=true;
        return response()->json($response_local,200);
    }
}