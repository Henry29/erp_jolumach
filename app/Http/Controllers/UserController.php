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
use Exception;
use Throwable;

class UserController extends Controller
{

    public function index(){
        DB::beginTransaction();

        try {
            $users = DB::select('SELECT pa_listarusuario()');
            $cursor = $users[0]->pa_listarusuario;
            $cursor_data = DB::select('FETCH ALL IN "' . $cursor . '";');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        return $cursor_data;
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email',$credentials["email"])->first();

        DB::beginTransaction();

            try {
                $getUser = DB::select('SELECT u.id,u.name,u.email,u.id_rol,tb.nombre_rol FROM users u 
                    INNER JOIN tbrol tb ON u.id_rol = tb.identificador_rol
                    WHERE u.email = :email AND tb.smnu_rol = :smnu_rol',
                    ['email' => $user->email, 'smnu_rol' => 'mnu']
                );
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                die("error: " . $e->getMessage());
            } catch (Throwable $e) {
                DB::rollBack();
                die("error: " . $e->getMessage());
            }

        if(count($getUser) > 0){
            $ownUser = $getUser[0];
        }else{
            $ownUser = null;
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token','ownUser'));
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
        $id = $request->editedItem["id"];
        $req = $request->all();

        if(!(intval($id) > 0)){

            $validator = Validator::make($req["editedItem"], [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ],[
                'required' => 'El campo :attribute es obligatorio.',
                'unique' => 'El campo :attribute esta en uso.',
                'min' => 'El campo :attribute tiene como mínimo 6 caracteres.',
            ]);
        }else{
            $validator = Validator::make($req["editedItem"], [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ],[
                'required' => 'El campo :attribute es obligatorio.',
                'unique' => 'El campo :attribute esta en uso.',
                'min' => 'El campo :attribute tiene como mínimo 6 caracteres.',
            ]);
        }


        if($validator->fails()){
                $errors = $validator->errors();
                $estadoregistro = false;
                return response()->json([compact('errors','estadoregistro')]);
        }


        $name = $request->editedItem["name"];
        $password = $request->editedItem["pass_nohash"];
        $email = $request->editedItem["email"];
        $estado = $request->editedItem["estado"];
        $id_rol = $request->editedItem["id_rol"];

        $fechaActual = date('Y-m-d h:i:s');

        DB::beginTransaction();

        try {
            $save = DB::select(
                'SELECT pa_mantenimientousuariov2(:_id,:_name,:_email,:_pass_nohash,:_password,:_estado,:_identificador_rol,:_fechaActual)',
                ['_id' => $id, '_name' => $name, '_email' => $email,'_pass_nohash' =>$password ,'_password' => Hash::make($password), '_estado' => $estado, '_identificador_rol' => $id_rol, '_fechaActual' => $fechaActual ]
            );
            $cursor = $save[0]->pa_mantenimientousuariov2;
            $cursor_data = DB::select('FETCH ALL IN "' . $cursor . '";');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        } catch (Throwable $e) {
            DB::rollBack();
            die("error: " . $e->getMessage());
        }

        $id = $cursor_data[0]->id;

        $user = User::find($id);

        $estado_registro = $cursor_data[0]->estadoregistro;
        
        $token = JWTAuth::fromUser($user);

        return response()->json([compact('id','user','estado_registro','token')]);
    }

    public function destroy(Request $request)
    {
        $id_user = $request->id;

        DB::beginTransaction();

        try {
            $delete = DB::delete('DELETE FROM users WHERE id=:id', ['id' => $id_user]);
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
}
