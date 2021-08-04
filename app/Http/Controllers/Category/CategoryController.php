<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json( [
            'message' => 'All Category Show Here',
            'data'    => $category,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CategoryRequest $request )
    {
        $request->validated();

        $data                = $request->all();
        $data['name']        = $request->name;
        $data['description'] = $request->description;

        $category = Category::create( $data );

        return response()->json( [
            'message' => 'Category Insert Successfully',
            'data'    => $category,
        ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Category $category )
    {
        return response()->json( [
            'message' => 'Single Category Show Here',
            'data'    => $category,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( CategoryRequest $request, Category $category )
    {
        $request->validated();

        $category->update( [
            'name'        => $request->name,
            'description' => $request->description,
        ] );

        return response()->json( [
            'message' => 'Category Updated Successfully',
            'data'    => $category,
        ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category )
    {
        $category->delete();
        return response()->json( [
            'message' => 'Single Category Deleted Successfully',
            'data'    => $category,
        ] );
    }

}
