<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Computer;


class ComputerController extends Controller
{


    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Computers - Online Store";
        $viewData["subtitle"] =  "List of Computers";
        $viewData["computers"] = Computer::all() ;
        return view('computer.index')->with("viewData", $viewData);
    }
    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData["title"] = $computer["name"]." - Online Store";
        $viewData["subtitle"] = $computer["name"]." - Computer information";
        $viewData["computer"] = $computer;
        return view('computer.show')->with("viewData", $viewData);
    }
    
    public function create(): View
    {
        $viewData = []; // para enviar a la vista
        $viewData["title"] = "Create computer";
    
        return view('computer.create')->with("viewData", $viewData);
    }
    
    

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "quantity" => "required",
            "ramCard" => "required",
            "graphicAccelerator" => "required",
            "hdd" => "required"
        ]);
        Computer::create($request->only(["name","description" , "price", "quantity", "ramCard", "graphicAccelerator", "hdd"]));
       
        return redirect()->route('computer.create')->with('success', 'Computadora creada exitosamente');

        return back();

    }
}
