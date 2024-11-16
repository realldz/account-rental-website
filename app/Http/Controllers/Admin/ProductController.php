<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductEditRequest;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CrudTrait;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    use CrudTrait, JsonResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = Product::orderByDesc('id');
        foreach (['id', 'status', 'category_id'] as $field) {
            $request->whenFilled($field, function ($value) use ($query, $field) {
                $query->where($field, $value);
            });
        }
        foreach (['name', 'email'] as $field) {
            $request->whenFilled($field, function ($value) use ($query, $field) {
                $query->where($field, 'like', "%{$value}%");
            });
        }
        $products = $query->paginate(15);
        $categories = Category::where('status', 1)->get();
        return view('admin.pages.product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.product.info', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        if (!$request->validated()) {
            return redirect()->back()->withErrors($request->errors());
        }
        $product_create = $request->validated();
        
        $cycles = $product_create['price'];
        unset($product_create['price']);
        $product = Product::create($product_create);
        $product->productCycle()->createMany($cycles);
        
        return redirect()->back()->with('successMsg','Product Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        // dd($product->productCycle);
        return view('admin.pages.product.info', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductEditRequest $request, Product $product): RedirectResponse
    {
        if (!$request->validated()) {
            return redirect()->back()->withErrors($request->errors());
        }

        $product_update = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $path = $request->file('image')->store('public/images');
            $product_update['image'] = str_replace('public/', 'storage/', $path);
        }
        
        $cycles = $product_update['price'];
        unset($product_update['price']);

        try {
            // Cập nhật thông tin product trước
            $product->update($product_update);

            // Lấy danh sách cycle hiện có trong database
            $existing_cycles = $product->productCycle()->get()->keyBy(function ($cycle) {
                return $cycle->cycle_unit . '_' . $cycle->cycle_value;
            });
            
            foreach ($cycles as $cycle_data) {
                // Xác định cycle dựa trên `cycle_unit` và `cycle_value`
                $key = $cycle_data['cycle_unit'] . '_' . $cycle_data['cycle_value'];
                
                if ($existing_cycles->has($key)) {
                    // Nếu cycle đã tồn tại, ta chỉ cần cập nhật `cycle_price`
                    $existing_cycle = $existing_cycles->get($key);
                    $existing_cycle->update([
                        'cycle_price' => $cycle_data['cycle_price']
                    ]);
                    // Xóa khỏi collection đã xử lý
                    $existing_cycles->forget($key);
                } else {
                    // Nếu cycle không tồn tại trong DB, thêm mới
                    $product->productCycle()->create($cycle_data);
                }
            }
            
            // Xóa các cycle còn lại trong $existing_cycles vì không có trong request
            foreach ($existing_cycles as $cycle_to_delete) {
                $cycle_to_delete->delete();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->back()->with('successMsg', 'Updated product successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        return $this->destroyT($product);
    }
}
