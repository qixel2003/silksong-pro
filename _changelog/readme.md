12/10/2025
-items & item view gemaakt.
-items table gemaakt.
-contact view & controller gemaakt.
-route update

13/10/2025
-item controller/model

14/10/2025
-tag table/model
-show item tags in item index

15/10/2025
-item crud
-item route update

26/10/2025 
-adding role and status to user table
-form layout update

27/10/2025
-integrate ERD:
    -adding review, loginlog table

28/10/2025
-build crud
-build autorisation

29/10/2025
-filter function
-search function !MOET OOK KUNNEN COMBINEREN!
-role autorisation

30/10/2025
-build store at create bug fixen
-admin on/off knop

01/11/2025
-deeper validation
-bugfixing


TODO:

-begrijp de search/filter func en admin page
-seach/filter func updaten en in build verwerken


notes:
account's:
quinzelpm03@gmail.com
admin123

123@gmail.com
users123

make admin:
php artisan tinker
$user = App\Models\User::where('email', 'quinzelpm03@gmail.com')->first();
$user->role = 1;
$user->save();

make deeper vali:
Route::get('/builds/create', [BuildController::class, 'create'])
->middleware(['auth', 'check.login.count'])
->name('builds.create');
