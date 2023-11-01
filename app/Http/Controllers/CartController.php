<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Computer;
use App\Models\Order;
use App\Models\Item; 


class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $computersInCart = [];
        $computersInSession = $request->session()->get("computers");

        if ($computersInSession) {
            $computersInCart = Computer::findMany(array_keys($computersInSession));
            $total = Computer::sumPricesByQuantities($computersInCart, $computersInSession);
        }

        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData["total"] = $total;
        $viewData["computers"] = $computersInCart;

        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        $computers = $request->session()->get("computers");
        $computers[$id] = $request->input('quantity');
        $request->session()->put('computers', $computers);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('computers');
        return back();
    }
    public function purchase(Request $request)
{
    $computersInSession = $request->session()->get("computers");

    if ($computersInSession) {
        $userId = Auth::user()->getId();
        $order = new Order();
        $order->setUserId($userId);
        $order->setTotal(0);
        $order->save();

        $total = 0;
        $computersInCart = Computer::findMany(array_keys($computersInSession));

        foreach ($computersInCart as $computer) {
            $quantity = $computersInSession[$computer->getId()];
            $item = new Item();
            $item->setQuantity($quantity);
            $item->setPrice($computer->getPrice());
            $item->setComputerId($computer->getId());
            $item->setOrderId($order->getId());
            $item->save();
            $total = $total + ($computer->getPrice() * $quantity);
        }

        $order->setTotal($total);
        $order->save();

        $newBalance = Auth::user()->getBalance() - $total;
        Auth::user()->setBalance($newBalance);
        Auth::user()->save();

        $request->session()->forget('computers');

        $viewData = [];
        $viewData["title"] = "Purchase - Online Store";
        $viewData["subtitle"] = "Purchase Status";
        $viewData["order"] = $order;

        return view('cart.purchase')->with("viewData", $viewData);
    } else {
        return redirect()->route('cart.index');
    }
    }

}

