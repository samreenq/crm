<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelOrganization;
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
}
