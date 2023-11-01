<?php
namespace App\Http\Controllers\Admin;
use App\Models\Computer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminComputerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Computers - Online Store";
        $viewData["computers"] = Computer::all();
        return view('admin.computer.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            "quantity" =>
            
        ]);

        $creationData = $request->only(["name","description","price", "quantity", "ramCard", "graphicAccelerator", "hdd"]);
        Computer::create($creationData); 

        return back();
    }
}
