<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use PDF;
use App\Exports\UserExport;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::all();
        //$userP = auth()->user();
        $users = User::paginate(4);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //Upload file
        if ($request->hasFile('photo')) {
            // Almacena el archivo en el sistema de archivos y obtiene solo el nombre hash del archivo.
            $photo = $request->file('photo');
            $photoName = $request->file('photo')->getClientOriginalName();
            // Almacena el archivo en la ubicación especificada.
           $destinoPath = public_path('/images/userProfile');
            $photo->move($destinoPath, $photoName);
        } else {
            $photoName = 'no-photo.jpg';
        }

        $user = new User();
        $user->document     = $request->document;
        $user->fullname     = $request->fullname;
        $user->gender       = $request->gender;
        $user->birthdate    = $request->birthdate;
        $user->photo        = $photoName;
        $user->phone        = $request->phone;
        $user->email        = $request->email;
        $user->password     = bcrypt($request->password);

        if($user->save()) {
            return redirect('users')
                ->with('message', 'El usuario ' . $user->fullname . ' ha sido creado con éxito');
        } else {
            return redirect('users')->with('message', 'Ocurrió un error al intentar crear el usuario');
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //dd($user)->toArray();
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $request->file('photo')->getClientOriginalName();
            $destinoPath = public_path('/images/userProfile');
            $photo->move($destinoPath, $photoName);
        } else {
            $photoName = $request->originPhoto;
        }

        $user->document     = $request->document;
        $user->fullname     = $request->fullname;
        $user->gender       = $request->gender;
        $user->birthdate    = $request->birthdate;
        $user->photo        = $photoName;
        $user->phone        = $request->phone;
        $user->email        = $request->email;

        if($user->save()) {
            return redirect('users')
                ->with('message', 'El usuario ' . $user->fullname . ' ha sido editado con éxito');
        } else {
            return redirect('users')->with('message', 'Ocurrió un error al intentar editar el usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            return redirect('users')
                ->with('message', 'El usuario ' . $user->fullname . ' ha sido eliminado con éxito');
        } else {
            return redirect('users')->with('message', 'Ocurrió un error al intentar eliminar el usuario');
        }
    }

    // Para el seach de busqueda
    public function search(Request $request) {        
        $users = User::names($request->q)->paginate(4);
        return view('users.search')->with('users', $users);
    }

    public function pdf() {
        $users = User::all();
        $pdf = PDF::loadView('users.pdf', compact('users'));
        return $pdf->download('allusers.pdf');
    }

    public function excel() {
        return \Excel::download(new UserExport, 'users.xlsx');
    }
}
