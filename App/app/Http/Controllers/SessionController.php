<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Sentinel;
use Session;
use View;

class SessionController extends Controller
{

    public function create() {
        return View::make('sessions.create');
    }

    public function store() {
        $credentials = Input::only('login', 'password');

        try {
            if ($user = Sentinel::authenticate($credentials, false)) {
                return Redirect::to('/');
            }
            else {
                Session::flash('error', 'Invalid login.');
            }
        }
        catch (Cartalyst\Sentinel\Checkpoints\ThrottlingException $e) {
            Session::flash('error', $e->getMessage());
        }
        catch (Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            Session::flash('error', $e->getMessage());
        }
        catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }

        return View::make('sessions.create');
    }
}