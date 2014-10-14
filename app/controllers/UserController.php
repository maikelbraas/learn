<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author user
 */
class UserController extends BaseController{

    public function __controller()
    {
        $this->user = new User;
    }
    
    public function getLogin()
    {
        return View::make('user.login');
    }
    
    public function getCreate()
    {
        return View::make('user.create');
    }

    public function postLogin()
    {
        $data = Input::all();
//        $remember = Input::get('remember_token');
        $rules = Validator::make($data, array(
            'username'  =>  'required',
            'password'  =>  'required'
        ));

        if($rules->fails())
        {
            return Redirect::route('getLogin')->withErrors($rules)->withInput();
        }
        else
        {
            $remember = (Input::has('remember')) ? true : false;

            $auth = Auth::attempt(array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            ), $remember);

            if($auth)
            {
                Session::put('username', Input::get('username'));
                return Redirect::route('home')->with('success', 'You have successfully logged in.');
            }
            else
            {
                return Redirect::route('getLogin')->with('fail', 'An error occurred while logging in.');
            }
        }
    }

    /**
     * @return mixed
     */
    public function postCreate()
    {

        $data = Input::all();

        $rules = Validator::make($data, array(
            'username' => 'required|min:4|max:30|unique:users',
            'password' => 'required|min:4|max:22',
            'confirm-password' => 'required|same:password'
        ));


        if($rules->fails())
        {
            return Redirect::route('getCreate')->withErrors($rules)->withInput();
        }
        else
        {
            $user = new User;

            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));

            if($user->save())
            {
                return Redirect::route('home')->with('success', 'Account was successfully created.');
            }
            else
            {
                return Redirect::route('getCreate')->with('fail', 'An error occurred while creating the account.');
            }
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('home')->with('success', 'You have been logged off.');
    }
}
