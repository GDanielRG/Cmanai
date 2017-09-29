<?php

namespace App\Http\Controllers;


use App\Models\Rack;
use App\Models\Product;
use App\Models\Robot;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;

class MainController extends Controller
{
    public function getAddProduct()
    {
        return view('product-add');
    }

    public function getAddRack()
    {
        $data['racks'] = Rack::all();
        return view('racks', $data);
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

      return redirect('/racks');
    }

    public function postDeleteRack(Rack $rack)
    {
      if($rack->items->count()>0)
        return back();

      $rack->delete();
      $rack->save();

      return view('racks');
    }

    public function getAddRobot()
    {
        $data['robots'] = Robot::all();
        return view('robots', $data);
    }

    public function postAddRobot(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'posX' => 'required|integer',
        'posY' => 'required|integer',
      ]);

      $rack = Robot::create([
        "name" => $request->get('name'),
        "posX" => $request->get('posX'),
        "posY" => $request->get('posY'),
      ]);

      return redirect('/robots');
    }

    public function postDeleteRobot(Robot $robot)
    {
      if($robot->rack)
        return back();

      $robot->delete();
      $robot->save();

      return view('robots');
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

      return redirect('/inventory');

    }

    public function getOrders()
    {
        return view('orders');
    }

    public function getStatus()
    {
      $robots = Robot::all();
      $data['robots'] = $robots;
      return view('status', $data);
    }

    public function postStatus(Order $order)
    {
      $order = Order::all();
      $data['orders'] = $orders;
      return view('status', $data);
    }

    public function getInventory()
    {
      $products = Product::all();
      $data['products'] = $products;
      return view('inventory', $data);
    }

    public function getGrid()
    {
      $racks = Rack::whereNull('robot_id')->get();
      foreach($racks as $rack)
      {
        $data['racks'][] = [$rack->posX, $rack->posY];

      }
      $carriedRacks = Rack::whereNotNull('robot_id')->get();
      $robotsCarrying = new Collection();
      foreach ($carriedRacks as $carriedRack) {
        $data['robots_carrying'][] = [$carriedRack->robot->posX,$carriedRack->robot->posY];
      }
      $robots = Robot::all();
      foreach($robots as $robot)
      {
        if(empty($robot->rack))
          $data['robots'][]=[$robot->posX,$robot->posY];
      }

      $data['height'] = 7;
      $data['width'] = 8;
      $data['park_spots'] = [[5,0],[5,7]];
      $data['entry_points'] = [[0,3],[0,4]];
      $data['exit_points'] = [[6,1],[6,6]];


      return response()->json($data);
      // return response()->json([
      //   'height' => 7,
      //   'width' => 8,
      //   'racks' => [[0,1],[0,2],[0,5],[0,6],[1,0],[2,0],[3,0],[4,0],[1,7],[2,7],[3,7],[4,7],[6,2],[6,3],[6,4],[6,5],[2,2],[2,3],[2,4],[2,5],[3,2],[3,5],[4,2],[4,3],[4,4],[4,5]],
      //   'park_spots' => [[5,0],[5,7]],
      //   'entry_points' => [[0,4],[0,4]],
      //   'exit_points'=> [[6,1],[6,6]],
      //   'robots' => [[5,0], [5,7]],
      //   'robots_carrying' => [[1,1]],
      // ]);
    }

    public function getGetItem(Item $item)
    {
      $busyRobots = Order::where('completed', false)->get()->pluck('robot_id')->toArray();
      $availableRobot = Robot::whereNotIn($busyRobots)->first();
      // $path =


    }


public function find_path($graph, $start, $end, $path=[])
{
    $path = array_merge($path,  [$start]);
    if ($start == $end)
        return $path;
    if (!array_key_exists($start, $graph))
        return null;
    $shortest = null;
    foreach ($graph[$start] as $node) {
        if(!in_array($node, $path))
        {
            $newPath = $this->find_path($graph,$node,$end,$path);
            if ($newPath) {
              if(!$shortest || sizeof($newPath) < sizeof($shortest))
                $shortest = $newPath;
            }
        }
    }
    return $shortest;
}

// def find_shortest_path(graph, start, end, path=[]):
// path = path + [start]
// if start == end:
//     return path
// if not graph.has_key(start):
//     return None
// shortest = None
// for node in graph[start]:
//     if node not in path:
//         newpath = find_shortest_path(graph, node, end, path)
//         if newpath:
//             if not shortest or len(newpath) < len(shortest):
//                 shortest = newpath
// return shortest



    public function getRoute($a, $b)
    {
      // $client = new Client(); //GuzzleHttp\Client
      // $result = $client->post('http://shielded-island-93691.herokuapp.com', [
      //   'json' => [
      //   'command' => 'm',
      //   'stateid' => '1',
      //   'robotid' => '1',
      //   'payload' => ['01 11 12 13 14 15 16 26 36 37'],
      // ]]);
      // dd(json_decode($result->getBody()));

      // $graph2 = ['A'=> ['B', 'C'],
      //   'B'=> ['C', 'A'],
      //   'C'=> ['D'],
      //   'D'=> ['C'],
      //   'E'=> ['F'],
      //   'F'=> ['C']];

      $graph = ["0,1" => ["1,1"],
      "1,1" => ["0,1","1,0","2,1"],
      "1,0" => ["1,1"],
      "2,0" => ["2,1"],
      "2,1" => ["2,0","2,2","3,1"],
      "2,2" => ["2,1"],
      "3,1" => ["3,0","3,2","4,1"],
      "3,0" => ["3,1"],
      "3,2" => ["3,1"],
      "4,1" => ["4,0","5,1"],
      "4,0" => ["4,1"],
      "5,1" => ["5,0","6,1","5,2"],
      "5,0" => ["5,1"],
      "6,1" => ["5,1"],
      "1,2" => ["0,2","1,1"],
      "0,2" => ["1,2"],
      "5,2" => ["4,2","6,2","5,3"],
      "4,2" => ["5,2"],
      "6,2" => ["5,2"],
      "1,3" => ["0,3","2,3","1,2"],
      "0,3" => ["1,3"],
      "2,3" => ["1,3"],
      "1,4" => ["1,3","0,4","2,4"],
      "2,4" => ["1,4"],
      "0,4" => ["1,4"],
      "1,5" => ["0,5","1,4"],
      "0,5" => ["1,5"],
      "1,6" => ["0,6","1,5","1,7"],
      "0,6" => ["1,6"],
      "1,7" => ["1,6"],
      "2,6" => ["1,6","2,5","2,7"],
      "2,5" => ["2,6"],
      "2,7" => ["2,6"],
      "3,6" => ["2,6","3,5","3,7"],
      "3,5" => ["3,6"],
      "3,7" => ["3,6"],
      "4,6" => ["3,6","4,7"],
      "4,7" => ["4,6"],
      "5,6" => ["4,6","5,7","6,6"],
      "5,7" => ["5,6"],
      "6,6" => ["5,6"],
      "5,5" => ["4,5","6,5","5,6"],
      "4,5" => ["5,5"],
      "6,5" => ["5,5"],
      "5,4" => ["4,4","6,4","5,5"],
      "4,4" => ["5,4"],
      "6,4" => ["5,4"],
      "5,3" => ["4,3","6,3","5,4"],
      "4,3" => ["5,3"],
      "6,3" => ["5,3"]];
      return $this->find_path($graph, $a, $b);
    }


    public function postNotify(Request $request)
    {
      \Log::info($request->all());
      switch($request->get('command'))
      {
        case 'p':
          $robot = Robot::find($request->get('robotid'));
          $robot->posX = $request->get('payload')[0];
          $robot->posY = $request->get('payload')[1];
          $robot->save();
          break;
      }
    }

    public function test()
    {
      $client = new Client(); //GuzzleHttp\Client
      $result = $client->post('http://shielded-island-93691.herokuapp.com', [
        'json' => [
        'command' => 'm',
        'stateid' => '1',
        'robotid' => '1',
        'payload' => ['01 11 12 13 14 15 16 26 36 37'],
      ]]);
      dd(json_decode($result->getBody()));
    }

    public function getProduct(Product $product)
    {
      $data['product'] = $product;
      $data['racks'] = Rack::orderBy('name')->get();
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
