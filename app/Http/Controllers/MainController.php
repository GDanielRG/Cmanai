<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getAddProduct()
    {
        return view('product-add');
    }

    public function postAddProduct()
    {
      $product = Product::where('barCode', $request->get('barCode'))->first();

      if(!$product){
        $product = Product::create([
          'name' => $request->get('name'),
          'barCode' => $request->get('barCode'),
        )
      }

      $items = new Collection();

      for ($i=0; $i <$request->get('quantity') ; $i++) {
        $items->push(new Item([
          'rack_id' => $request->get('rack_id'),
        ]))
      }

      $product->items()->saveMany($items);

      return view('/inventory');

    }

    public function getOrders()
    {
        return view('orders');
    }

    public function getInventory()
    {
      $products = Product::where('name', $request->get('%producto%'));
      $data['products'] = $products;
      return view('inventory', $data);
      /*
      foreach ($products as $product) {
        # code...product->name
        product->items->count()
        */
      }
    }
}
