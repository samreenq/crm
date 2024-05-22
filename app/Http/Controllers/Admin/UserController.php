<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelUsers;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UsersRepositoriesInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Exception;

class UserController extends Controller
{

    private $usersRepository;
    private $_model;

    public function __construct(UsersRepositoriesInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->_model = new ModelUsers();
    }

    public function list()
    {
        $pageTitle = "Manage Users";
        return view("web.Admin.users.view")->with("pageTitle", $pageTitle);
    }
    public function listUsers(Request $request)
    {
        $login_id = $request->session()->get('userId');
        $data = $this->_model->list($login_id);

        return view("web.Admin.users.ajax.users", compact("data"))->render();
    }

    /**
     * Add User
     */
    public function add()
    {
        $pageTitle = "Add Users";
        $data['status_options']['options'] = statusDropdown();
        $data['role_options']['options'] = roleDropdown();

        return view("web.Admin.users.add")->with("pageTitle", $pageTitle)
        ->with('data',$data);
    }

    /**
     * Store User
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users|max:100',
                'phone' => 'required|max:100',
                'password' => 'required|string|min:8',
                //'password_confirmation' => 'required|min:8',
               // 'address' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

               $data = $this->usersRepository->registerUser($request->all());
               if($data)
                    return redirect('admin/users')->with('success','User has been added successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }

    }

}