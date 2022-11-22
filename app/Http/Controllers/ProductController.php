<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( request $request)
    {
        $keyword = $request->input('query');
        $items = Product::with('category')->where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return view('products.index',compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
{

        // dd($request->all());
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            // $product->image = $request->image;
            $product->description = $request->description;
            $file = $request->inputFile;

            if ($request->hasFile('inputFile')) {
                $fileExtension = $file->getClientOriginalName();
                //Lưu file vào thư mục storage/app/public/image với tên mới
                $request->file('inputFile')->storeAs('public/images', $fileExtension);
                // Gán trường image của đối tượng task với tên mới
                $product->image = $fileExtension;

            }
            $product->save();
            alert()->success('Thêm sản phẩm','thành công');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());
            alert()->error('Thêm sản phẩm','không thành công');
            return redirect()->route('product.index');
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
        $categories = Category::all();
        $product = Product::find($id);
        return view('products.edit', compact ('product','categories'));
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
            $product = Product::find($id);
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->description = $request->description;
            $file = $request->image;

            if ($request->hasFile('image')) {
                $fileExtension = $file->getClientOriginalName();
                //Lưu file vào thư mục storage/app/public/image với tên mới
                $request->file('image')->storeAs('public/images', $fileExtension);
                // Gán trường image của đối tượng task với tên mới
                $product->image = $fileExtension;
            }
            $product->save();
            alert()->success('Cập nhật','thành công');

            return redirect()->route('product.index');
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
            $product = Product::find($id);
            $product->delete();
            alert()->success('Xoá sản phẩm','thành công');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            alert()->error('Xoá sản phẩm','không thành công');

        }

    }
}
