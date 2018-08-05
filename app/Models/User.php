<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function storeUser($request){
        DB::beginTransaction();
        try {
            $user = self::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('$request->password'),
            ]);
            DB::commit();
            return $user;
        } catch (Exception $exception) {
            DB::rollBack();
            return false;
        }
    }
    
    public static function updateUser($request, $id){
        $user = User::findOrFail($id);
        if ($user) {
            DB::beginTransaction();
            try {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt('$request->password'),
                ]);
                DB::commit();
                return $user;
            } catch (Exception $exception) {
                DB::rollBack();
                return false;
            }
        } else {
            return false;
        }
    }

}
