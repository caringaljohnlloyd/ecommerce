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
                    'email'=> $this->request->getVar('email'),
                    'password'=> password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
                ];
                $userModel->save($data);
                return redirect()->to('/login');
            }
            else{
                $data['validation']= $this->validator;
                echo view('signup', $data);
            }
        }
        public function login(){
            helper(['form']);
            echo view('signin');
        }
         public function logout()
         {
             $session = session();
             $session->destroy();
             return redirect()->to(base_url('/login'));
         }
        
        public function LoginAuth(){
            $session = session();
            $userModel = new UserModel();
            $email = $this->request->getVar('email');
            
            $data = $userModel->where('email', $email)->first();

            if ($data) {
                $enteredpassword = $this->request->getVar('password');
            
                $hashedpass = $data['password'];
            
                if (password_verify($enteredpassword, $hashedpass)) {
                    $ses_data = [
                        'ID' => $data['email'],
                        'isLoggedin' => TRUE,
                        'userRole' => $data['role'],
                        'username' => $data['username'],
                    ];
                    $session->remove('validation_errors');
                    $session->set($ses_data);
                    if ($data['role']==='admin'){
                        return redirect()->to(base_url('/sidebar'));
                    }
                    else{
                        return redirect()->to(base_url('/'));
                    }
                }
                else{
                    $session->setFlashdata('msg', 'Password is incorrect.'); 
                    return redirect()->to(base_url('/login'));
                } 
            }
            else{
                $session->setFlashdata('msg', 'Email does not exist.');
                return redirect()->to(base_url('/login'));
            }
        }
    }