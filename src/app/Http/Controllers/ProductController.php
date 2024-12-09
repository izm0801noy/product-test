<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6); 
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('seasons')->findOrFail($id); 
        return view('products.show', compact('product'));
    }

        public function create()
    {
        $seasons = Season::all(); 
        return view('products.create', compact('seasons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0|max:10000',
            'description' => 'required|string|max:120',
            'image' => 'required|image|mimes:jpeg,png',
            'seasons' => 'required|array',
        ]);

        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->image = $request->file('image')->store('public/images');
        $product->save();

        $product->seasons()->attach($validated['seasons']); 
        return redirect()->route('products.index')->with('success', '商品を登録しました');
    }

    public function edit($id)
    {
        $product = Product::with('seasons')->findOrFail($id); 
        $seasons = Season::all();
        return view('products.edit', compact('product', 'seasons'));
    }

       public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0|max:10000',
            'description' => 'required|string|max:120',
            'image' => 'nullable|image|mimes:jpeg,png',
            'seasons' => 'required|array',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('public/images'); 
        }

        $product->save();
        $product->seasons()->sync($validated['seasons']); 

        return redirect()->route('products.index')->with('success', '商品を更新しました');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->seasons()->detach(); 
        $product->delete(); 

        return redirect()->route('products.index')->with('success', '商品を削除しました');
    }

        public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(6);
        return view('products.index', compact('products'));
    }
}
