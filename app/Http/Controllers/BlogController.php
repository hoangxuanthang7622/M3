<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Http\Requests\StoreBlogPost;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Blog::with('category')->get();//Query builder

        // dd($items->toArray());
        return view('blog.index', compact(['items']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('blog.create', compact(['categories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
    //     $validated = $request->validate([
    //         'name' => 'required|unique:blogs|max:20',
    //         'description' => 'required',
    //         'category_id' => 'required'
    //     ],
    //     [
    //         'name.required' => 'Vui lòng không được để trống',
    //         'name.unique'   => 'Vui lòng không được trùng dữ liệu',
    //         'name.max'      => 'Vui lòng không nhập quá :max kí tự',
    //         'description.required' => 'Vui lòng không được để trống',
    //         'category_id.required' => 'Vui lòng không được để trống',

    //     ]
    // );
        $blog = new Blog();
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;

        $blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blog.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit', compact ('blog'));
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
        $blog = new Blog();
        $blog = Blog::find($id);
        $blog->name = $request->name;
        $blog->description = $request->description;

        $blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
