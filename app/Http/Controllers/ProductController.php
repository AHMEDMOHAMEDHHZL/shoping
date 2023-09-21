<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('allproduct')->with('error', 'المنتج غير موجود.');
        }

        $product->delete();

        return redirect()->route('allproduct')->with('success', 'تم حذف المنتج بنجاح.');
    }

    public function create()
    {
        return view('dashboard.addproduct');
    }
}
