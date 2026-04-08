<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('category.create');
    }



    public function store(Request $request){


        $request->validate([
            'name'=> 'required'
        ]);

        Category::create([
            'name'=>$request->name
        ]);

        return redirect()->route('homepage')->with('successMessage', 'Hai creato la tua categoria');
    }


        public function index()
    {
        $categories = Category::all()->sortBy('name');
        return view('category.index', compact('categories'));
    }

    public function show(Category $category){

        return view('category.show', compact('category'));
    }

}
