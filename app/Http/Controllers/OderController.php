<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Order::all();//Query builder

        // dd($items->toArray());
        return view('orders.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users = User::all();
        return view('orders.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->order_day = $request->order_day;


            $order->save();
            alert()->success('Thêm đơn hàng','thành công');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            alert()->error('Thêm đơn hàng','không thành công');
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
        $user = User::all();
        $order = Order::find($id);
        return view('orders.edit', compact ('user','order'));
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
            $order = Order::find($id);
            $order->user_id = $request->user_id;
            $order->order_day = $request->order_day;

            $order->save();
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
            $order = Order::find($id);
            $order->delete();
            alert()->success('Xoá sản phẩm','thành công');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            alert()->error('Xoá sản phẩm','không thành công');

        }

    }
}
