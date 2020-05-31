<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index(){
        return redirect()->route('home');
//        return view('auth.passwords.reset');
    }

    public function resetPassword(Request $password){
//        $id = $password->id_user;
//        $old_password_user = User::find($id)->password;
//        $check = Hash::check($password->old_password, $old_password_user);
//        if($check){
//            $new_password = Hash::make($password->new_password);
//            User::where('id', $id)->update(['password' => $new_password]);
//            echo 'Ok';
//        }else{
//            return 'Неверный пароль';
//        }
//        if($old_password_user == $old_pass){
//            return 'Ok';
//        }else{
//            return 'No';
//        }
    }
}
