<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::paginate(10);

        return view('admin.shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Shop::create($this->validateShop());
    
        return redirect('/shops')->with('flash', 'Nowy punkt na mapie został utworzony.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        if(request()->expectsJson()) {
            $shop->togglePublished()->save();
            return response(['status'=> 'changed']);
        }
    
        $shop->update($this->validateShop());
    
        return redirect('/shops')->with('flash', 'Dane zostały zaktualizowane.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        return response(['status' => 'Shop deleted']);
    }

    protected function validateShop() {
        return request()->validate([
          'shop_name' => 'required|min:3|max:100',
          'city_name' => 'required|min:3|max:100',
          'postal_code' => 'required|max:6|postalcode',
          'street' => 'required|min:3|max:100',
          'lat' => 'required|max:9|coordinate',
          'lng' => 'required|max:9|coordinate',
          'email' => 'required|email',
          'telephone' => 'required|max:11|telephone'
        ]);
    }
}
