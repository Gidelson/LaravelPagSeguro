<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function profile()
    {
        $title = "Meu Perfil";
        return view('store.user.profile', compact('title'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function profileUpdate(Request $request, User $user)
    {

        $this->validate($request, $user->rulesUpdateProfile() );

        $dadosForm = $request->all();

        if(isset($dadosForm['email']))
         unset($dadosForm['email']);

         if(isset($dadosForm['cpf']))
         unset($dadosForm['cpf']);

        $update =  auth()->user()->profileUpdate($dadosForm);
        if($update){
            return redirect()->back()->with('message','Perfil Atualizado');
        }else{
            return redirect()->back()->with('error','Erro ao atualizar perfil');
        }

    }

    public function password()
    {
        $title = "Atualizar Senha";
         return  view('store.user.password', compact('title'));
    }

    public function passwordUpdate(Request $request)
    {

        $this->validate($request,  ['password' => 'required|string|min:6|confirmed'] );

        $update =  auth()->user()->updatePassword($request->password);
        if($update){
            return redirect()->back()->with('message','Senha Atualizada');
        }else{
            return redirect()->back()->with('error','Erro ao atualizar Senha');
        }
    }

}
