<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ComputerController extends Controller
{
    public static $computers = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Computers - Online Store";
        $viewData["subtitle"] =  "List of Computers";
        $viewData["computers"] = ComputerController::$computers;
        return view('computer.index')->with("viewData", $viewData);
    }
    public function show(string $id): View
    {
        $viewData = [];
        $computer = ComputerController::$computers[$id-1];
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
    
    

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required"
        ]);
        dd($request->all());
        //here will be the code to call the model and save it to the database
    }
}
