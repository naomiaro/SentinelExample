<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepository;
use App\Events\ReminderEvent;
use View;
use Input;
use Reminder;
use Event;
use Redirect;
use Session;

class ReminderController extends Controller
{
  public function __construct(UserRepository $userRepository)
    {
        $this->users = $userRepository;
    }

    public function create() {
        return View::make('reminders.create');
    }

    public function store() {
        $login = Input::get('login');

        $user = $this->users->findByLogin($login);

        if ($user) {
            ($reminder = Reminder::exists($user)) || ($reminder = Reminder::create($user));

            Event::fire(new ReminderEvent($user, $reminder));
        }

        return View::make('reminders.store');
    }

    public function edit($id, $code) {
        $user = $this->users->findById($id);

        if (Reminder::exists($user, $code)) {
            return View::make('reminders.edit', ['id' => $id, 'code' => $code]);
        }
        else {
            //incorrect info was passed
            return Redirect::to('/');
        }
    }

    public function update($id, $code) {
        $password = Input::get('password');
        $passwordConf = Input::get('password_confirmation');

        $user = $this->users->findById($id);
        $reminder = Reminder::exists($user, $code);

        //incorrect info was passed.
        if ($reminder == false) {
            return Redirect::to('/');
        }

        if (($password != $passwordConf)) {
            Session::flash('error', 'Passwords must match.');
            return View::make('reminders.edit', ['id' => $id, 'code' => $code]);
        }

        Reminder::complete($user, $code, $password);

        return Redirect::to('/');
    }
}