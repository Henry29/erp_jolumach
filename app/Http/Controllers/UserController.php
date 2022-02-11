<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Support\Facades\DB;
use PDO;
use Exception;
use SebastianBergmann\Environment\Console;
use Throwable;
class UserController extends Controller
{
    public function index(Request $request)
    {       
       
        $sql = 'SELECT * FROM users';
        $datos_obtenidos = DB::select($sql);        
        return $datos_obtenidos;
  
    }  
    public function store(Request $request)
    {         
            
        $id = $request->editedItem["id"];
        $name = $request->editedItem['name'];
        $email= $request->editedItem['email'];
        $password = $request->editedItem['password'];
        //dd($id);     

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_usuario_lis(:id,:name,:email,:password)',
                ['id' => $id, 'name' => $name, 'email' => $email, 'password' => $password]);              
            $cursor = $save[0]->pa_usuario_lis;
            $cursor_data = DB::select('FETCH ALL IN "' . $cursor . '";');
           // dd($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }
          return response()->json($cursor_data);   

          $sql = 'SELECT * FROM users';
          $datos_obtenidos = DB::select($sql);        
          return $datos_obtenidos;
       }

     

       public function destroy(Request $request)
    {
        $id=$request->id;                    
       DB::beginTransaction();

        try {
              $delete = DB::delete('DELETE  FROM users WHERE id=:id',['id'=>$id]); 
         
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        return response()->json($delete);
        


    }
    public function authenticate(Request $request)
    {
    $credentials = $request->only('email', 'password');
    try {
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 400);
        }
    } catch (JWTException $e) {
        return response()->json(['error' => 'could_not_create_token'], 500);
    }
    return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
    try {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
        }
        } catch (TokenExpiredException $e) {
                return response()->json(['token_expired']);
        } catch (TokenInvalidException $e) {
                return response()->json(['token_invalid']);
        } catch (JWTException $e) {
                return response()->json(['token_absent']);
        }
        return response()->json(compact('user'));
    }


    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }
}
