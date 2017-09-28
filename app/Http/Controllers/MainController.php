<?php

namespace App\Http\Controllers;


use App\Models\Rack;
use App\Models\Product;
use App\Models\Item;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class MainController extends Controller
{
    public function getAddProduct()
    {
        return view('product-add');
    }

    public function getAddRack()
    {
        return view('racks');
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
    }

    public function request()
    {
      return response()->json([
        'name' => 'Abigail',
        'state' => 'CA'
      ]);
      // $client = new Client(); //GuzzleHttp\Client
      // $result = $client->post('http://shielded-island-93691.herokuapp.com', [
      //   'json' => [
      //   'command' => 'm',
      //   'stateid' => '21',
      //   'robotid' => '2',
      //   'payload' => ['hugo', 'daniel'],
      // ]]);
      // dd(json_decode($result->getBody()));
    }
    
    public function postRequest(Request $request)
    {
      return response()->json([
        'name' => 'Abigail',
        'state' => 'CA'
      ]);
    }

    public function getProduct(Product $product)
    {
      $data['product'] = $product;
      $data['racks'] = Rack::all();
      return view('items', $data);
    }

    public function postItemChangeRack(Item $item, Request $request)
    {
      \Log::info('your momma');
      $this->validate($request, [
        'rack' => 'required',
      ]);

      if($request->get('rack') == 'none')
      {
        $item->rack()->dissociate();
        $item->save();
        return response()->json([
          "message" => "Success",
        ]);  
      }
        
      $rack = Rack::findOrFail($request->get('rack'));

      $item->rack()->associate($rack);
      $item->save();

      return response()->json([
        "message" => "Success",
      ]);  


    }
}
