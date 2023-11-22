<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Supplier;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index(){

        $products = Product::with(['tags','category'])->when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })
        ->paginate(\request()->limit_by ?? 15);
        return view('admin.product.index',compact('products'));
    }


    public function create(){
        $tags = Tag::all();
        $attributes = Attribute::all();
        $categories = Category::active()->get();
        $suppliers = Supplier::active()->get();
        $brands = Brand::active()->get();

        return view('admin.product.create',compact('tags','attributes','categories','suppliers','brands'));

    }


    public function store_image(Request $request){
        $file = $request->file('file');
        $filename = uploadImage($file ,'product_images',$request->file->getClientOriginalName());

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }



    public function store(Request $request){




        $request->validate([
            'category' => ['required', Rule::exists('categories','id')],
            'tags' => ['required'],
            'supplier' => ['required', Rule::exists('suppliers','id')],
            'brand' => ['required', Rule::exists('brands','id')],
            'status' => ['required','in:active,draft,archived'],
            'product_en' => ['required', 'string' ,'min:3', 'max:253', 'unique:categories,name'],
            'product_ar' => ['required', 'string' ,'min:3', 'max:253', 'unique:categories,name'],
            'description_en' => ['required', 'min:10'],
            'description_ar' => ['required', 'min:10'],
            'price_type' => ['required','in:price_list,on_demande'],
            'price' => ['nullable','numeric', 'between:0,99999999.99'],
            'sku' => ['required','min:3',Rule::unique('products','sku')],
            'quantity' => ['nullable','numeric'],
            'terms' => ['nullable','string'],
            //'code' => ['required','min:3',Rule::unique('products','code')],
            'delivery' => ['nullable','numeric'],
            'avatar' => ['nullable','mimes:jpg,jpeg,png'],
            'options' => [
                    '*.attributes'=> ['required', Rule::exists('attributes','id')],
                    '*.variants'=> [
                                                        '*.variant' => ['required', 'string'],
                                                        ],
                ],
            'images' => ['required', 'array' ,'min:1' ],
            'featured' => ['required','in:0,1'],
        ]);



        $file_name = null ;

        if ($photo = $request->file('avatar')) {
            $file_name = uploadImage($photo, 'product_images', $request->product_en);
        }

        $translation = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation  =  array_merge ($translation, [$localeCode => $request->input("product_".$localeCode)] );
        }

        $translation1 = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation1  =  array_merge ($translation1, [$localeCode => $request->input("description_".$localeCode)] );
        }

        $supplier = Supplier::findOrFail($request->supplier);
        $brand = Brand::findOrFail($request->brand);

        $code = $brand->code.'-'.$request->sku.'-'.$supplier->code;
        $product_code = Product::where('code','=',$code)->first();
        if ($product_code) {
            toastr()->warning('The code exist', 'Opps', ['timeOut' => 7000]);
            return redirect()->back();
        }
        $product = Product::create([
            'brand_id' => $request->brand,
            'supplier_id' => $request->supplier,
            'category_id' => $request->category,
            'name' => $translation,
            'description' => $translation1,
            'slug' => Str::slug($code),
            'price_type' => $request->price_type,
            'price' => $request->price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'code' => $code,
            'terms' => $request->terms,
            'delivery' => $request->delivery,
            'status' => $request->status,
            'image' => $file_name,
            'featured' => $request->featured,
        ]);

        $tags = json_decode($request->post('tags'));

            $tag_ids = [];
            $saved_tags = Tag::all();

            foreach ($tags as $item ) {

                $slug = Str::slug($item->value);
                $tag = $saved_tags->where('slug', $slug)->first();

                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item->value,
                        'slug' => $slug,
                    ]);
                }
                $tag_ids[] = $tag->id;
            };
            $product->tags()->sync($tag_ids);

            if ($request->has('images') && count($request->images) > 0) {
                foreach ($request->images as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'name' => $image,
                    ]);
                }
            }

            if ($request->options && !in_array(null,array_column($request->options,'attributes'))) {

                foreach ($request->options as $option) {
                    $product->variants()->syncWithoutDetaching($option['attributes']);

                    foreach ($option['variants'] as $value=>$item) {
                        ProductAttribute::create([
                            'product_id' => $product->id,
                            'attribute_id' => $option['attributes'],
                            'value' => $item['variant'],
                        ]);
                    }

                }
            }

            toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
            return redirect()->back();
    }


    public function edit($id){
        $product = Product::findOrFail($id);
        $tags = Tag::all();
        $attributes = Attribute::all();
        $categories = Category::active()->get();
        $suppliers = Supplier::active()->get();
        $brands = Brand::active()->get();
        //return $product->attributes ;
        return view('admin.product.edit',compact('product','tags','attributes','categories','suppliers','brands'));
    }

    public function update(Request $request, $id){

        //return $request;
        $request->validate([
            'category' => ['required', Rule::exists('categories','id')],
            'tags' => ['required'],
            'supplier' => ['required', Rule::exists('suppliers','id')],
            'brand' => ['required', Rule::exists('brands','id')],
            'status' => ['required','in:active,draft,archived'],
            'product_en' => ['required', 'string' ,'min:3', 'max:253', 'unique:categories,name'],
            'product_ar' => ['required', 'string' ,'min:3', 'max:253', 'unique:categories,name'],
            'description_en' => ['required', 'min:10'],
            'description_ar' => ['required', 'min:10'],
            'price_type' => ['required','in:price_list,on_demande'],
            'price' => ['nullable','numeric', 'between:0,99999999.99'],
            'sku' => ['required','min:3',Rule::unique('products','code')->ignore($id)],
            'quantity' => ['nullable','numeric'],
            'terms' => ['nullable','string'],
            //'code' => ['required','min:3',Rule::unique('products','code')],
            'delivery' => ['nullable','numeric'],
            'avatar' => ['nullable','mimes:jpg,jpeg,png'],
            'options' => [
                    '*.attributes'=> ['required', Rule::exists('attributes','id')],
                    '*.variants'=> [
                                                        '*.variant' => ['required', 'string'],
                                                        ],
                ],
            'images' => ['nullable', 'array' ,'min:1' ],
            'featured' => ['required','in:0,1'],
            'approved' => ['required','in:0,1'],
        ]);

        $product = Product::findOrFail($id);

        if ($photo = $request->file('avatar')) {
            UnlinkImage('product_images',$product->image,$product);
            $file_name = uploadImage($photo,'product_images',$request->product_en);
            $product->update([
                'image' => $file_name,
            ]);
        }
        $translation = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation  =  array_merge ($translation, [$localeCode => $request->input("product_".$localeCode)] );
        }

        $translation1 = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation1  =  array_merge ($translation1, [$localeCode => $request->input("description_".$localeCode)] );
        }

        $supplier = Supplier::findOrFail($request->supplier);
        $brand = Brand::findOrFail($request->brand);

        $code = $brand->code.'-'.$request->sku.'-'.$supplier->code;

        $product->update([
            'brand_id' => $request->brand,
            'supplier_id' => $request->supplier,
            'category_id' => $request->category,
            'name' => $translation,
            'description' => $translation1,
            'slug' => Str::slug($code),
            'price_type' => $request->price_type,
            'price' => $request->price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'code' => $code,
            'terms' => $request->terms,
            'delivery' => $request->delivery,
            'status' => $request->status,
            'approved' => $request->approved,
            'featured' => $request->featured,
        ]);

        $tags = json_decode($request->post('tags'));

            $tag_ids = [];
            $saved_tags = Tag::all();

            foreach ($tags as $item ) {

                $slug = Str::slug($item->value);
                $tag = $saved_tags->where('slug', $slug)->first();

                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item->value,
                        'slug' => $slug,
                    ]);
                }
                $tag_ids[] = $tag->id;
            };
            $product->tags()->sync($tag_ids);

            if ($request->has('images') && count($request->images) > 0) {
                foreach ($request->images as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'name' => $image,
                    ]);
                }
            }

            if ($request->options && !in_array(null,array_column($request->options,'attributes'))) {
                foreach ($product->attributes as $attribute) {

                    $attribute->delete();
                }

                foreach ($request->options as $option) {
                    $product->variants()->syncWithoutDetaching($option['attributes']);
                    foreach ($option['variants'] as $value=>$item) {
                        ProductAttribute::create([
                            'product_id' => $product->id,
                            'attribute_id' => $option['attributes'],
                            'value' => $item['variant'],
                        ]);
                    }
                }
            }

        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }

    public function delete_image($id){
        $image = ProductImage::findOrFail($id);

        $image->delete();
        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);

        return redirect()->back();
    }


    public function show(Product $product){

        //return $product->variants;
        return view('admin.product.view',compact('product'));
    }



    public function approve($id){

        $product = Product::findOrFail($id);

        if ($product->approved == 0) {
            $product->update([
                'approved' => 1
            ]);
        }else{
            $product->update([
                'approved' => 0
            ]);
        }

        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function feature($id){

        $product = Product::findOrFail($id);

        if ($product->featured == 0) {
            $product->update([
                'featured' => 1
            ]);
        }else{
            $product->update([
                'featured' => 0
            ]);
        }
        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function activate($id){

        $product = Product::findOrFail($id);

        if ($product->status == 'active') {
            $product->update([
                'status' => 'draft',
            ]);

            toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
            return redirect()->back();
        }

        if ($product->status == 'draft') {
            $product->update([
                'status' => 'archived',
            ]);
            toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
            return redirect()->back();
        };

        if ($product->status == 'archived') {
            $product->update([
                'status' => 'active',
            ]);
            toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
            return redirect()->back();
        };


    }


}
