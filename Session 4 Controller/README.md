# [Controllers](https://laravel.com/docs/8.x/controllers)

## Basic Controllers

```php

public  function  index()

{



}



Route::get('/', [UsersController::class, 'index']);


```

```php



php artisan make:controller ContactController



```

---

## Single Action Controllers

If a controller action is particularly complex, you might find it convenient to dedicate an entire controller class to that single action. To accomplish this, you may define a single `__invoke` method within the controller:

> بنفذ بس تابع \_\_invoke
>
> ومابيقبل أي تابع غيرو

```php

public  function  __invoke()

{

// ...

}



Route::get('server', ProvisionServer::class);

```

```php

php artisan make:controller ProvisionServer --invokable

```

---

## [Controller Middleware](https://laravel.com/docs/8.x/controllers#controller-middleware)

[Middleware](https://laravel.com/docs/8.x/middleware) may be assigned to the controller's routes in your route files:

```php

Route::get('profile', [UserController::class, 'show'])->middleware('auth');

```

Or, you may find it convenient to specify middleware within your controller's constructor. Using the `middleware` method within your controller's constructor, you can assign middleware to the controller's actions:

> بعملها في Controller
>
> لأني إذا بدي اعملها بالراوت بدي اعمل لكل تابع Middleware

```php

public  function  __construct()

{

$this->middleware('auth');

$this->middleware('log')->only('index');

$this->middleware('subscribed')->except('store');

}

```

---

## [Resource Controllers](https://laravel.com/docs/8.x/controllers#resource-controllers)

Because of this common use case, Laravel resource routing assigns the typical create, read, update, and delete ("CRUD") routes to a controller with a single line of code. To get started, we can use the `make:controller` Artisan command's `--resource` option to quickly create a controller to handle these actions:

> بنشألي لحالو توابع create, read, update, and delete
>
> إذا بدي ضيف تابع زيادة لل resource
>
> بكتب الراوت تبعه قبل تعريف ال resource
>
> ومابصير يكون نفس URL

```php



Route::resource('photos', PhotoController::class);

```

```php



php artisan make:controller PhotoController --resource

php artisan make:Controller UsersController -r



```

You may even register many resource controllers at once by passing an array to the `resources` method:

```php

Route::resources([

'photos' => PhotoController::class,

'posts' => PostController::class,

]);

```

#### Actions Handled By Resource Controller

| Verb | URI | Action | Route Name |

| --------- | ---------------------- | --------- | ---------------- |

| GET | `/photos` | `index` | `photos.index` |

| GET | `/photos/create` | `create` | `photos.create` |

| POST | `/photos` | `store` | `photos.store` |

| GET | `/photos/{photo}` | `show` | `photos.show` |

| GET | `/photos/{photo}/edit` | `edit` | `photos.edit` |

| PUT/PATCH | `/photos/{photo}` | `update` | `photos.update` |

| DELETE | `/photos/{photo}` | `destroy` | `photos.destroy` |

---

#### [Specifying The Resource Model](https://laravel.com/docs/8.x/controllers#specifying-the-resource-model)

If you are using [route model binding](https://laravel.com/docs/8.x/routing#route-model-binding) and would like the resource controller's methods to type-hint a model instance, you may use the `--model` option when generating the controller:

```php

php artisan make:controller PhotoController --resource --model=Photo

```

---

### [Partial Resource Routes](https://laravel.com/docs/8.x/controllers#restful-partial-resource-routes)

When declaring a resource route, you may specify a subset of actions the controller should handle instead of the full set of default actions:

```php

use App\Http\Controllers\PhotoController;



Route::resource('photos', PhotoController::class)->only([

'index', 'show'

]);



Route::resource('photos', PhotoController::class)->except([

'create', 'store', 'update', 'destroy'

]);

```

---

ex:

```php



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('photos/hi', [PhotoController::class, 'hi']);




Auth::routes();

```
