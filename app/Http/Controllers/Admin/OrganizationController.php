<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelOrganization;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    private $_model;

    public function __construct()
    {
        $this->_model = new ModelOrganization();
    }
    /**
     * Listing
     */
    public function list()
    {
        $pageTitle = "Manage Organization";
        return view("web.Admin.organization.view")->with("pageTitle", $pageTitle);
    }
/**
 * Ajax Listing
 */
    public function listAjax(Request $request)
    {
        $data = $this->_model->list();
        //echo '<pre>'; print_r($data); exit;

        return view("web.Admin.organization.ajax.list", compact("data"))->render();
    }

     /**
     * Add organization
     */
    public function add()
    {
        $pageTitle = "Add Organization";
        $data['status_options']['options'] = statusDropdown();
        $data['type_options']['options'] = orgnizationTypeDropdown();

        return view("web.Admin.organization.add")->with("pageTitle", $pageTitle)
        ->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users|max:100',
                'phone' => 'required|max:100',
                'no_of_employees' => 'required|integer',
                'annual_revenue' => 'required',
                'address' => 'required',
                'status' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

              //Save data in model
            $data =  $this->_model->createRecord($request->all());
            if($data)
            return redirect('admin/organization')->with('success','Organization has been added successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }

    }
}
