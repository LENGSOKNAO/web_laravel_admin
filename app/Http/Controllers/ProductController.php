<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showData()
    {
        $products = Products::all();
        return response()->json($products);
    }
    public function page($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }
    public function search(Request $request)
    {
        try {
            // Get the search term from the query string
            $search = $request->query('search');

            // Start building the query
            $query = Products::query();

            // If there's a search term, apply the filters
            if ($search) {
                $query->where('product_name', 'LIKE', "%{$search}%")
                      ->orWhere('product_brand', 'LIKE', "%{$search}%")
                      ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(product_category, '$[*]')) LIKE ?", ["%{$search}%"]);
                      // This searches for partial matches in the JSON array
            }

            // Only get enabled products
            $query->where('product_is_enable', true);

            // Sort the results alphabetically
            $query->orderBy('product_name', 'asc');
            $query->orderBy('product_brand', 'asc');
            $query->orderBy('product_category', 'asc');

            // Execute the query and get all matching results
            $products = $query->get();

            // Check if no products were found
            if ($products->isEmpty()) {
                return response()->json(['message' => 'No products found'], 404);
            }

            // Return the results
            return response()->json($products);
        } catch (\Exception $e) {
            // Log the error and return a generic error message
            \Log::error("Search Error: " . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
     // Show single product
     public function show(Products $product)
     {
         return view('products.show', compact('product'));
     }
    public function index() {
        $products = Products::paginate(10);
        return view('products.index', compact('products'));
    }
    public function men()
    {
        $products = Products::where(function ($query) {
            $query->where('product_category', 'like', '%men%')
                  ->orWhereJsonContains('product_category', 'men');
        })->where(function ($query) {
            $query->where('product_category', 'not like', '%women%')
                  ->whereJsonDoesntContain('product_category', 'women');
        })->paginate(10);
    
        return view('products.index', compact('products'));
    }
    public function women()
    {
        $products = Products::where('product_category', 'like', '%women%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    
        return view('products.index', compact('products'));
    }
    public function kids()
    {
        $products = Products::where('product_category', 'like', '%kids%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function shoes()
    {
        $products = Products::where('product_category', 'like', '%shoes%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function clothing()
    {
        $products = Products::where('product_category', 'like', '%clothing%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function t_shirt()
    {
        $products = Products::where('product_category', 'like', '%t_shirt%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function terry()
    {
        $products = Products::where('product_category', 'like', '%terry%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function pant()
    {
        $products = Products::where('product_category', 'like', '%pant%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function basketball_jersey()
    {
        $products = Products::where('product_category', 'like', '%basketball_jersey%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function sport()
    {
        $products = Products::where('product_category', 'like', '%sport%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function create() {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:256',
            'product_category' => 'required|array',  
            'product_category.*' => 'required|string', 
            'product_brand' => 'required|string|max:256',
            'product_sizes' => 'required|array',  
            'product_sizes.*' => 'required|string',  
            'product_description' => 'nullable|string',
            'product_price' => 'required|numeric|min:0',
            'product_qty' => 'required|integer',
            'product_color' => 'nullable|string',
            'product_link' => 'nullable|string',
            'product_is_enable' => 'boolean',
            'product_comming_soon' => 'boolean',
            'product_image' => 'required|image',
            'product_list_image.*' => 'nullable|image' 
        ]);
    
        $image = $request->file('product_image')->store('products', 'public');
        $image_list = [];
        if ($request->hasFile('product_list_image')) {
            foreach ($request->file('product_list_image') as $file) {
                $image_list[] = $file->store('products', 'public');
            }
        }
    
        Products::create([
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,  
            'product_brand' => $request->product_brand,
            'product_sizes' => $request->product_sizes,  
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_qty' => $request->product_qty,
            'product_color' => $request->product_color,
            'product_link' => $request->product_link,
            'product_is_enable' => $request->product_is_enable ?? 0,
            'product_comming_soon' => $request->product_comming_soon ?? 0,
            'product_image' => $image,
            'product_list_image' => $image_list
        ]);
    
        return redirect()->route('products.index');
    }
    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }   
    public function update(Request $request, Products $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:256',
            'product_category' => 'required|array',
            'product_category.*' => 'string',
            'product_brand' => 'required|string|max:256',
            'product_sizes' => 'required|array',
            'product_sizes.*' => 'string',
            'product_description' => 'nullable|string',
            'product_price' => 'required|numeric|min:0',
            'product_qty' => 'required|integer',
            'product_color' => 'nullable|string',
            'product_link' => 'nullable|string|url',
            'product_is_enable' => 'boolean',
            'product_comming_soon' => 'boolean',
            'product_image' => 'sometimes|image|max:2048',  
            'product_list_image.*' => 'sometimes|image|max:2048',  
            'deleted_list_images' => 'sometimes|array', // Add validation for deleted images
            'deleted_list_images.*' => 'string', // Ensure each item is a string (image path)
        ]);
    
        // Handle boolean fields
        $validated['product_is_enable'] = $request->has('product_is_enable') ?? 0;
        $validated['product_comming_soon'] = $request->has('product_comming_soon') ?? 0;
    
        // Handle main image update
        if ($request->hasFile('product_image')) {
            // Delete old image
            Storage::disk('public')->delete($product->product_image);
            $validated['product_image'] = $request->file('product_image')->store('products', 'public');
        } else {
            $validated['product_image'] = $product->product_image;  
        }
    
        // Handle list images update
        if ($request->hasFile('product_list_image')) {
            // Delete old list images
            foreach ($product->product_list_image as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
            // Upload new list images
            $image_list = [];
            foreach ($request->file('product_list_image') as $file) {
                $image_list[] = $file->store('products', 'public');
            }
            $validated['product_list_image'] = $image_list;
        } else {
            // If no new images are uploaded, check for deleted images
            if ($request->has('deleted_list_images')) {
                // Delete the images marked for deletion
                foreach ($request->input('deleted_list_images') as $deletedImage) {
                    Storage::disk('public')->delete($deletedImage);
                }
                // Filter out the deleted images from the existing list
                $validated['product_list_image'] = array_diff($product->product_list_image, $request->input('deleted_list_images'));
            } else {
                // If no images are deleted and no new images are added, keep the existing list
                $validated['product_list_image'] = $product->product_list_image;
            }
        }
    
        // Update the product with validated data
        $product->update($validated);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
      // Delete product
      public function destroy(Products $product)
      {
          $product->delete();
          return redirect()->route('products.index')->with('success', 'Product deleted successfully');
      }
}
