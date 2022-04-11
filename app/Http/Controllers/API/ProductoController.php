<?php

namespace App\Http\Controllers\API;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_all_productos = DB::select('call GetAllProducto()');
        return $get_all_productos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = [
            'id' => $request->id,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock
        ];

        $json_data = json_encode($data);

        DB::select('call PostProducto(?)',[$json_data]);
        
        return response()->json([
            'msg' => 'Producto Ingresado',
            'producto' => $json_data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $data = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'stock' => $producto->stock
        ];

        $json_data = json_encode($data);

        $get_producto_one = DB::select('call GetProducto(?)',[$json_data]);

        return $get_producto_one;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = [
            'id' => $request->id,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock
        ];

        $json_data = json_encode($data);
        
        DB::select('call PutProducto(?)',[$json_data]);
        return response()->json([
            'msg' => 'El producto ha sido actualizado',
            'producto' => $json_data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $data = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'stock' => $producto->stock
        ];

        $json_data = json_encode($data);
        
        DB::select('call DeleteProducto(?)',[$json_data]);
        return response()->json([
            'msg' => 'El producto ha sido eliminado',
            'producto' => $json_data
        ]);
    }
}
