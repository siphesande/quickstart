<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;






use Illuminate\Http\Request;

use Illuminate\Auth\Passwords\PasswordBroker;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
//     public function postEmail(Request $request)
// {
//     $this->validate($request, ['email' => 'required']);
//
//     $response = $this->passwords->sendResetLink($request->only('email'), function($message)
//     {
//         $message->subject('Password Reminder');
//     });
//
//     switch ($response)
//     {
//         case PasswordBroker::RESET_LINK_SENT:
//             return redirect()->back()->with('status', trans($response));
//
//         case PasswordBroker::INVALID_USER:
//             return redirect()->back()->withErrors(['email' => trans($response)]);
//     }
// }
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
