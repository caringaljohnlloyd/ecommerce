<?php

namespace App\Controllers;
use App\Models\EcommerceModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function shop(){
        $model = new EcommerceModel();
        $data['products'] = $model->findAll();

        
       return view('forshop', $data);
    }
    public function about(){
        return view('forabout');
    }
    public function blog(){
        return view('forblog');
    }
    public function contact(){
        return view('forcontact');
    }

   

}
