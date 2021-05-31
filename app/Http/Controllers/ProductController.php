<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        
        $product = Product::create($request->all());
        return response()->json(['success' => true, 'data' => $product], 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json(['success' => true, 'data' => $product], 200);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(null, 204);
    }


    public function search(Request $request)
    {
        $searchData = [
            'marque' => $request->input('marque')
        ];
        
        $product = Product::orderBy('created_at', 'desc');
        if ($searchData['marque'] != null) $product = $product->where('marque', '=', $searchData['marque']);
    
        return response()->json(['success' => true, 'data' => $product], 201);
    }
}
