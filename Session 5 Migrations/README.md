# Database: Migrations

## [Introduction](https://laravel.com/docs/8.x/migrations#introduction)

Migrations are like version control for your database, allowing your team to define and share the application's database schema definition. If you have ever had to tell a teammate to manually add a column to their local database schema after pulling in your changes from source control, you've faced the problem that database migrations solve.

The Laravel  `Schema`  [facade](https://laravel.com/docs/8.x/facades)  provides database agnostic support for creating and manipulating tables across all of Laravel's supported database systems. Typically, migrations will use this facade to create and modify database tables and columns.

___
## [Generating Migrations](https://laravel.com/docs/8.x/migrations#generating-migrations)
```php
php artisan make:migration create_flights_table
```
---
## [Migration Structure](https://laravel.com/docs/8.x/migrations#migration-structure)

A migration class contains two methods:  `up`  and  `down`. The  `up`  method is used to add new tables, columns, or indexes to your database, while the  `down`  method should reverse the operations performed by the  `up`  method.

___
## [Running Migrations](https://laravel.com/docs/8.x/migrations#running-migrations)

To run all of your outstanding migrations, execute the  `migrate`  Artisan command:

```php
php artisan migrate
```

If you would like to see which migrations have run thus far, you may use the  `migrate:status`  Artisan command:

```php
php artisan migrate:status
```
#### [Forcing Migrations To Run In Production](https://laravel.com/docs/8.x/migrations#forcing-migrations-to-run-in-production)

Some migration operations are destructive, which means they may cause you to lose data. In order to protect you from running these commands against your production database, you will be prompted for confirmation before the commands are executed. To force the commands to run without a prompt, use the  `--force`  flag:

```php
php artisan migrate --force
```
### [Rolling Back Migrations](https://laravel.com/docs/8.x/migrations#rolling-back-migrations)

To roll back the latest migration operation, you may use the  `rollback`  Artisan command. This command rolls back the last "batch" of migrations, which may include multiple migration files:

```php
php artisan migrate:rollback
```

You may roll back a limited number of migrations by providing the  `step`  option to the  `rollback`  command. For example, the following command will roll back the last five migrations:

```php
php artisan migrate:rollback --step=5
```

The  `migrate:reset`  command will roll back all of your application's migrations:

```php
php artisan migrate:reset
```

#### [Roll Back & Migrate Using A Single Command](https://laravel.com/docs/8.x/migrations#roll-back-migrate-using-a-single-command)

The  `migrate:refresh`  command will roll back all of your migrations and then execute the  `migrate`  command. This command effectively re-creates your entire database:

```php
php artisan migrate:refresh

// Refresh the database and run all database seeds...
php artisan migrate:refresh --seed
```

You may roll back and re-migrate a limited number of migrations by providing the  `step`  option to the  `refresh`  command. For example, the following command will roll back and re-migrate the last five migrations:

```php
php artisan migrate:refresh --step=5
```

#### [Drop All Tables & Migrate](https://laravel.com/docs/8.x/migrations#drop-all-tables-migrate)

The  `migrate:fresh`  command will drop all tables from the database and then execute the  `migrate`  command:

```php
php artisan migrate:fresh
php artisan mi:f
php artisan migrate:fresh --seed
```

___
## [Tables](https://laravel.com/docs/8.x/migrations#tables)

### [Creating Tables](https://laravel.com/docs/8.x/migrations#creating-tables)

To create a new database table, use the  `create`  method on the  `Schema`  facade. The  `create`  method accepts two arguments: the first is the name of the table, while the second is a closure which receives a  `Blueprint`  object that may be used to define the new table:

```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->timestamps();
});
```

When creating the table, you may use any of the schema builder's  [column methods](https://laravel.com/docs/8.x/migrations#creating-columns)  to define the table's columns.

#### [Checking For Table / Column Existence](https://laravel.com/docs/8.x/migrations#checking-for-table-column-existence)

You may check for the existence of a table or column using the  `hasTable`  and  `hasColumn`  methods:

```php
if (Schema::hasTable('users')) {
    // The "users" table exists...
}

if (Schema::hasColumn('users', 'email')) {
    // The "users" table exists and has an "email" column...
}
```
### [Updating Tables](https://laravel.com/docs/8.x/migrations#updating-tables)

The  `table`  method on the  `Schema`  facade may be used to update existing tables. Like the  `create`  method, the  `table`  method accepts two arguments: the name of the table and a closure that receives a  `Blueprint`  instance you may use to add columns or indexes to the table:

```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->integer('votes');
});
```
___
## [Columns](https://laravel.com/docs/8.x/migrations#columns)
### [Available Column Types](https://laravel.com/docs/8.x/migrations#available-column-types)

The schema builder blueprint offers a variety of methods that correspond to the different types of columns you can add to your database tables. Each of the available methods are listed in the table below:

#### [`boolean()`](https://laravel.com/docs/8.x/migrations#column-method-boolean)

The  `boolean`  method creates a  `BOOLEAN`  equivalent column:

```php
$table->boolean('confirmed');
```
#### [`char()`](https://laravel.com/docs/8.x/migrations#column-method-char)

The  `char`  method creates a  `CHAR`  equivalent column with of a given length:

```php
$table->char('name', 100);
```
#### [`enum()`](https://laravel.com/docs/8.x/migrations#column-method-enum)

The  `enum`  method creates a  `ENUM`  equivalent column with the given valid values:
بستخدم لما بدي استعمل نوع او اختيار بين شغليتن  مثلا نوع المستخدم 
```php
$table->enum('difficulty', ['easy', 'hard']);
```
#### [`double()`](https://laravel.com/docs/8.x/migrations#column-method-double)

The  `double`  method creates a  `DOUBLE`  equivalent column with the given precision (total digits) and scale (decimal digits):

```php
$table->double('amount', 8, 2);
```
#### [`float()`](https://laravel.com/docs/8.x/migrations#column-method-float)

The  `float`  method creates a  `FLOAT`  equivalent column with the given precision (total digits) and scale (decimal digits):

```php
$table->float('amount', 8, 2);
```
#### [`foreignId()`](https://laravel.com/docs/8.x/migrations#column-method-foreignId)

The  `foreignId`  method creates an  `UNSIGNED BIGINT`  equivalent column:

```php
$table->foreignId('user_id');
```
#### [`id()`](https://laravel.com/docs/8.x/migrations#column-method-id)

The  `id`  method is an alias of the  `bigIncrements`  method. By default, the method will create an  `id`  column; however, you may pass a column name if you would like to assign a different name to the column:

```php
$table->id();
```
#### [`integer()`](https://laravel.com/docs/8.x/migrations#column-method-integer)

The  `integer`  method creates an  `INTEGER`  equivalent column:

```php
$table->integer('votes');
```
#### [`longText()`](https://laravel.com/docs/8.x/migrations#column-method-longText)

The  `longText`  method creates a  `LONGTEXT`  equivalent column:

```php
$table->longText('description');
```
#### [`rememberToken()`](https://laravel.com/docs/8.x/migrations#column-method-rememberToken)

The  `rememberToken`  method creates a nullable,  `VARCHAR(100)`  equivalent column that is intended to store the current "remember me"  [authentication token](https://laravel.com/docs/8.x/authentication#remembering-users):

```php
$table->rememberToken();
```
#### [`softDeletes()`](https://laravel.com/docs/8.x/migrations#column-method-softDeletes)

The  `softDeletes`  method adds a nullable  `deleted_at`  `TIMESTAMP`  equivalent column with an optional precision (total digits). This column is intended to store the  `deleted_at`  timestamp needed for Eloquent's "soft delete" functionality:

```php
$table->softDeletes($column = 'deleted_at', $precision = 0);
```
#### [`string()`](https://laravel.com/docs/8.x/migrations#column-method-string)

The  `string`  method creates a  `VARCHAR`  equivalent column of the given length:

```php
$table->string('name', 100);
```

#### [`text()`](https://laravel.com/docs/8.x/migrations#column-method-text)

The  `text`  method creates a  `TEXT`  equivalent column:

```php
$table->text('description');
```

#### [`timestamps()`](https://laravel.com/docs/8.x/migrations#column-method-timestamps)

The  `timestamps`  method creates  `created_at`  and  `updated_at`  `TIMESTAMP`  equivalent columns with an optional precision (total digits):

```php
$table->timestamps($precision = 0);
```
#### [`year()`](https://laravel.com/docs/8.x/migrations#column-method-year)

The  `year`  method creates a  `YEAR`  equivalent column:

```php
$table->year('birth_year');
```
#### [`dateTime()`](https://laravel.com/docs/8.x/migrations#column-method-dateTime)

The  `dateTime`  method creates a  `DATETIME`  equivalent column with an optional precision (total digits):

```php
$table->dateTime('created_at', $precision = 0);
```

#### [`date()`](https://laravel.com/docs/8.x/migrations#column-method-date)

The  `date`  method creates a  `DATE`  equivalent column:

```php
$table->date('created_at');
```
___
### [Column Modifiers](https://laravel.com/docs/8.x/migrations#column-modifiers)

In addition to the column types listed above, there are several column "modifiers" you may use when adding a column to a database table. For example, to make the column "nullable", you may use the  `nullable`  method:
```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->string('email')->nullable();
});
```

The following table contains all of the available column modifiers. This list does not include  [index modifiers](https://laravel.com/docs/8.x/migrations#creating-indexes):
| Modifier | Description |
|--|--|
| `->after('column')` | Place the column "after" another column (MySQL). |
| `->autoIncrement()` | Set INTEGER columns as auto-incrementing (primary key). |
| `->charset('utf8mb4')` | Specify a character set for the column (MySQL). |
|  `->collation('utf8mb4_unicode_ci')`| Specify a collation for the column (MySQL/PostgreSQL/SQL Server). |
| `->comment('my comment')` |Add a comment to a column (MySQL/PostgreSQL).  |
| `->default($value)` | Specify a "default" value for the column. |
| `->first()` | Place the column "first" in the table (MySQL). |
| `->from($integer)` | Set the starting value of an auto-incrementing field (MySQL / PostgreSQL). |
|`->nullable($value = true)`  | Allow NULL values to be inserted into the column. |
| `->storedAs($expression)`|  Create a stored generated column (MySQL).|
| `->unsigned()` | Set INTEGER columns as UNSIGNED (MySQL). |
| `->useCurrent()` |Set TIMESTAMP columns to use CURRENT_TIMESTAMP as default value.  |
| `->useCurrentOnUpdate()` | Set TIMESTAMP columns to use CURRENT_TIMESTAMP when a record is updated. |
| `->virtualAs($expression)` | Create a virtual generated column (MySQL). |
| `->generatedAs($expression)` | Create an identity column with specified sequence options (PostgreSQL). |
|`->always()`  | Defines the precedence of sequence values over input for an identity column (PostgreSQL). |
___
### [Creating Indexes](https://laravel.com/docs/8.x/migrations#creating-indexes)

The Laravel schema builder supports several types of indexes. The following example creates a new  `email`  column and specifies that its values should be unique. To create the index, we can chain the  `unique`  method onto the column definition:

```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->string('email')->unique();
});
```

Alternatively, you may create the index after defining the column. To do so, you should call the  `unique`  method on the schema builder blueprint. This method accepts the name of the column that should receive a unique index:

```php
$table->unique('email');
```

You may even pass an array of columns to an index method to create a compound (or composite) index:

```php
$table->index(['account_id', 'created_at']);
```

When creating an index, Laravel will automatically generate an index name based on the table, column names, and the index type, but you may pass a second argument to the method to specify the index name yourself:

```php
$table->unique('email', 'unique_email');
```
#### [Available Index Types](https://laravel.com/docs/8.x/migrations#available-index-types)

Laravel's schema builder blueprint class provides methods for creating each type of index supported by Laravel. Each index method accepts an optional second argument to specify the name of the index. If omitted, the name will be derived from the names of the table and column(s) used for the index, as well as the index type. Each of the available index methods is described in the table below:
| Command |  Description |
|--|--|
|`$table->primary('id');`  | Adds a primary key. |
| `$table->primary(['id', 'parent_id']);` | Adds composite keys. |
| `$table->unique('email');` | Adds a unique index. |
|`$table->index('state');`  | Adds an index. |
| `$table->spatialIndex('location');` |Adds a spatial index (except SQLite).  |


___
### [Foreign Key Constraints](https://laravel.com/docs/8.x/migrations#foreign-key-constraints)

Laravel also provides support for creating foreign key constraints, which are used to force referential integrity at the database level. For example, let's define a  `user_id`  column on the  `posts`  table that references the  `id`  column on a  `users`  table:

```php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('posts', function (Blueprint $table) {
    $table->unsignedBigInteger('user_id');

    $table->foreign('user_id')->references('id')->on('users');
});
```

Since this syntax is rather verbose, Laravel provides additional, terser methods that use conventions to provide a better developer experience. When using the  `foreignId`  method to create your column, the example above can be rewritten like so:

```php
Schema::table('posts', function (Blueprint $table) {
    $table->foreignId('user_id')->constrained();
});
```

The  `foreignId`  method creates an  `UNSIGNED BIGINT`  equivalent column, while the  `constrained`  method will use conventions to determine the table and column name being referenced. If your table name does not match Laravel's conventions, you may specify the table name by passing it as an argument to the  `constrained`  method:

```php
Schema::table('posts', function (Blueprint $table) {
    $table->foreignId('user_id')->constrained('users');
});
```

You may also specify the desired action for the "on delete" and "on update" properties of the constraint:

```php
$table->foreignId('user_id')
      ->constrained()
      ->onUpdate('cascade')
      ->onDelete('cascade');
```

Any additional  [column modifiers](https://laravel.com/docs/8.x/migrations#column-modifiers)  must be called before the  `constrained`  method:

```php
$table->foreignId('user_id')
      ->nullable()
      ->constrained();
```
```php 
$table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
```
#### [Dropping Foreign Keys](https://laravel.com/docs/8.x/migrations#dropping-foreign-keys)

To drop a foreign key, you may use the  `dropForeign`  method, passing the name of the foreign key constraint to be deleted as an argument. Foreign key constraints use the same naming convention as indexes. In other words, the foreign key constraint name is based on the name of the table and the columns in the constraint, followed by a "_foreign" suffix:

```php
$table->dropForeign('posts_user_id_foreign');
```

Alternatively, you may pass an array containing the column name that holds the foreign key to the  `dropForeign`  method. The array will be converted to a foreign key constraint name using Laravel's constraint naming conventions:

```php
$table->dropForeign(['user_id']);
```
___
ملاحظات :
-
```php
php artisan migrate
```
 - بتمشي بالترتيب من الاقدم إلى الاحدث وبتدور على يلي مالو معملو 
migrate
وبتعملو يعني إذا عندي واحد مالو معملو فبتعملوا
 - أي جدول جوا قاعدة البيانات لازم يكون اسمه جمع
 - لما بتعمل add column 
 دوما ماتنسى تحط بال down drop column
 - لوعندي مشكلة في الداتا بيز على اللوكال لما عم جرب بستعمل هي
  ```php
php artisan mi:f
```
 - ->cascadeOnDelete() ->cascadeOnUpdate()
 أحذف الجدول او عدل إذا تم  حذف جدول المربوط معه
 - مابصير العلاقة تكون من جدول أقدم مع جدول احدث بلارافل بتمشي من الأقدم للأحدُ في الانشاء حسب تاريخ migrate 
يعني كيف بدي اعمل علاقة مع جدول مابعرفو ولالي مأنشؤو
 - لارافل مابتعترف بأي جدول بنعمل من برا migrate

 

