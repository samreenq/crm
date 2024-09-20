<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\ModelContacts;
use App\Models\ModelLead;
use App\Models\ModelOrganization;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeadController extends Controller
{
    private $_module = 'leads';
    private $_model;

    public function __construct()
    {
        $this->_model = new ModelLead();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageTitle = "Manage ". Str::camel($this->_module);
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
        $pageTitle = "Add Lead";
        $data['status_options']['options'] = statusDropdown();
        $data['gender_options']['options'] = genderDropdown();
        $data['contact_options']['options'] = ModelContacts::dropdownList();
        $data['organization_options']['options'] = ModelOrganization::dropdownList();
        $data['source_options']['options'] = leadSourceDropdown();
        $data['type_options']['options'] = leadTypeDropdown();
        $data['lead_status_options']['options'] = leadStatusDropdown();

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
        try{
            $validator = Validator::make($request->all(), [
                'name'              => 'required|max:255',
                'description'       => 'required',
                'annual_revenue'    => 'required',
                // 'annual_revenue'    => 'required|decimal:15,2',
                'source'            => 'required|in:"email","phone","contact_form","direct"',
                'type'              => 'required|in:"new_business","existing_business"',
                'contact_id'        => 'required',
                'organization_id'   => 'required',
                'expected_close_date'=> 'required|date',
                'lead_status'       =>  'required',
                'status'            => 'required|in:"active","inactive"',
            ]);
            if ($validator->fails()) {
                return redirect()->route('admin.leads.add')
                            ->withErrors($validator)
                            ->withInput();
            }
            // Retrieve the validated input...
            $validated = $validator->validated();

            // echo '<pre>'; print_r($request->all()); exit;
            $addRecord = ModelLead::addLeads($request->all());

            //echo '<pre>'; print_r($addRecord); exit;

            //return redirect
            return redirect('admin/leads')->with('success','Contact has been Added Successfully');
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
         $pageTitle = "Edit Lead";
         $data['status_options']['options'] = statusDropdown();
         $data['gender_options']['options'] = genderDropdown();
         $data['contact_options']['options'] = ModelContacts::dropdownList();
         $data['organization_options']['options'] = ModelOrganization::dropdownList();
         $data['source_options']['options'] = leadSourceDropdown();
         $data['type_options']['options'] = leadTypeDropdown();
         $data['lead_status_options']['options'] = leadStatusDropdown();

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
        try{
            $validator = Validator::make($request->all(), [
                'name'              => 'required|max:255',
                'description'       => 'required',
                'annual_revenue'    => 'required',
                'source'            => 'required|in:"email","phone","contact_form","direct"',
                'type'              => 'required|in:"new_business","existing_business"',
                'contact_id'        => 'required',
                'organization_id'   => 'required',
                'expected_close_date'=> 'required|date',
                'lead_status'       =>  'required',
                'status'            => 'required|in:"active","inactive"',
            ]);
            if ($validator->fails()) {
                return redirect()->route('admin.leads.edit')
                            ->withErrors($validator)
                            ->withInput();
            }
            // Retrieve the validated input...
            $validated = $validator->validated();

             //echo '<pre>'; print_r($validated); exit;
            $updateRecord = ModelLead::updateRecord($request->all(),$id);

            // echo '<pre>'; print_r($updateRecord ); exit;

            // return redirect
            return redirect('admin/leads')->with('success','Leads has been Updated Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
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
