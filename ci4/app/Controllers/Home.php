<?php

namespace App\Controllers;
use App\Models\EcommerceModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('signup');
    }
    public function home()
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

    public function register(){
        helper(['form']);
        $rules=[
            'username' =>'required|min_length[4]|max_length[100]',
            'email'=>'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'=>'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'];
            
            if($this->validate($rules)){
                $userModel = new UserModel();
                $data=[
                    'username'=> $this->request->getVar('username'),
                    'password'=> password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
                ];
                $userModel->save($data);
                return redirect()->to('/signin');
            }
            else{
                $data['validation']= $this->validator;
                echo view('signup', $data);
            }
        }
        public function Login(){
            helper(['form']);
            echo view('signin');
        }
        public function LoginAuth(){
            $session = session();
            $userModel = new UserModel(); $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            
            $data = $userModel->where('username', $username)->first();
            
            if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
            $ses_data = [
            'ID' => $data['ID'],
            'username' => $data['username'],
            'isLoggedin' => TRUE
            ];
            $session->set($ses_data); 
            return redirect()->to('/user');
            }else{
            $session->setFlashdata('msg', 'Password is incorrect.'); 
            return redirect()->to('/signin');
            } 
            }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
            }
    }
}