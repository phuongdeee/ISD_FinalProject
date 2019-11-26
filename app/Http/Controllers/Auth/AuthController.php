<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function index() {
        return view('pages.auth.login');
    }

    /**
     * Log user in
     */
    public function login(Request $request) {
        // *for prototype
        $role = $request->get('role', Role::ROLE_ADMIN);
        $user = new User($role);

        // create session
        session()->put('user', $user);

        // redirect to home
        return redirect('/home');
    }

    public function logout() {
        session()->forget('user');

        return redirect('/login');
    }
}