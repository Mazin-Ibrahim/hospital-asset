<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Asset;
use Auth;

class CheckUserController extends Controller
{
    
    public function checkRoleDoctors()
    {
        if(Auth::user()->hasRole('doctors')){

            return true;
        }

        return false;
    }


      public function checkRoleAdministrator()
    {
        if(Auth::user()->hasRole('administrator')){

            return true;
        }
            return false;
   
    }

}
