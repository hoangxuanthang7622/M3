<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Console\View\Components\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::all();//Query builder

        // dd($items->toArray());
        return view('categories.index', compact('items'));
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
    public function store(StoreCategoriesRequest $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();
            alert()->success('Thêm danh mục','thành công');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            alert()->error('Thêm danh mục','không thành công');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
  $category = Category::find($id);
    return view('categories.edit', compact ('category'));
        // return view('category.edit');

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
        try {
            $category = new Category();
            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();
            alert()->success('Cập nhật','thành công');

            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            alert()->error('Cập nhật','không thành công');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
        $category->delete();
        alert()->success('xoá danh mục','thành công');
        return redirect()->route('category.index');
        } catch (\Throwable $th) {
            alert()->error('xoá danh mục','không thành công');
            return redirect()->route('category.index');
        }
    }
    }

