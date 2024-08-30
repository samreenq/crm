<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ModelContacts;
use App\Models\ModelOrganization;
use Exception;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    private $_module = 'activities';
    private $_model;

    public function __construct()
    {
        $this->_model = new ModelActivities();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageTitle = "Manage Activities";
        return view("web.Admin.$this->_module.view")->with("pageTitle", $pageTitle);
    }

     /**
 * Ajax Listing
 */
    public function listAjax(Request $request)
    {
        $data = $this->_model->list();
        //echo '<pre>'; print_r($data); exit;

        return view("web.Admin.$this->_module.ajax.list", compact("data"))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $pageTitle = "Add Activity";
         $data['status_options']['options'] = statusDropdown();
         $data['contact_options']['options'] = ModelContacts::dropdownList();
         $data['organization_options']['options'] = ModelOrganization::dropdownList();
         $data['type_options']['options'] = activitiesTypeDropdown();

         return view("web.Admin.$this->_module.add")->with("pageTitle", $pageTitle)
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
        //
        try{
            $validator = Validator::make($request->all(),
            [
                'title' => 'required|unique:activities|string|max:100',
                'type' => 'required',
                'contact_id'        => 'required',
                'organization_id'   => 'required',
                'subject' => 'required|string',
                'status' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

              //Save data in model
            $data =  $this->_model->createRecord($request->all());
            if($data)
            return redirect('admin/activities')->with('success','Activity has been added successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $pageTitle = "Edit Activity";
         $data['status_options']['options'] = statusDropdown();
         $data['gender_options']['options'] = genderDropdown();
         $data['contact_options']['options'] = ModelContacts::dropdownList();
         $data['organization_options']['options'] = ModelOrganization::dropdownList();
         $data['type_options']['options'] = activitiesTypeDropdown();

        //Get User data by id
        $record = $this->_model->getById($id);

        return view("web.Admin.$this->_module.edit")->with("pageTitle", $pageTitle)
        ->with('data',$data)
        ->with('record',$record);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
