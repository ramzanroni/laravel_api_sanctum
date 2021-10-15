step-1: 
composer require laravel/sanctum
step-2:
php artisan vendor:publish --provider=Laravel\Sanctum\SanctumServiceProvider"
step-3:
php artisan migrate
step-4:
Add code in kernel.php file in the 'api' array(\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,)
step-5:
"use HasApiTokens;"
in the user.php model
step-6:
php artisan make:seeder UserTableSeeder
step-7:

if want to add record in the user file otherwise avoid it

insert record in the seeder file

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



DB::table('users')->insert([
    'name' => 'John Doe',
    'email' => 'john@doe.com',
    'password' => Hash::make('password')
]);
add this data in the run function

step-8:
make a controller 
use :
use App\User;
use Illuminate\Support\Facades\Hash;

and submit this code in the class: 

function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

 step:9
 Make post route in the api.php file
 Route::('login_info', [Controller_name::class, "index"]);

 Test this route in the postman

 the copy the token

step-10:
make a group route using sanctum midlewarw

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    });
    and the route inside the group route

 Step-11:
 Add header in the postman
 Authorization
 Bearer space past token

 Example:
 Bearer 8|Ln4rUd5MMq97OXV2je2gJAMUfKF89jLpDZAsGu79
