<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id','DESC')->paginate(5);
        return view('category.index',["categories" => $categories]);
    }

    public function create() {
        return view('category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'required|string|max:255',
            'is_active'  => 'sometimes',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',

        ]);
        
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/category/';

            $file->move($path,$filename); 
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->is_active = $request->has('is_active');
        $category->image = $path . $filename;
        $category->user_id = Auth::id(); 
        $category->save();

        return redirect()->route('category.index')->with('message','Category successfully created'); 
    }

    public function edit($id) {
        $category = Category::findorfail($id);
        if($category->user->isNot(Auth::user())){
           $message = 'You are not authorized to edit this category since you did not create it';
           return view('errors.403',compact('message'));
        }
        
        return view('category.edit',compact('category'));
    }
    
    public function update(Request $request,$id) {
        
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'description' => 'required|string|max:255',
            'is_active'  => 'sometimes',
        ]);
        
        $category = Category::findorfail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->is_active = $request->has('is_active'); 
        $category->save();

        return redirect()->route('category.index')->with('message','Category successfully edited'); 
    }

    public function show($id) {
        $category = Category::findOrFail($id);

       
        return view('category.show', compact('category'));
    }


    public function destroy($id) {
        $category = Category::findOrFail($id);
        if($category->user->isNot(Auth::user())){
            $message = 'You are not authorized to delete this category since you did not create it';
           return view('errors.403',compact('message'));
        }
        $category->delete();
        return redirect()->route('category.index')->with('message','Category successfully deleted');
    }

}
