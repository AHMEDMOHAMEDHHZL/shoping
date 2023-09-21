<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Product;

use App\Http\Controllers\MessageController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

Route::get('/', function () {
    return view('auth.login'); // هنا يتم توجيه المستخدم إلى صفحة تسجيل الدخول عند بدء المشروع.
});
Route::get('/login', function () {
    return view('auth.login'); // هنا يتم توجيه المستخدم إلى صفحة تسجيل الدخول عند بدء المشروع.
});
// أضف بقية روتات التطبيق هنا...


Route::group(['middleware' => ['auth', 'checkLogin']], function () {

    Route::get('/home', function () {
        $result1 = DB::table('categories')->get('*');
        $result2 = DB::table('offerssections')->get('*');

        return view('welcome', ['categories' => $result1], ['offer' => $result2]);
    })->name('home');


    Route::get('/dashboard', function () {
        $ruselt = DB::table('messages')->get('*');
        // صفحة الداشبورد للمشرفين
        return view('dashboard.layouts.layout',['messages'=>$ruselt]);
    })->name('dashboard');
});

    Route::get('/product', function (Request $request) {
        $categoryId = $request->input('category_id');
        $categoryName = '';
        // إذا تم تحديد معرف القسم، قم بجلب المنتجات المتعلقة بهذا القسم
        if ($categoryId) {
            $products = DB::table('products')
                ->where('category_id', $categoryId)
                ->get('*');
            $categoryName = DB::table('categories')
                ->where('id', $categoryId)
                ->value('name');
        } else {
            // إذا لم يتم تحديد معرف القسم، قم بجلب جميع المنتجات
            $products = DB::table('products')->get('*');
        }
        return view('product', ['products' => $products, 'categoryName' => $categoryName]);
    });

    Route::get('/admin', function () {
        return view('/layouts.admin');
    });
    Route::get('/cart', function () {
        // احتسب المبلغ الإجمالي
        $cartItems = DB::table('cart')->get('*'); // استرجع جميع العناصر في السلة
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        // إرسال القيمة الإجمالية إلى صفحة العرض (cart.blade.php)
        return view('cart', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    });

    Route::get('/checkout', function () {
        // استخراج الإجمالي من الرابط
        $totalPrice = request('total');
        $result = DB::table('cart')->get('*');
        // قم بالقيام بأي عمليات إضافية هنا
        foreach ($result as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        // قم بإرسال البيانات إلى صفحة الخروج (checkout.blade.php)
        return view('checkout', ['totalPrice' => $totalPrice], ['cart' => $result]);
    });

    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/single-offer', function () {
        return view('single-offer');
    });


    Route::get('/single-product/{id}', function ($id) {
        // استخدم معرف المنتج لجلب بيانات المنتج المحدد
        $result = DB::table('products')->where('id', $id)->first('*');
        // يجب أن يتم تحديد القسم الذي ينتمي إليه المنتج هنا
        $categoryId = $result->category_id;
        // جلب اسم القسم
        $categoryName = DB::table('categories')
            ->where('id', $categoryId)
            ->value('name');

        // جلب المنتجات المتعلقة بنفس القسم
        $relatedProducts = DB::table('products')
            ->where('category_id', $categoryId)
            ->get('*');

        $otherProducts = DB::table('products')
            ->where('category_id', $categoryId)
            ->where('id', '!=', $id) // استبعاد المنتج الحالي

            ->get('*');

        return view('single-product', ['singleproduct' => $result, 'relatedProducts' => $relatedProducts, 'categoryName' => $categoryName, 'otherProducts' => $otherProducts]);
    });

    //ارسال بينات المنتجات الي السلة 




   Route::post('/add-to-cart', function (Request $request) {
    // استلام البيانات من الاستمارة
    $productId = $request->input('product_id');
    $productName = $request->input('product_name');
    $productPrice = $request->input('product_price');
    $productImage = $request->input('product_image');

    // التحقق مما إذا كان المستخدم قد سجل الدخول
    if (auth()->check()) {

        // المستخدم مسجل الدخول، لذا يمكنك الوصول إلى خاصية `id` لمتغير `productId`.
        $productId = $request->input('product_id');

        // إدخال البيانات إلى جدول السلة
        DB::table('cart')->insert([
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1,
            // أو يمكنك استخدام أي قيمة افتراضية أخرى للكمية
            'user_id' => auth()->user()->id,
            'image' => $productImage,
        ]);

        // تمرير رسالة نجاح إلى العرض
        return redirect('/product')->with('success', 'تمت إضافة المنتج بنجاح');

    } else {

        // المستخدم غير مسجل الدخول، لذا أعد توجيهه إلى صفحة تسجيل الدخول.
        return redirect('/login');
    }
});

    
    

    Route::post('/add-to-cart2', function (Request $request) {
        // استلام البيانات من الاستمارة
        $singleproductId = $request->input('singleproduct_id');
        $singleproductName = $request->input('singleproduct_name');
        $singleproductPrice = $request->input('singleproduct_price');
        $singleproductImage = $request->input('singleproduct_image');

        // التحقق مما إذا كان المستخدم قد سجل الدخول
        if (auth()->check()) {

            // المستخدم مسجل الدخول، لذا يمكنك الوصول إلى خاصية `id` لمتغير `productId`.
            $singleproductId = $request->input('singleproductId');

            // إدخال البيانات إلى جدول السلة
            DB::table('cart')->insert([
                'id' => $singleproductId,
                'name' => $singleproductName,
                'price' => $singleproductPrice,
                'quantity' => 1,
                // أو يمكنك استخدام أي قيمة افتراضية أخرى للكمية
                'user_id' => auth()->user()->id,
                'image' => $singleproductImage,
            ]);

            // يمكنك تنفيذ أي إجراءات أخرى مثل تحديث عرض الصفحة أو توجيه المستخدم إلى صفحة السلة هنا

            // عادةً، بعد إضافة المنتج إلى السلة، يتم توجيه المستخدم إلى صفحة السلة
            return redirect('/product')->with('success', 'تمت إضافة المنتج بنجاح');
        } else {

            // المستخدم غير مسجل الدخول، لذا أعد توجيهه إلى صفحة تسجيل الدخول.
            return redirect('/login');
        }
    });





    Route::post('/add-to-cart3', function (Request $request) {
        // استلام البيانات من الاستمارة
        $productId = $request->input('product_id');
        $productName = $request->input('product_name');
        $productPrice = $request->input('product_price');
        $productImage = $request->input('product_image');

        // التحقق مما إذا كان المستخدم قد سجل الدخول
        if (auth()->check()) {

            // المستخدم مسجل الدخول، لذا يمكنك الوصول إلى خاصية `id` لمتغير `productId`.
            $productId = $request->input('product_id');

            // إدخال البيانات إلى جدول السلة
            DB::table('cart')->insert([
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1,
                // أو يمكنك استخدام أي قيمة افتراضية أخرى للكمية
                'user_id' => auth()->user()->id,
                'image' => $productImage,
            ]);

            // يمكنك تنفيذ أي إجراءات أخرى مثل تحديث عرض الصفحة أو توجيه المستخدم إلى صفحة السلة هنا
            return redirect('/offers')->with('success', 'تمت إضافة المنتج بنجاح');

            // عادةً، بعد إضافة المنتج إلى السلة، يتم توجيه المستخدم إلى صفحة السلة

        } else {

            // المستخدم غير مسجل الدخول، لذا أعد توجيهه إلى صفحة تسجيل الدخول.
            return redirect('/login');
        }
    });




    Route::get('/remove/{cartId}/', function ($cartId) {
        // قم بتنفيذ الكود الخاص بحذف العنصر من جدول السلة باستخدام $cartId
        // على سبيل المثال:
        DB::table('cart')->where('id', $cartId)->delete();

        return redirect('/cart');
    });

    Route::post('/update-cart-quantity/{cartId}', function (Request $request, $cartId) {
        // استلام البيانات من الاستمارة
        $new_quantity = $request->input('new_quantity');
        // تحديث كمية المنتج في السلة باستخدام الـ $cartId
        DB::table('cart')->where('id', $cartId)->update([

            'quantity' => $new_quantity
        ]);

        // يمكنك تنفيذ أي إجراءات أخرى مثل تحديث عرض الصفحة أو توجيه المستخدم إلى صفحة السلة هنا

        // عادةً، بعد تحديث كمية المنتج في السلة، يتم توجيه المستخدم إلى صفحة السلة
        return redirect('/cart');
    });



    Route::post('/add-order', function (Request $request) {
        // استلام البيانات من النموذج
        $name = $request->input('name');
        $number = $request->input('number');
        $email = $request->input('email');
        $method = $request->input('method');
        $flat = $request->input('flat');
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pin_code = $request->input('pin_code');

        // قم بإدخال بيانات الأوردر في قاعدة البيانات
        DB::table('orders')->insert([
            'name' => $name,
            'number' => $number,
            'email' => $email,
            'method' => $method,
            'flat' => $flat,
            'street' => $street,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'pin_code' => $pin_code,
        ]);

        // حفظ معلومات المنتجات المرتبطة بالأوردر في جدول آخر
        // استلام معلومات المنتجات من الفورم
// استلام معلومات المنتجات من الفورم
        $productNames = $request->input('product_name');
        $productPrices = $request->input('product_price');

        // التأكد من أن لديك عدد متساوٍ من الأسماء والأسعار
        if (count($productNames) == count($productPrices)) {
            // إدراج كل منتج كسجل منفصل في جدول order_products
            foreach ($productNames as $index => $productName) {
                $productPrice = $productPrices[$index];
                DB::table('order_products')->insert([
                    'product_name' => $productName,
                    'product_price' => $productPrice,
                ]);
            }
        }



        // حذف المنتجات من سلة التسوق بعد إتمام الطلب
        DB::table('cart')->truncate();

        return redirect('/checkout');

    });

    Route::get('/addusers', function () {
        return view('dashboard.addusers');
    });


    Route::get('/addcatogory', function () {
        return view('dashboard.addcatogory');
    })->name('addcatogory');

    Route::get('/allcatogory', function () {
        $rusalt=DB::table('categories')->get('*');
        return view('dashboard.allcatogory',['allcategorie'=>$rusalt]);
    });

    Route::get('/allusers', function () {
        $rusalt = DB::table('users')->get('*');
        return view('dashboard.allusers',['allusers'=>$rusalt]);
    })->name('allusers');

    Route::get('/allproduct', function () {
        $rusalt = DB::table('products')->get('*');
        return view('dashboard.allproduct',['allproduct'=>$rusalt]);
    })->name('allproduct');

    Route::get('/layout', function () {
        return view('.dashboard.index');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/Message', function () {
        $ruselt = DB::table('messages')->get('*');
        return view('dashboard.Message',['messages'=>$ruselt]);
    });


    Route::get('/addproduct', function () {
        $rusalt=DB::table('categories')->get('*');
        return view('dashboard.addproduct',['categorie'=>$rusalt]);
    })->name('add-product');


  



    Route::post('/add-product', function (Request $request) {
        // التحقق من صحة البيانات
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = $request->file('image')->getClientOriginalName();

        // حفظ الصورة واسترجاع المسار الذي تم حفظه
        $imagePath2 = 'assets/img/products/' . $imageName;   
        // إنشاء منتج جديد باستخدام البيانات المدخلة ومسار الصورة
        DB::table('products')->insert([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'imagepath' => $imagePath2,
        ]);
    
        // توجيه المستخدم إلى صفحة أخرى بعد إضافة المنتج
        return redirect()->route('add-product')->with('success', 'تم إضافة المنتج بنجاح.');
    });




/********************************************************* */
    /************************************************************** */



    Route::post('/add-catogory', function (Request $request) {
        // التحقق من صحة البيانات
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = $request->file('image')->getClientOriginalName();

        // حفظ الصورة واسترجاع المسار الذي تم حفظه
  

        // تثبيت جزء ثابت من المسار قبل اسم الصورة
        $imagePath2 = 'assets/img/products/' . $imageName;        // إنشاء منتج جديد باستخدام البيانات المدخلة ومسار الصورة
        DB::table('categories')->insert([

            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'imagepath' => $imagePath2,
        ]);
    
        // توجيه المستخدم إلى صفحة أخرى بعد إضافة المنتج
        return redirect()->route('addcatogory')->with('success', 'تم إضافة القسم بنجاح.');
    });




    Route::get('/offers', function (Request $request) {
        // استخراج القيمة المرسلة عبر الطلب باستخدام اسم الباراميتر 'offer_id'
        $offer_id = $request->input('offer_id');
        if ($offer_id) {
            // استخدام قيمة 'offer_id' للبحث عن العروض المطابقة
            $offers = DB::table('offers')
                ->where('id', $offer_id) // تحقق من اسم العمود المناسب في جدول العروض
                ->get('*');
        } else {
            // إذا لم يتم تقديم 'offer_id'، اجلب جميع العروض
            $offers = DB::table('offers')->get('*');
        }

        // قم بتمرير البيانات إلى عرض العروض
        return view('offers', ['offers2' => $offers]);
    });




    Route::post('/submit-message', function (Request $request) {
        // استلام البيانات من الاستمارة
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        $message = $request->input('message');
    
        // إدخال البيانات إلى جدول الرسائل
        DB::table('messages')->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
        ]);
    
        // بعد إدراج البيانات، يمكنك توجيه المستخدم إلى صفحة أخرى أو إظهار رسالة نجاح
        return redirect('/contact')->with('success', 'تم إرسال الرسالة بنجاح!');
    });
    


Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index2'])->name('dashboard');

Route::post('/add-user', [UserController::class, 'addUser'])->name('add.user');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
// Route::get('/checkout', [PaymentController::class, 'checkout']);

// مسار لإدخال بيانات التوصيل
// Route::get('/checkout', [PaymentController::class, 'checkout']);

// مسار لإدخال بيانات التوصيل
Route::post('/delivery', [PaymentController::class, 'delivery']);