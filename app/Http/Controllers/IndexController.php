<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Index
    public function Index()
    {
        return view('frontend.index');
    }

    //Category Wise Product
    public function CategoryWiseProduct(Request $request, $id, $slug)
    {
        // $products = Product::where('status',1)->where('category_id', $id)->paginate(12);

        $subcats = SubCategory::where('category_id', $id)->latest()->get();

        $breadcat = Category::where('id', $id)->first();

        $brands = Brand::latest()->get();

        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }

        if ($id == null) {
            return view('errors.404');
        } else {
            if ($sort == 'priceLowtoHigh') {
                $products = Product::where(['status' => 1, 'category_id' => $id])->orderBy('selling_price', 'ASC')->paginate(12);
            } elseif ($sort == 'priceHightoLow') {
                $products = Product::where(['status' => 1, 'category_id' => $id])->orderBy('selling_price', 'ASC')->paginate(12);
            } elseif ($sort == 'nameAtoZ') {
                $products = Product::where(['status' => 1, 'category_id' => $id])->orderBy('product_name', 'ASC')->paginate(12);
            } elseif ($sort == 'nameZtoA') {
                $products = Product::where(['status' => 1, 'category_id' => $id])->orderBy('product_name', 'ASC')->paginate(12);
            } else {
                $products = Product::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->paginate(12);
            }
        }

        $subCatId = $id;
        $subslug = $slug;

        $route = 'category-wise-product';

        return view('frontend.page.category.category_wise_product', compact('products', 'subcats', 'breadcat', 'brands', 'subCatId', 'route', 'sort', 'subslug'));
    }

    //SubCategory Wise Product
    public function SubCategoryWiseProduct($id, $slug)
    {
        $products = Product::where('subcategory_id', $id)->paginate(12);

        $breadsubcat = SubCategory::where('id', $id)->first();

        return view('frontend.page.subcategory.subcategory_wise_product', compact('products', 'breadsubcat'));
    }

    //Brand Wise Product
    public function BrandWiseProduct($id)
    {
        $products = Product::where('brand_id', $id)->paginate(12);

        $breadbrand = Brand::where('id', $id)->first();

        return view('frontend.page.brand.brand_wise_product', compact('products', 'breadbrand'));
    }

    //Product Details
    public function ProductDetails($id, $slug)
    {
        $product = Product::find($id);

        $color = $product->color;
        $explodecolor = explode(',', $color);

        $size = $product->size;
        $explodesize = explode(',', $size);

        //Related product
        $cat_id = $product->subcategory_id;
        $relativeProduct = Product::where('subcategory_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'ASC')->limit(4)->get();

        return view('frontend.page.product.product_details', compact('product', 'explodecolor', 'explodesize', 'relativeProduct'));
    }

    //ProductSearch
    public function ProductSearch(Request $request)
    {

        $request->validate(['search' => "required"]);

        $item = $request->search;

        $categories = Category::orderBy('category_name', 'ASC')->get();

        $products = Product::where('product_name', 'LIKE', "%$item%")
            ->orWhere('short_descp', "LIKE", "%$item%")
            ->get();

        return view('frontend.page.search.product_search', compact('products', 'item', 'categories'));

    }

    //SearchProduct
    public function SearchProduct(Request $request)
    {

        $request->validate(['search' => "required"]);

        $item = $request->search;

        $products = Product::where('product_name', 'LIKE', "%$item%")->select('product_name', 'product_slug', 'product_image', 'selling_price', 'id')->limit(8)->get();

        return view('frontend.page.search.search_product', compact('products'));

    }

    //ProductReview
    public function ProductReview(Request $request)
    {

        $product_id = $request->pid;

        Review::insert([

            'product_id' => $product_id,
            'name' => $request->name,
            'email' => $request->email,
            'review_title' => $request->review_title,
            'rating' => $request->rating,
            'message' => $request->message,
            'created_at' => now(),

        ]);

        notify()->success('Review Send Successfully');

        return redirect()->back();

    }

    //Track Order
    public function TrackOrder()
    {
        return view('frontend.page.track.track_order');
    }

    //Track Order Search
    public function TrackOrderSearch(Request $request)
    {
        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {

            $orderitems = OrderItem::where('order_id', $track->id)->get();

            return view('frontend.page.track.track_order_search', compact('track', 'orderitems'));
        } else {

            notify()->error('Invalid');
            return redirect()->back();
        }
    }

    //Contact
    public function Contact()
    {
        return view('frontend.page.contact.contact');
    }

    //Contact
    public function ContactStore(Request $request)
    {
        Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),

        ]);

        notify()->success('Message Send Successfully');

        return redirect()->back();
    }

    //Subscribe Store
    public function SubscribeStore(Request $request)
    {
        Subscribe::insert([

            'email' => $request->email,
            'created_at' => now(),

        ]);

        notify()->success('Subscribe Send Successfully');

        return redirect()->back();
    }

    //Product
    public function Product()
    {
        $products = Product::orderBy('id', 'DESC')->where('status', 1)->latest()->paginate(20);

        $brands = Brand::latest()->get();

        return view('frontend.page.product.product', compact('products', 'brands'));
    }

}
