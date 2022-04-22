<?php
 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Image;
use Dompdf\Options;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the media for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function home()
    {

        /*$pass = Hash::make('padremarcos2022');
        $user = new User();
        $user->email = 'admin@bolaodasortevip.com';
        $user->password = $pass;
        $user->isAdmin = 1;
        $user->save();*/
        return view("home");
    }

    public function createUser(){
        
    }


    public function signIn(Request $request){
       //dd($request->all());

        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ], ['min' => 'A senha deve ter no minimo 6 caracteres', 
            'required' => "Todos os campos são obrigatorios"]
        );
       // dd(Hash::make('padremarcos2022'));
       //"$2y$10$0abWbnEbVQQxogPf5zt2T.9JEfbGxqK4tCublfU8zq7t7ee6oeoNu"
        $remember = 0;
        if($request->remember){
            $remember = 1;
        }

       

        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('error', 'O email ou senha não correspondem!');

       
    }


    public function signOut(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }



   

}