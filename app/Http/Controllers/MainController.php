<?php

namespace App\Http\Controllers;


use App\Models\Rack;
use App\Models\Product;
use App\Models\Item;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getAddProduct()
    {
        return view('product-add');
    }

    public function getAddRack()
    {
        return view('rack-add');
    }

    public function postAddRack(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'posX' => 'required|integer',
        'posY' => 'required|integer',
      ]);

      $rack = Rack::create([
        "name" => $request->get('name'),
        "posX" => $request->get('posX'),
        "posY" => $request->get('posY'),
      ]);

        return $rack;
      return view('racks');
    }

    public function postDeleteRack(Rack $rack)
    {
      if($rack->items->count()>0)
        return back();

      $rack->delete();
      $rack->save();

      return view('racks');
    }

    public function getChangeRack(Item $item)
    {
      $items = Item::all();
      $data['items'] = $items;
      return view('/items', $data);
    }

    public function postChangeRack(Item $item)
    {
      $item->save(new Rack(id));
    }

    public function postAddProduct(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'bar_code' => 'required',
        'quantity' => 'required|integer'
      ]);

      $product = Product::create([
        "name" => $request->get('name'),
        "bar_code" => $request->get('bar_code'),
        "quantity" => $request->get('quantity'),
      ]);

      for ($i=0; $i < $request->get('quantity'); $i++) {
        $product->items()->save(new Item());
      }

      $product->load('items');
      return $product;

      // $product = Product::where('barCode', $request->get('barCode'))->first();

      // if(!$product){
      //   $product = Product::create([
      //     'name' => $request->get('name'),
      //     'barCode' => $request->get('barCode')
      //   );
      // }

      // $items = new Collection();

      // for ($i=0; $i <$request->get('quantity') ; $i++) {
      //   $items->push(new Item([
      //     'rack_id' => $request->get('rack_id'),
      //   ]))
      // }

      // $product->items()->saveMany($items);

      return view('/inventory');

    }

    public function getOrders()
    {
        return view('orders');
    }

    public function getInventory()
    {
      $products = Product::all();
      $data['products'] = $products;
      return view('inventory', $data);
      /*
      foreach ($products as $product) {
        # code...product->name
        product->items->count()
        */
      // }
    }
}
