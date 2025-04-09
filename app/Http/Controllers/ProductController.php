<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ProductModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = ProductModel::all();
        $products = ProductModel::with('category')->get();
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // ✅ xử lý file
            'price' => 'required|numeric|min:0',
            'inventory' => 'required|integer|min:0',
            'sort_description' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Lưu ảnh vào storage/public/uploads
        $imgPath = $request->file('img')->store('uploads', 'public');

        // Tạo sản phẩm mới
        $product = ProductModel::create([
            'name' => $request->name,
            'img' => '/storage/'. $imgPath, // ✅ lưu đường dẫn tương đối
            'price' => $request->price,
            'inventory' => $request->inventory,
            'sort_description' => $request->sort_description,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'category_id' => $request->category_id
        ]);

        return response()->json([
            'message' => 'Thêm sản phẩm thành công',
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = ProductModel::where('id', $id)->firstOrFail();
        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = ProductModel::findOrFail($id);

        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'inventory' => 'required|integer|min:0',
            'sort_description' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'category_id' => 'required|exists:categories,id'
        ]);
    
        // Nếu có ảnh mới thì lưu lại
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('uploads', 'public');
            $product->img = '/storage/' . $imgPath;
        }
    
        // Cập nhật các trường còn lại
        $product->name = $request->name;
        $product->price = $request->price;
        $product->inventory = $request->inventory;
        $product->sort_description = $request->sort_description;
        $product->facebook = $request->facebook;
        $product->linkedin = $request->linkedin;
        $product->category_id = $request->category_id;
    
        $product->save();
    
        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công',
            'product' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = ProductModel::findOrFail($id);

    $product->delete();

    return response()->json([
        'message' => 'Xóa sản phẩm thành công'
    ], 200);
    }
}
