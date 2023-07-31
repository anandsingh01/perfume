<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\LoginController;



Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
//Route::get('/who-we-are', [App\Http\Controllers\HomeController::class, 'who_we_are']);
Route::get('/about-sab', [App\Http\Controllers\HomeController::class, 'who_we_are']);
Route::get('/our-mission-vision', [App\Http\Controllers\HomeController::class, 'ourmissionvision']);
Route::get('our-work/projects', [App\Http\Controllers\HomeController::class, 'projects']);
Route::get('projects/{url}', [App\Http\Controllers\HomeController::class, 'projects_details']);
Route::get('blogs/{url}', [App\Http\Controllers\HomeController::class, 'blogs_details']);
Route::get('metals/{url}', [App\Http\Controllers\HomeController::class, 'metal_details']);
Route::get('our-work/collaborations', [App\Http\Controllers\HomeController::class, 'collaborations']);
Route::get('annual-report', [App\Http\Controllers\HomeController::class, 'annual_report']);
Route::get('leadership-and-board', [App\Http\Controllers\HomeController::class, 'ourteam']);
Route::get('/pay', [HomeController::class, 'pay']);
Route::get('support-us', [App\Http\Controllers\HomeController::class, 'supportus']);
Route::get('contact-us', [App\Http\Controllers\HomeController::class, 'contactus']);
Route::post('save-contact-us', [App\Http\Controllers\HomeController::class, 'savecontactus']);
Route::post('support-us/pay', [App\Http\Controllers\HomeController::class, 'razorpay']);
Route::post('payment', [HomeController::class, 'payment']);
Route::get('payment-response', [HomeController::class, 'payment_response']);
Route::get('privacy-policy', function (){
    return view('web.privacy-policy');
});


Route::get('offers/{url}', [HomeController::class, 'sustainability_overview']);
Route::get('social-impact/{url}', [HomeController::class, 'social_impact']);
//Route::get('offers/stewardship', [HomeController::class, 'sustainability_stewardship']);
Route::get('service/{url}', [HomeController::class, 'get_service']);

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/my-profile', [App\Http\Controllers\AdminController::class, 'my_profile'])->name('admin.myprofile');
    Route::post('/update-profile', [App\Http\Controllers\AdminController::class, 'update_profile'])->name('admin.update_profile');


    Route::get('/all-banner', [App\Http\Controllers\BannerController::class, 'index']);
    Route::get('/add-banner', [App\Http\Controllers\BannerController::class, 'add']);
    Route::post('/save-banner', [App\Http\Controllers\BannerController::class, 'save']);
    Route::get('/update-banner-Status', [App\Http\Controllers\BannerController::class, 'status']);
    Route::get('/delete-banner/{id}', [App\Http\Controllers\BannerController::class, 'destroy']);
    Route::get('/edit-banner/{id}', [App\Http\Controllers\BannerController::class, 'edit']);
    Route::post('/update-banner/', [App\Http\Controllers\BannerController::class, 'update']);



    Route::get('categories',[CategoryController::class,'index']);
    Route::post('create-category',[CategoryController::class,'create'])->name('create.category');
    Route::get('change-status',[CategoryController::class,'change_status'])->name('change.status.category');
    Route::get('delete/category/{id}',[CategoryController::class,'destroy'])->name('delete.category');
    Route::get('edit-category/{id}',[CategoryController::class,'edit'])->name('edit.category');
    Route::post('update-category',[CategoryController::class,'update'])->name('update.category');
    Route::post('uploadCategoryContent',[CategoryController::class,'uploadCategoryContent'])->name('uploadContent');

    Route::get('subcategories',[SubcategoryController::class,'index']);
    Route::post('create-subcategories',[SubcategoryController::class,'create'])->name('create.category');
    Route::get('change-status-subcategory',[SubcategoryController::class,'change_status'])->name('change.status.category');
    Route::get('delete/subcategories/{id}',[SubcategoryController::class,'destroy'])->name('delete.category');
    Route::get('edit-subcategories/{id}',[SubcategoryController::class,'edit'])->name('edit.category');
    Route::post('update-subcategories',[SubcategoryController::class,'update'])->name('update.category');
    Route::post('uploadSubCategoryContent',[SubcategoryController::class,'uploadSubCategoryContent'])->name('uploadSubCategoryContent');

    Route::get('post-format',[BlogController::class,'index']);
    Route::get('add-posts',[BlogController::class,'create']);
    Route::post('create-post',[BlogController::class,'store']);
    Route::post('update-post',[BlogController::class,'update']);
    Route::get('all-post',[BlogController::class,'all_posts']);
    Route::get('edit-blog/{id}',[BlogController::class,'edit']);

    Route::get('ad-spaces',[AdController::class,'index']);
    Route::post('update-ads',[AdController::class,'update']);

    Route::get('delete/blog/{id}',[BlogController::class,'destroy']);

    Route::get('add-polls',[\App\Http\Controllers\PollController::class,'create']);
    Route::post('create-poll',[\App\Http\Controllers\PollController::class,'store']);
    Route::get('all-polls',[\App\Http\Controllers\PollController::class,'index']);
    Route::get('delete/polls/{id}',[\App\Http\Controllers\PollController::class,'destroy']);

    Route::get('common-settings',[CommonController::class,'common_settings']);
    Route::post('update-common',[CommonController::class,'update_common']);

    // common-settings

    Route::get('/our-team', [App\Http\Controllers\TeamController::class, 'index']);
    Route::get('/add-teams', [App\Http\Controllers\TeamController::class, 'add']);
    Route::post('/save-team', [App\Http\Controllers\TeamController::class, 'save']);
    Route::get('/update-teams-Status', [App\Http\Controllers\TeamController::class, 'status']);
    Route::get('/delete-teams/{id}', [App\Http\Controllers\TeamController::class, 'destroy']);
    Route::get('/edit-teams/{id}', [App\Http\Controllers\TeamController::class, 'edit']);
    Route::post('/update-team/', [App\Http\Controllers\TeamController::class, 'update']);


    Route::get('/our-role', [App\Http\Controllers\RoleController::class, 'index']);
    Route::get('/add-role', [App\Http\Controllers\RoleController::class, 'add']);
    Route::post('/save-role', [App\Http\Controllers\RoleController::class, 'save']);
    Route::get('/update-role-Status', [App\Http\Controllers\RoleController::class, 'status']);
    Route::get('/delete-role/{id}', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('/edit-role/{id}', [App\Http\Controllers\RoleController::class, 'edit']);
    Route::post('/update-role/', [App\Http\Controllers\RoleController::class, 'update']);

    Route::get('/all-metals', [App\Http\Controllers\MetalController::class, 'index']);
    Route::get('/add-metals', [App\Http\Controllers\MetalController::class, 'add']);
    Route::post('/save-metals', [App\Http\Controllers\MetalController::class, 'save']);
    Route::get('/update-metals-Status', [App\Http\Controllers\MetalController::class, 'status']);
    Route::get('/delete-metals/{id}', [App\Http\Controllers\MetalController::class, 'destroy']);
    Route::get('/edit-metals/{id}', [App\Http\Controllers\MetalController::class, 'edit']);
    Route::post('/update-metals/', [App\Http\Controllers\MetalController::class, 'update']);
    Route::get('change-status-metals',[App\Http\Controllers\MetalController::class,'change_status']);
    Route::get('change-status-show_on_homet',[App\Http\Controllers\MetalController::class,'show_on_homet_status']);


    Route::get('/all-projects', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/add-project', [App\Http\Controllers\ProjectController::class, 'add']);
    Route::post('/save-project', [App\Http\Controllers\ProjectController::class, 'save']);
    Route::get('/update-project-Status', [App\Http\Controllers\ProjectController::class, 'status']);
    Route::get('/delete-project/{id}', [App\Http\Controllers\ProjectController::class, 'destroy']);
    Route::get('/edit-project/{id}', [App\Http\Controllers\ProjectController::class, 'edit']);
    Route::post('/update-project/', [App\Http\Controllers\ProjectController::class, 'update']);
    Route::get('change-status-project',[App\Http\Controllers\ProjectController::class,'change_status']);
    Route::get('change-status-show_on_homet',[App\Http\Controllers\ProjectController::class,'show_on_homet_status']);



    Route::get('/all-projects-details', [App\Http\Controllers\ProjectDetailsController::class, 'index']);
    Route::get('/add-project-details', [App\Http\Controllers\ProjectDetailsController::class, 'add']);
    Route::post('/save-project-details', [App\Http\Controllers\ProjectDetailsController::class, 'save']);
    Route::get('/update-project-Status-details', [App\Http\Controllers\ProjectDetailsController::class, 'status']);
    Route::get('/delete-project-details/{id}', [App\Http\Controllers\ProjectDetailsController::class, 'destroy']);
    Route::get('/edit-project-details/{id}', [App\Http\Controllers\ProjectDetailsController::class, 'edit']);
    Route::post('/update-project-details/', [App\Http\Controllers\ProjectDetailsController::class, 'update']);
    Route::get('change-status-project-details',[App\Http\Controllers\ProjectDetailsController::class,'change_status']);
    Route::get('change-status-show_on_homet-details',[App\Http\Controllers\ProjectDetailsController::class,'show_on_homet_status']);




    Route::get('/all-services', [App\Http\Controllers\ServiceController::class, 'index']);
    Route::get('/add-services', [App\Http\Controllers\ServiceController::class, 'add']);
    Route::post('/save-services', [App\Http\Controllers\ServiceController::class, 'save']);
    Route::get('/update-services-Status', [App\Http\Controllers\ServiceController::class, 'status']);
    Route::get('/delete-services/{id}', [App\Http\Controllers\ServiceController::class, 'destroy']);
    Route::get('/edit-service/{id}', [App\Http\Controllers\ServiceController::class, 'edit']);
    Route::post('/update-services', [App\Http\Controllers\ServiceController::class, 'update']);
    Route::get('change-status-services',[App\Http\Controllers\ServiceController::class,'change_status']);
    Route::get('change-status-services-show_on_homet',[App\Http\Controllers\ServiceController::class,'show_on_homet_status']);

    Route::get('/founders-note', [App\Http\Controllers\TeamController::class, 'founders_note']);
    Route::post('/update-founder-note', [App\Http\Controllers\TeamController::class, 'updatefoundernote']);



    Route::get('/all-collaborations', [App\Http\Controllers\CollaborationController::class, 'index']);
    Route::get('/add-collaborations', [App\Http\Controllers\CollaborationController::class, 'add']);
    Route::post('/save-collaborations', [App\Http\Controllers\CollaborationController::class, 'save']);
    Route::get('/update-collaborations-Status', [App\Http\Controllers\CollaborationController::class, 'status']);
    Route::get('/delete-collaborations/{id}', [App\Http\Controllers\CollaborationController::class, 'destroy']);
    Route::get('/edit-collaborations/{id}', [App\Http\Controllers\CollaborationController::class, 'edit']);
    Route::post('/update-collaborations/', [App\Http\Controllers\CollaborationController::class, 'update']);
    Route::get('change-collaborations-status',[App\Http\Controllers\CollaborationController::class,'change_status']);
    Route::get('change-collaborations-show_on_homet',[App\Http\Controllers\CollaborationController::class,'show_on_homet_status']);

    Route::get('/all-annual-reports', [App\Http\Controllers\AnnualReportController::class, 'index']);
    Route::get('/add-annual-reports', [App\Http\Controllers\AnnualReportController::class, 'add']);
    Route::post('/save-annual-reports', [App\Http\Controllers\AnnualReportController::class, 'save']);
    Route::get('/update-annual-reports-Status', [App\Http\Controllers\AnnualReportController::class, 'status']);
    Route::get('/delete-annual-reports/{id}', [App\Http\Controllers\AnnualReportController::class, 'destroy']);
    Route::get('/edit-annual-reports/{id}', [App\Http\Controllers\AnnualReportController::class, 'edit']);
    Route::post('/update-annual-reports/', [App\Http\Controllers\AnnualReportController::class, 'update']);
    Route::get('change-annual-reports-status',[App\Http\Controllers\AnnualReportController::class,'change_status']);
    Route::get('change-annual-reports-show_on_homet',[App\Http\Controllers\AnnualReportController::class,'show_on_homet_status']);


    Route::get('/who-we-are', [App\Http\Controllers\AboutController::class, 'who_we_are']);
    Route::post('update-aboutus',[App\Http\Controllers\AboutController::class,'updatewhoweare']);

    Route::get('/our-mission', [App\Http\Controllers\AboutController::class, 'our_mission']);
    Route::post('/update-our-mission', [App\Http\Controllers\AboutController::class, 'updateour_mission']);

    Route::get('/core-compentancy', [App\Http\Controllers\AboutController::class, 'core_compentancy']);
    Route::post('/update-core-compentancy', [App\Http\Controllers\AboutController::class, 'update_core_compentancy']);

    Route::get('/offers-{url}', [App\Http\Controllers\Sustainability::class, 'overview']);
    Route::post('/update-offers-{url}', [App\Http\Controllers\Sustainability::class, 'update_overview']);

    Route::get('/social-impacts', [App\Http\Controllers\SocialImpact::class, 'overview']);
    Route::post('/update-social-impacts', [App\Http\Controllers\SocialImpact::class, 'update_overview']);

//    Route::get('/offers-approach', [App\Http\Controllers\Sustainability::class, 'approach']);
//    Route::post('/update-offers-approach', [App\Http\Controllers\Sustainability::class, 'update_approach']);
//
//    Route::get('/offers-stewardship', [App\Http\Controllers\Sustainability::class, 'stewardship']);
//    Route::post('/update-offers-stewardship', [App\Http\Controllers\Sustainability::class, 'update_stewardship']);


    Route::get('offers', [OfferController::class, 'index'])->name('offers.index');
    Route::post('offers/create', [OfferController::class, 'store'])->name('offers.create');
    Route::get('edit-offer/{id}', [OfferController::class, 'edit'])->name('offers.edit');
    Route::post('update-offer', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('offers/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');
    Route::get('change-offer-status',[App\Http\Controllers\OfferController::class,'change_status']);
       Route::get('/delete/offer/{id}', [App\Http\Controllers\OfferController::class, 'destroy']);


//    Products Attributes
    Route::get('products/all-attributes', [App\Http\Controllers\AttributesController::class,'index']);
    Route::get('products/add-attributes', [App\Http\Controllers\AttributesController::class,'create']);
    Route::post('products/save-attributes', [App\Http\Controllers\AttributesController::class,'store']);
    Route::get('products/edit-attributes/{id}', [App\Http\Controllers\AttributesController::class,'edit']);
    Route::post('products/update-attributes/{id}', [App\Http\Controllers\AttributesController::class,'update']);
    Route::get('products/update-attributes-Status', [App\Http\Controllers\AttributesController::class,'changeAttributesstatus']);
    Route::get('products/delete-attributes/{id}', [App\Http\Controllers\AttributesController::class,'destroy']);
    Route::get('products/delete-attributes-values/{id}', [App\Http\Controllers\AttributesController::class,'destroyAttrValue']);

    Route::get('products/attributes/options/{id}', [App\Http\Controllers\AttributesController::class,'viewOptionsValues']);
    Route::get('products/add-attributes-values', [App\Http\Controllers\AttributesController::class,'addOptionsValues']);
    Route::post('products/attributes/save-attributes-values/{id}', [App\Http\Controllers\AttributesController::class,'saveAttributesValues']);
    Route::get('products/attributes/edit-attribute-value/{id}', [App\Http\Controllers\AttributesController::class,'editAttributesValues']);
    Route::post('products/attributes/update-attributes-values/{id}', [App\Http\Controllers\AttributesController::class,'updateAttributesValues']);

// Products Units
    Route::get('products/all-units', [App\Http\Controllers\UnitsController::class,'index']);
    Route::get('products/add-units', [App\Http\Controllers\UnitsController::class,'create']);
    Route::post('products/save-units', [App\Http\Controllers\UnitsController::class,'store']);
    Route::get('products/edit-units/{id}', [App\Http\Controllers\UnitsController::class,'edit']);
    Route::post('products/update-units/{id}', [App\Http\Controllers\UnitsController::class,'update']);
    Route::get('products/update-units-Status', [App\Http\Controllers\UnitsController::class,'changeuUnitstatus']);
    Route::get('products/delete-units/{id}', [App\Http\Controllers\UnitsController::class,'destroy']);

    // Products # ADD, UPDATE ,DELETE...
    Route::get('/all-products', [App\Http\Controllers\ProductsController::class,'index']);
    Route::get('/add-products', [App\Http\Controllers\ProductsController::class,'create']);
    Route::post('/save-products', [App\Http\Controllers\ProductsController::class,'storee']);
    Route::get('/edit-products/{id}', [App\Http\Controllers\ProductsController::class,'edit']);
    Route::post('/update-products/{id}', [App\Http\Controllers\ProductsController::class,'update']);
    Route::get('/update-products-Status', [App\Http\Controllers\ProductsController::class,'changeProductstatus']);
    Route::get('/delete-products/{id}', [App\Http\Controllers\ProductsController::class,'destroy']);
    Route::get('/update-products-Status', [App\Http\Controllers\ProductsController::class,'changeProductStatus']);
    Route::get('/getcategoriesBySectionOnProduct', [App\Http\Controllers\ProductsController::class,'getcategoriesBySectionOnProduct']);
    Route::get('/getSubcategoriesByCategoriesOnProduct', [App\Http\Controllers\ProductsController::class,'getSubcategoriesByCategoriesOnProduct']);

    Route::get('/products/add/attribute/display/{id}', [App\Http\Controllers\ProductsController::class,'addProductAttrOptions']);
    Route::get('/products/all/attribute/display/{id}', [App\Http\Controllers\ProductsController::class,'getAllProductAttrOptions']);
    Route::post('/products/save/productSizeAttribute/{id}', [App\Http\Controllers\ProductsController::class,'productSizeAttribute']);
    Route::post('/products/save/productAttribute/{id}', [App\Http\Controllers\ProductsController::class,'saveProductAdditionalAttributes']);
    Route::get('/products/getAttrValueFromOptions', [App\Http\Controllers\ProductsController::class,'getAttrValueFromOptions']);
    Route::get('product/attribute/default-edit-value/{id}', [App\Http\Controllers\ProductsController::class,'editProductSizeAttrValue']);
    Route::post('/products/update/productSizeAttribute/{id}', [App\Http\Controllers\ProductsController::class,'updateproductSizeAttribute']);
    Route::get('product/attribute/additional-edit-value/{id}', [App\Http\Controllers\ProductsController::class,'editAdditionalProductAttrValue']);

    Route::post('/products/update/productSizeAttribute/{id}', [App\Http\Controllers\ProductsController::class,'updateproductSizeAttribute']);
    Route::get('product/attribute/additional-edit-value/{id}', [App\Http\Controllers\ProductsController::class,'editAdditionalProductAttrValue']);

});
