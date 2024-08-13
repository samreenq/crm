<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ModelContacts;
use App\Models\ModelOrganization;

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
