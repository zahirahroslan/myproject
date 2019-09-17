<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

use Validator;
use Redirect;
use App\Register;

use Auth;

class RegisterController extends Controller
{
    //

    public function store () {
    	//echo "test here";

    	$data=Input::except(array('_token'));

    	//var_dump($data);

    	$rule=array(
    		'username'=>'required',
    		'email'=>'required|email',
    		'password'=>'required|min:6',
    		'cpassword'=>'required|same:password'
    	);


    	$message=array(
    		'cpassword.required'=>'The confirm password is required',
    		'cpassword.min'=>'The confirm password must be at least 6 characters',
    		'cpassword.same'=>'The password must be same with confirm password',
    	);

    	$validator=validator::make($data,$rule,$message);

    	if ($validator->fails()) {
    		return Redirect::to('register')->withErrors($validator);
    	}

    	else {
    		
    		Register::formstore(Input::except(array('_token','cpassword')));

    		return Redirect::to('register')->with('success','successfully registered');
    	}
    }

    public function login(){
        //echo "login func";

        $data=Input::except(array('_token'));

        //var_dump($data);

        $rule=array(
            'email'=>'required|email',
            'password'=>'required',
        );



        $validator=validator::make($data,$rule);

        if ($validator->fails()) {
            return Redirect::to('signin')->withErrors($validator);
        }

        else {
            //$data=Input::except(array('_token'));

            $userdata=array(
                'email'=>Input::get('email'),
                'password'=>Input::get('password')

            );

            if (Auth::attempt($userdata)) {
                return Redirect::to(' ');
                //echo "yes match";
            }

            else{
                return Redirect::to('signin');
                //echo "not match";
            }

            //var_dump($data);


        }
    }
}
