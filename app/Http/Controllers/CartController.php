<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Computer;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $computers = Computer::all(); // Obtén todas las computadoras de la base de datos
    
        $cartComputers = [];
        $cartComputerData = $request->session()->get('cart_computer_data');
    
        if ($cartComputerData) {
            // Lógica para obtener computadoras del carrito
            foreach ($computers as $computer) {
                $computerID = $computer->id;
                if (in_array($computerID, $cartComputerData)) {
                    $cartComputers[$computerID] = $computer;
                }
            }
        }
    
        $viewData = [];
        $viewData['title'] = 'Carrito - Tienda en línea';
        $viewData['subtitle'] = 'Carrito de compras';
        $viewData['computers'] = $computers; // Pasa las computadoras desde la base de datos
        $viewData['cartComputers'] = $cartComputers;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request)
    {
        $computerID = $request->input('id');
        $cartComputerData = $request->session()->get('cart_computer_data', []);
    
        // Verifica si $computerID es un valor válido y existe en tu lista de computadoras.
        $computer = Computer::find($computerID);
    
        if ($computer) {
            $cartComputerData[] = $computerID;
            $request->session()->put('cart_computer_data', $cartComputerData);
            return redirect()->route('cart.index')->with('success', 'La computadora se ha añadido al carrito correctamente.');
        } else {
            return redirect()->route('cart.index')->with('error', 'La computadora no existe o no es válida.');
        }
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_computer_data');
    
        return redirect()->route('cart.index')->with('success', 'Se han eliminado todas las computadoras del carrito.');
    }
}