﻿
> use App\Http\Controllers\HiController;
>
> use App\Http\Controllers\UserController;
>
> use App\Http\Controllers\Front\UsersController;
>
> use App\Http\Controllers\Admin\AdminController;
>
> use Illuminate\Support\Facades\Route;
>
> ** Web Routes**
> Here is where you can register web routes for your application.
> These
> routes are loaded by the RouteServiceProvider within a group which
> contains the "web" middleware group. Now create something great!

# // ! Route

# // ! Basic Routing

```php
    Route::get('/', function () {

    return  view('welcome');

    });

    Route::get('greeting', function () {

    return  'Hello World';

    });

    Route::get('test1', function () {

    return  "test1";

    });

     Route::get('test', function () {

     return view('test');
    });
```

## **ارسال متغير لل view**

```php

    Route::get('test', function () {

    return  view('test', ['name' => 'James']);

    });


```

## // ! Controller Routing

```php
    Route::get('hii', [UserController::class, 'index']);

    Route::get('hi',[HiController::class , "index"]);
```

// ******************************\_\_\_\_******************************

## // ! Available Router Methods

```php
    Route::get('hi',[HiController::class , "index"]);

    // Route::post('post', function () {

    // return "users";

    // });

    // Route::put('put', function () {

    // return "users";

    // });

    // Route::patch("patch", function () {

    // return "users";

    // });

    // Route::delete("delete", function () {

    // return "users";

    // });

    // Route::options("options", function () {

    // return "users";

    // });
```

---

> Sometimes you may need to register a route that responds to multiple
> HTTP verbs.
>
> You may do so using the match method. Or,
>
> you may even register a route that responds to all HTTP verbs using
> the any method:
>
> احيانا بنحتاج إلى راوت بستجيب للعديد من الافعال HTTP
>
> بنقدر نستخدم ونحدد فيها نوع الفعل يلي بدنا ياه get or post MATCH
>
> any او بنستخدم للأستجابة لكل الانواع

```php
    Route::match(['get', 'post'], 'match', function () {

    return  "hello from match";

    });



    Route::any('any', function () {

    return  "hello from any";

    });

```

## // ! Basic Routing with Parameters

## // ! Requer

```php
    Route::get('test2/{id}', function ($id) {

    return  $id;

    });
```

# `// ! not Requer`

```php
    Route::get('test3/{id?}', function () {

    return  'welcome' ;

    });

    // Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {

    // return $postId ." " .$commentId;

    // });
```

---

## // ! Route name

> بفيدني لما بدي اعمل اعادة توجيه للراوت او بدي ارجع استخدمو في الفيو
> يعني لما بدي اكتبو جوا رابط مافي داعي اكتب المسار بتخصر بكتب فقط متل
> المثال تحت داخل الفيو فهو يسمح بإنشاء عمليات إعادة توجيه ملائمة أو
> انشاء مسار محدد
>
> ملاحظة:
>
> ! اسم الراوت لازم يكون فريد مابصير يتكرر ابدا
>
> Route::get(.......)->name('b');
>
> #View code
>
> <a href="{{ route('a') }}">show-number</a>
>
> <a href="{{ route('b') }}">show-string</a>

# `/ ? Route code`

```php
    Route::get('show-number', function () {

    return  'show-number';

    })->name('show-number');

    Route::get('show-string', function () {

    return  'show-string';

    })->name('show-string');
```

---

## // ! Route Prefixes

> تستخدم لتحديد بادئة مجموعة
>
> الرابط رح يكون admin/users
>
> الفائدة بل ما اكتب قبل كل Route في المجموعة
>
> admin
>
> بكتبا مرة وحدة فوق من شان تبلش المجموعة كلا بنفس البادئة
>
> بستخدما لما بدي صفحات ما حدا يدخل عليها غير لما بكتب
>
> URL بأيدي
>
> متل الصفحات المهمة صفحات الادمن بشفر الرابطن تبعن
>
> يعني المجموعة كلا بتبش بنفس البداية

```php

    Route::prefix('admin')->group(function () {

    Route::get('users', function () {

    // ! Matches The "/admin/users" URL

    return  "from prefix";

    })->name('users');

    });

```

---

## // ! Route Name Prefixes

> admin. بضيف لاسم كل الراوت قبلن
>
> حتى اسبق كل اسم مسار بسلسلة نصية معينة بدي كل المجموعة تبلش فيا

```php

    Route::name('admin.')->group(function () {

    Route::get('users', function () {

    // Route assigned name "admin.users"...

    return  "users";

    })->name('users');

    });
```

---

## Route::resource

```php
   Route::resource('news', 'NewsController');
   ```
________________________________________________________________



## // ! Route namespace

```php
> تعين مجال الأسماء الملف لكل راوت من الراوت الموجودة ضمن المجموعة
>
> Controllers بستخدم من شان اقسم ملقات
>
> route::namespace فلازم احط
>
> انو دير بالك هو موجود جوا مجلد يلي اسمو كذا
>
> اما بلارافل 8 بكفي اعمل ues
>
> use App\Http\Controllers\Admin\AdminController;


  route::namespace('Front')->group(function ()

  {

  // ! all Route only access controller or methods in folder name Front (F) cabital

  Route::get('welcome', function () {

  return  'welcome';

  });

  Route::get('FrontUsers', [UsersController::class, 'index']);  }

>   Route::namespace('Admin') == Route::group(['namespace'=>'Admin']


  // Route::namespace('Admin')->group(function () {

  // ! Controllers Within The "App\Http\Controllers\Admin" Namespace

  // Route::get('Admins', [AdminController::class, 'index'])->name('Admins');

  // });



  Route::group(['namespace'=>'Admin'],function(){

  // ! Controllers Within The "App\Http\Controllers\Admin" Namespace

  Route::get('Admins', [AdminController::class, 'index'])->name('Admins');

  Route::get('admin', [AdminController::class, 'index']);

  Route::get('hiAdmin', [AdminController::class, 'index']);

  });

  Route::prefix('Admin')->group(function () {

  Route::get('prefixAdmins', [AdminController::class, 'index'])->name('prefixAdmins');

  });
  ```


________________________________________________________________

## // ! Route middleware



> أي راوت جوا هل غروب كابصير يدخل عليه حدا إذا مالو مسجل دخول
>
> web الافتراضي يعني أي احد داخل بدون تسجيل او الضيف
>
> auth يعني يوزر عضو مسجل
>
> auth:web يعني يوزر عضو مسجل



```php

  // Route::middleware(['auth'])->group(function () {

  // Route::get('user/profile', function () {

  // return "hiiii";

  // });

  // });

  // Route::middleware(['first', 'second'])->group(function () {

  // Route::get('/', function () {

  // // Uses first & second middleware...

  // });



  // Route::get('/user/profile', function () {

  // // Uses first & second middleware...

  // });

  // });



  // Route::get('check', function () {

  // return 'middleware';

  // })->middleware('auth');


````

---

## // ! Route Send Data to view

```php
    Route::get('send/{id}', function ($id)

    {

    return  view('send',Compact('id'));

    });

    Route::get('sd', function ()

    {

    return  view('send')->with('data',2);

    });

    Route::get('sd1', function ()

    {

    return  view('send')->with(['string' => "hi","int"=>5] );

    });

    Route::get('sd11', function ()

    {

    return  view('send');

    });

```

---

## // ! Route group

> يسمح في مشاركة خواص الراوت مثل
>
> prefix,middleware,namespace
>
> على عدد كبير من الراوت داخل غروب بدل كتابة نوع الخاصية لكل راوت
>
> كما يمكن دمج اكثر من خاصية معا
>
> إذا خاصية وحدة لازم بلش فيا

```php

    // Route::group(['prefix' => 'users','middleware' => 'auth'],function()

    // {

    // Route::get('/', function () {

    // return 'work';

    // });

    // Route::get('show', function () {

    // return 'show';

    // });

    // Route::delete('delete', 'UsersController@showAdminName');

    // Route::get('show', 'UsersController@showAdminName');

    // Route::get('edit', 'UsersController@showAdminName');

    // Route::put('update', 'UsersController@showAdminName');

    // });


```

---
```php
> RouteAdmin لازم افصل
>
> عن المستخدمين من شان اقسمن اول شي بنشىء ملف للراوت بعدا بروح على
>
> RouteServiceProvider بعدل فيه بضيف
>
> Route::middleware('web')
>
> ->namespace($this->namespace)
>
> ->group(base_path('routes/admin.php'));

```


 ________________________________________________________________

> // ! Route view

```php
    Route::view('URI', 'send');
````

