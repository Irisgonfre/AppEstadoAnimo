<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Estado;
use App\Models\User;
use App\Models\Actividad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class Controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $emojis = [
        "😄",
        "🙂",
        "😞",
        "😢"
    ];

    public function index()
    {
        $user = Auth::user();
        if(Auth::check()){
            $userId=$user->id;
        }else{
            $userId=1;
        }

        $estados = Estado::all();
        $actividades = DB::table('actividads')->where('id_usuario', $userId)->get();

        return View('otras.mostrar',[
            'estados'  =>$estados,
            'actividades'=>$actividades,
            'emojis'=>$this->emojis
            
        ]);

    }

    public function filtrarEstado(Request $request){
        //$actividades=Actividad::where('id_estado',$request->filtroActividad)->get();
        //$lista=DB::select('select id_estado from actividades');
        $user = Auth::user();
        $userId=$user->id;
        $estados = Estado::all();
        $actividades = DB::table('actividads')->where('id_usuario', $userId)->where('id_estado', $request->filtroActividad)->get();
        return View('otras.mostrar',[
            'estados'  =>$estados,
            'actividades'=>$actividades,
            'emojis'=>$this->emojis
        ]);
    }
    public function filtrarFecha(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        $estados = Estado::all();
    
        // Recibir la fecha del formulario
        $fecha_creacion = $request->fecha_creacion;
        
        $actividades = DB::table('actividads')
            ->where('id_usuario', $userId)
            ->whereDate('created_at', $fecha_creacion)
            ->get();
    
        return view('otras.mostrar', [
            'estados' => $estados,
            'actividades' => $actividades,
            'emojis'=>$this->emojis
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();
        return View('otras.añadir',[
            'estados'=>$estados
        ]);
    }
    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $Actividad = new Actividad();
        $Actividad->hora_inicio=$request->desde;
        $Actividad->hora_final=$request->hasta;
        $Actividad->id_estado=$request->EstadoAnimo;
        $Actividad->descripcion=$request->Descripcion;
        $Actividad->id_usuario=$user->id;
        $Actividad->save();
        return Redirect::to('actividades');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad=Actividad::find($id);
        $actividad->delete();
        return $this->index();
    }
}
