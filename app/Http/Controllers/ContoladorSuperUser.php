<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estado;
use Illuminate\Support\Facades\DB;

class ContoladorSuperUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereNotIn('id', [20])->get();
        return View('admin.principal',[
            'users'  =>$users,
        ]);
    }

    public function estadistica($descripcion,$id)
    {
        $trabajando = DB::table('actividads')
                ->where('id_usuario', $id)
                ->where('descripcion', "Trabajando")
                ->where('id_estado', $descripcion)
                ->count();
        $comiendo = DB::table('actividads')
                ->where('id_usuario', $id)
                ->where('descripcion', "Comiendo")
                ->where('id_estado', $descripcion)
                ->count();
        $leyendo = DB::table('actividads')
                ->where('id_usuario', $id)
                ->where('descripcion', "Leyendo")
                ->where('id_estado', $descripcion)
                ->count();
        $paseando = DB::table('actividads')
                ->where('id_usuario', $id)
                ->where('descripcion', "Paseando")
                ->where('id_estado', $descripcion)
                ->count();
        $pintando = DB::table('actividads')
                ->where('id_usuario', $id)
                ->where('descripcion', "Pintando")
                ->where('id_estado', $descripcion)
                ->count();
        $estudiando = DB::table('actividads')
                ->where('id_usuario', $id)
                ->where('descripcion', "Estudiando")
                ->where('id_estado', $descripcion)
                ->count();
        return View('admin.estadistica',[
            'trabajando'  =>$trabajando,
            'comiendo'  =>$comiendo,
            'leyendo'  =>$leyendo,
            'paseando'  =>$paseando,
            'pintando'  =>$pintando,
            'estudiando'  =>$estudiando,
        ]);
    }
    public function tabla($descripcion,$id)
    {
        $actividades = DB::table('actividads')
                ->where('id_usuario', $id)
                ->where('id_estado', $descripcion)
                ->get();
        return View('admin.tabla',[
            'actividades'  =>$actividades,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estados = Estado::all();
        return View('admin.mostrarUsuario',[
            'estados'  =>$estados,
            'id' =>$id,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
