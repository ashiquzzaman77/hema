<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\EcommerceController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ShipingController;
use App\Http\Controllers\Backend\SittingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SmtpController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'Index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('frontend.user.user_dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'roles:user')->group(function () {

    //User Dashboard
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');

    //User Profile
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');

    //User Password
    Route::get('/user/password', [UserController::class, 'UserPassword'])->name('user.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    //User Logout
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

});

Route::middleware('auth', 'roles:user')->group(function () {

    //Order Success
    Route::get('/order-success', [CheckoutController::class, 'OrderSuccess'])->name('order.success');

});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

//AdminLogin
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


// Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {

    //Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //Admin Logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    //Admin Profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    //Admin Change Password
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    //All Vendor
    Route::get('/all/vendor', [AdminController::class, 'AllVendor'])->name('all.vendor');
    Route::get('/vendor/inactive/{id}', [AdminController::class, 'InactiveVendor'])->name('vendor.inactive');
    Route::get('/vendor/active/{id}', [AdminController::class, 'ActiveVendor'])->name('vendor.active');

    //All User
    Route::get('/all/user', [AdminController::class, 'AllUser'])->name('all.user');

});

//Vendor Login
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login');

//Vendor Register
Route::get('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');
Route::post('/vendor/register/store', [VendorController::class, 'VendorRegisterStore'])->name('vendor.register.store');

// Vendor Group Middleware
Route::middleware(['auth', 'roles:vendor'])->group(function () {

    //Vendor Dashboard
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');

    //Vendor Logout
    Route::get('/vendor/logout', [VendorController::class, 'VendorLogout'])->name('vendor.logout');

    //Vendor Profile
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');

    //Vendor Change Password
    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');

    Route::post('/vendor/password/update', [VendorController::class, 'VendorPasswordUpdate'])->name('vendor.password.update');

});

// Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {

    // Admin User All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');

    });

    //Role & Permission Section
    Route::controller(RoleController::class)->group(function () {

        //Permission
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        //Role
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');

        // add role permission

        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');

        Route::post('/role/permission/store', 'RolePermissionStore')->name('store.roles.permission');

        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');

        Route::get('/admin/edit/roles/{id}', 'AdminRolesEdit')->name('admin.edit.roles');

        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');

        Route::get('/admin/delete/roles/{id}', 'AdminRolesDelete')->name('admin.delete.roles');
    });

    //Contact Section
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/contact', 'AllContact')->name('all.contact');
        Route::get('/delete/contact/{id}', 'DeleteContact')->name('delete.contact');
    });

    //Subscribe Section
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/subscribe', 'AllSubscribe')->name('all.subscribe');
        Route::get('/delete/subscribe/{id}', 'DeleteSubscribe')->name('delete.subscribe');
    });

    //Smtp Section
    Route::controller(SmtpController::class)->group(function () {

        Route::get('/all/smtp', 'AllSmtp')->name('all.smtp');
        Route::get('/edit/smtp/{id}', 'EditSmtp')->name('edit.smtp');
        Route::post('/update/smtp', 'UpdateSmtp')->name('update.smtp');
    });

    //Report Section
    Route::controller(EcommerceController::class)->group(function () {

        Route::get('/all/report', 'AllReport')->name('all.report');

        Route::post('/search-by-date', 'SearchDate')->name('search.date');
        Route::post('/search-by-month', 'SearchMonth')->name('search.month');
        Route::post('/search-by-year', 'SearchYear')->name('search.year');

    });

    //Sitting Section
    Route::controller(SittingController::class)->group(function () {

        Route::get('/all/sitting', 'AllSitting')->name('all.sitting');
        Route::get('/edit/sitting/{id}', 'EditSitting')->name('edit.sitting');
        Route::post('/update/sitting', 'UpdateSitting')->name('update.sitting');

    });

    // Order Section
    Route::controller(OrderController::class)->group(function () {

        Route::get('/all/order', 'AllOrder')->name('all.order');
        Route::get('/admin/order_details/{order_id}', 'AdminOrderDetails');
        Route::get('/admin/order_invoice/{order_id}', 'AdminOrderInvoice');

        Route::get('/confirm/order', 'ConfirmOrder')->name('confirm.order');
        Route::get('/admin/confirm/order/{id}', 'AdminConfirmOrder')->name('admin.confirm.order');

        Route::get('/processing/order', 'PrcessingOrder')->name('processing.order');
        Route::get('/admin/processing/order/{id}', 'AdminProcessingOrder')->name('admin.processing.order');

        Route::get('/deliver/order', 'DeliverOrder')->name('deliver.order');
        Route::get('/admin/deliver/order/{id}', 'AdminDeliverOrder')->name('admin.deliver.order');

        Route::get('/admin/return/order', 'AdminReturnOrder')->name('admin.return.order');
        Route::get('/admin/return-order/accept/{order_id}', 'AdminReturnOrderAccept');

    });

    //Review Section
    Route::controller(ReviewController::class)->group(function () {

        Route::get('/all/review', 'AllReview')->name('all.review');
        Route::get('/review-inactive/{id}', 'ReviewInactive')->name('review.inactive');
        Route::get('/review-active/{id}', 'ReviewActive')->name('review.active');
        Route::get('/delete-review/{id}', 'DeleteReview')->name('delete.review');

    });

    //Shipping Section
    Route::controller(ShipingController::class)->group(function () {

        Route::get('/all/division', 'AllDivision')->name('all.division');
        Route::post('/store/division', 'StoreDivision')->name('store.division');
        Route::get('/edit/division/{id}', 'EditDivision')->name('edit.division');
        Route::post('/update/division', 'UpdateDivision')->name('update.division');
        Route::get('/delete/division/{id}', 'DeleteDivision')->name('delete.division');

        Route::get('/all/district', 'AllDistrict')->name('all.district');
        Route::post('/store/district', 'StoreDistrict')->name('store.district');
        Route::get('/edit/district/{id}', 'EditDistrict')->name('edit.district');
        Route::post('/update/district', 'UpdateDistrict')->name('update.district');
        Route::get('/delete/district/{id}', 'DeleteDistrict')->name('delete.district');

        Route::get('/district/ajax/{division_id}', 'GetDistrict');

        Route::get('/all/state', 'AllState')->name('all.state');
        Route::post('/store/state', 'StoreState')->name('store.state');
        Route::get('/edit/state/{id}', 'EditState')->name('edit.state');
        Route::post('/update/state', 'UpdateState')->name('update.state');
        Route::get('/delete/state/{id}', 'DeleteState')->name('delete.state');

    });

    //Coupon Section
    Route::controller(CouponController::class)->group(function () {

        Route::get('/all/coupon', 'AllCoupon')->name('all.coupon');
        Route::get('/add/coupon', 'AddCoupon')->name('add.coupon');
        Route::post('/store/coupon', 'StoreCoupon')->name('store.coupon');
        Route::get('/edit/coupon/{id}', 'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon', 'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/coupon/{id}', 'DeleteCoupon')->name('delete.coupon');

    });

    // Product Section
    Route::controller(ProductController::class)->group(function () {

        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');

        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');

        Route::post('/update/user/stauts', 'UpdateUserStatus')->name('update.user.stauts');

        // Stock
        Route::get('/all/product/stock', 'AllProductStock')->name('all.product.stock');

    });

    // Testimonial Section
    Route::controller(TestimonialController::class)->group(function () {

        Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial');
        Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
        Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
        Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
        Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');

    });

    // Brand Section
    Route::controller(BrandController::class)->group(function () {

        Route::get('/all/brand', 'AllBrand')->name('all.brand');
        Route::get('/add/brand', 'AddBrand')->name('add.brand');
        Route::post('/store/brand', 'StoreBrand')->name('store.brand');
        Route::get('/edit/brand/{id}', 'EditBrand')->name('edit.brand');
        Route::post('/update/brand', 'UpdateBrand')->name('update.brand');
        Route::get('/delete/brand/{id}', 'DeleteBrand')->name('delete.brand');

    });

    // SubCategory Section
    Route::controller(SubCategoryController::class)->group(function () {

        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');

    });

    // Category Section
    Route::controller(CategoryController::class)->group(function () {

        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');

    });

    // Slider Section
    Route::controller(SliderController::class)->group(function () {

        Route::get('/all/slider', 'AllSlider')->name('all.slider');
        Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');

    });

    // Banner Section
    Route::controller(BannerController::class)->group(function () {

        Route::get('/all/banner', 'AllBanner')->name('all.banner');
        Route::get('/edit/banner/{id}', 'EditBanner')->name('edit.banner');
        Route::post('/update/banner', 'UpdateBanner')->name('update.banner');

    });

});

// Vendor Group Middleware
Route::middleware(['auth', 'roles:vendor'])->group(function () {

    // Product Section
    Route::controller(VendorProductController::class)->group(function () {

        Route::get('/all/vendor/product', 'AllVendorProduct')->name('all.vendor.product');
        Route::get('/add/vendor/product', 'AddVendorProduct')->name('add.vendor.product');
        Route::post('/store/vendor/product', 'StoreVendorProduct')->name('store.vendor.product');
        Route::get('/edit/vendor/product/{id}', 'EditVendorProduct')->name('edit.vendor.product');
        Route::post('/update/vendor/product', 'UpdateVendorProduct')->name('update.vendor.product');
        Route::get('/delete/vendor/product/{id}', 'DeleteVendorProduct')->name('delete.vendor.product');

        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');

    });

    // Order Section
    Route::controller(VendorOrderController::class)->group(function () {

        Route::get('/all/vendor/order', 'AllVendorOrder')->name('all.vendor.order');
        Route::get('/vendor/vendor_order_details/{order_id}', 'VendorOrderDetails');

    });

});

// Frontend Section

Route::controller(IndexController::class)->group(function () {

    // Category Details
    Route::get('/category-wise-product/{id}/{slug}', 'CategoryWiseProduct');

    // SubCategory Details
    Route::get('/subcategory-wise-product/{id}/{slug}', 'SubCategoryWiseProduct');

    // Product Details
    Route::get('/product-details/{id}/{slug}', 'ProductDetails');

    // Brand Wise Product
    Route::get('/brand-wise-product/{id}', 'BrandWiseProduct')->name('brand.wise.product');

    //Search
    Route::post('/product-search', 'ProductSearch')->name('product.search');
    Route::post('/search-product', 'SearchProduct');

    //Review
    Route::post('/review', 'ProductReview')->name('user.review');

    //Track Order
    Route::get('/track-order', 'TrackOrder')->name('track.order');
    Route::post('/track-order/search', 'TrackOrderSearch')->name('order.tracking.search');

    //Contact
    Route::get('/contact', 'Contact')->name('contact');
    Route::post('/contact-store', 'ContactStore')->name('contact.store');

    //Subscribe
    Route::post('/subscribe-store', 'SubscribeStore')->name('store.subscribe');

    //Product
    Route::get('/product-all', 'Product')->name('product');

});

// Cart Controller

Route::controller(CartController::class)->group(function () {

    //Cart Details
    Route::post('/dcart/data/store/{id}', 'AddToCartDetails');

    // Get Data from mini Cart
    Route::get('/product/mini/cart', 'AddMiniCart');
    Route::get('/minicart/product/remove/{rowId}', 'RemoveMiniCart');

    Route::get('/mycart', 'MyCart')->name('mycart');
    Route::get('/get-cart-product', 'GetCartProduct');
    Route::get('/cart-remove/{rowId}', 'CartRemove');

    Route::get('/cart-decrement/{rowId}', 'CartDecrement');
    Route::get('/cart-increment/{rowId}', 'CartIncrement');

    Route::post('/coupon-apply', 'CouponApply');

    Route::get('/coupon-calculation', 'CouponCalculation');
    Route::get('/coupon-remove', 'CouponRemove');

    Route::get('/checkout', 'CheckoutCreate')->name('checkout');

    Route::get('/district-get/ajax/{division_id}', 'GetCheckDistrict');
    Route::get('/state-get/ajax/{district_id}', 'StateGetAjax');

});

// CheckoutController
Route::controller(CheckoutController::class)->group(function () {

    Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');
    Route::post('/cash/order', 'CashOrder')->name('cash.order');

});

//WishList Section
Route::controller(WishListController::class)->group(function () {

    Route::post('/add-to-wishlist/{product_id}', 'AddToWishList');

});

//WishList
Route::middleware(['auth', 'roles:user'])->group(function () {

    // Wishlist All Route
    Route::controller(WishListController::class)->group(function () {

        Route::get('/wishlist', 'AllWishlist')->name('wishlist');

        Route::get('/get-wishlist-product', 'GetWishlistProduct');
        Route::get('/wishlist-remove/{id}', 'WishlistRemove');
    });

    // User Order Section
    Route::controller(UserOrderController::class)->group(function () {

        Route::get('/user/order', 'UserOrder')->name('user.order');
        Route::get('/user/order_details/{order_id}', 'UserOrderDetails');
        Route::get('/user/order_invoice/{order_id}', 'UserOrderInvoice');
        Route::post('/return/order/{order_id}', 'ReturnOrder')->name('return.order');
        Route::get('/return/order/page', 'ReturnOrderPage')->name('return.order.page');

    });

});

// SSLCOMMERZ Start

// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
