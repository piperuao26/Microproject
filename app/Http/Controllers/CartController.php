<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $computers = []; // This simulates the database
        $computers[121] = ['name' => 'Gaming PC', 'price' => '1000'];
        $computers[11] = ['name' => 'Workstation', 'price' => '2000'];

        $cartComputers = [];
        $cartComputerData = $request->session()->get('cart_computer_data'); // We get the computers stored in session
        if ($cartComputerData) {
            foreach ($computers as $key => $computer) {
                if (in_array($key, array_keys($cartComputerData))) {
                    $cartComputers[$key] = $computer;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['computers'] = $computers;
        $viewData['cartComputers'] = $cartComputers;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartComputerData = $request->session()->get('cart_computer_data');
        $cartComputerData[$id] = $id;
        $request->session()->put('cart_computer_data', $cartComputerData);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_computer_data');

        return back();
    }
}

