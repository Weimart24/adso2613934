<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(4);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Upload file
        if ($request->hasFile('photo')) {
            // Almacena el archivo en el sistema de archivos y obtiene solo el nombre hash del archivo.
            $photo = $request->file('photo');
            $photoName = $request->file('photo')->getClientOriginalName();
            // Almacena el archivo en la ubicación especificada.
            $destinoPath = public_path('/images/imageCategory');
            $photo->move($destinoPath, $photoName);
        } else {
            $photoName = 'no-categories.jpg';
        }

        $category = new Category();
        $category->name = $request->name;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->image = $photoName;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('categories')
                ->with('message', 'La categoría ' . $category->name . ' ha sido creado con éxito');
        } else {
            return redirect('categories')->with('message', 'Ocurrió un error al intentar crear la categoría');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //Upload file
        if ($request->hasFile('photo')) {
            // Almacena el archivo en el sistema de archivos y obtiene solo el nombre hash del archivo.
            $photo = $request->file('photo');
            $photoName = $request->file('photo')->getClientOriginalName();
            // Almacena el archivo en la ubicación especificada.
            $destinoPath = public_path('/images/imageCategory');
            $photo->move($destinoPath, $photoName);
        } else {
            $photoName = 'no-categories.jpg';
        }

        $category->name = $request->name;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->image = $photoName;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('categories')
                ->with('message', 'La categoría ' . $category->name . ' ha sido actualizada con éxito');
        } else {
            return redirect('categories')->with('message', 'Ocurrió un error al intentar actualizar la categoría');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            return redirect('categories')
                ->with('message', 'La categoría ' . $category->name . ' ha sido eliminada con éxito');
        } else {
            return redirect('categories')->with('message', 'Ocurrió un error al intentar eliminar la categoría');
        }
    }
    //Busqueda de categorias
    public function search(Request $request)
    {
        $categories = Category::names($request->q)->paginate(4);
        return view('categories.search')->with('categories', $categories);
    }
}
