<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;


class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Categories::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'filepath' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          if ($request->hasFile('filepath')) {
            // Get jst ext
            $extension = $request->file('filepath')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = time() . '.' . $extension;
            //uplod image
            $file = $request->file('filepath');
            $destinationPath = public_path('/uploads');
            $file->move($destinationPath, $fileNameToStore);
        } else {
            return redirect()->back()->withInput($request->input())->with('error', 'File Not Selected');
        }

        $categories = new Categories([
        'name' => $request->get('name'),
        'description'=> $request->get('description'),
        'status'=> $request->get('status'),
        'filepath'=>$fileNameToStore
        ]);
        $categories->save();
        return redirect('/categories')->with('success', 'Categories has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);

        return view('categories.edit', compact('categories'));
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
        $request->validate([
            'name'=>'required',
            'description'=> 'required',
            'status' => 'required|integer'
          ]);
    
          $categories = Categories::find($id);
          $categories->name = $request->get('name');
          $categories->description = $request->get('description');
          $categories->status = $request->get('status');
          $categories->save();
    
          return redirect('/categories')->with('success', 'Categories has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();
   
        return redirect('/categories')->with('success', 'Category has been deleted Successfully');
    }
}
