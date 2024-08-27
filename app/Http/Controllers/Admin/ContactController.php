<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelContacts;
use App\Models\ModelOrganization;
use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Lib\CustomLib;
use App\Models\ModelCountry;
use App\Models\ModelState;
use App\Models\ModelCity;
use Nnjeim\World\Models\Country;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    private $_module = 'contacts';
    private $_model;

    public function __construct()
    {
        $this->_model = new ModelContacts();
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
    public function create(Request $request)
    {
        //
        $pageTitle = "Add ".$this->_module;
        $data['status_options']['options'] = statusDropdown();
        $data['gender_options']['options'] = genderDropdown();
        $data['user_options']['options'] = ModelUsers::dropdownList();
        $data['organization_options']['options'] = ModelOrganization::dropdownList();
        $data['country_options']['options'] = CustomLib::countryList();

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
                'name'          => 'required|max:255',
                'user_id'       => 'required|integer',
                'organization_id'=> 'required|integer',
                'gender'        => 'required|in:"male","female"',
                'date_of_birth' => 'required|date',
                'country_id'    => 'required|integer',
                'state_name'      => 'required',
                'city_name'       => 'required',
                'zip_code'      => 'required|integer',
                'address'       => 'required',
                'status'        => 'required|in:"active","inactive"',
            ]);
     
            if ($validator->fails()) {
                return redirect()->route('admin.contacts.add')
                            ->withErrors($validator)
                            ->withInput();
            }
            // Retrieve the validated input...
            $validated = $validator->validated();
    
            //get State and City ID
            $getStCtId = ModelState::getStateIdByName($request->state_name);
            $getStCityCountryId = ModelCity::getByStateId($getStCtId->country_id,$getStCtId->id);
            $addRecord = ModelContacts::addContact($request->all(),$getStCityCountryId);

            // return redirect
            return redirect('admin/contacts')->with('success','Contact has been added successfully');
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
        $pageTitle = "Edit ".$this->_module;
        $data['status_options']['options'] = statusDropdown();
        $data['gender_options']['options'] = genderDropdown();
        $data['user_options']['options'] = ModelUsers::dropdownList();
        $data['organization_options']['options'] = ModelOrganization::dropdownList();
        $data['country_options']['options'] = CustomLib::countryList();

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

    /**
     * Fetch States by COuntry
     */
    public function fetchState(Request $request)
    {
       if ($request->country_id)
       {
            $model_country = New ModelCountry();
            $country_code = $model_country->getColumnById($request->country_id,'iso2');
            $stateList = CustomLib::getStateList($country_code);
            $data['states'] = $stateList;

            return response()->json($data);
        } else {
             return response()->json(['error' => 'Country ID is missing.'], 400);
        }

    }

     /**
     * Fetch States by COuntry
     */
    public function fetchCities(Request $request)
    {    
        $getStateCountryId = ModelState::getStateIdByName($request->all());

        if($getStateCountryId){
                $stateId = $getStateCountryId->id;
                $countryId = $getStateCountryId->country_id;
                $cityList = ModelCity::getByStateAndCountry($countryId,$stateId); 
                $data['city'] = $cityList;
            return response()->json($data);
        }else{
            return response()->json(['error' => 'data is missing']);
        }
        
         
    }

}
