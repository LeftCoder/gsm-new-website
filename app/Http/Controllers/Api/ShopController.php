<?php

namespace App\Http\Controllers\Api;

use App\Shop;
use Illuminate\Http\Request;

class ShopController
{
    public function index(Request $request)
    {
        $sortRules = $request->sort;
        $limit = $request->per_page;
        
        list($field, $dir) = explode('|', $sortRules);

        $shops = Shop::selectRaw('id, shop_name, city_name, published, created_at')
            ->orderBy($field, $dir);

        if($request->has('filter')) {
            $shops->where('shop_name', 'like', '%'.$request->filter.'%')
                ->orWhere('city_name', 'like', '%'.$request->filter.'%');
        }

        return $shops->paginate($limit);
    }

    public function allShops(Request $request) {
        $shops = Shop::select('*')
            ->where("published", "=", 1);

        if($request->has('filter')) {
            $shops->where('city_name', 'like', '%'.$request->filter.'%');
        }
        
        return $shops->get();
    }
}