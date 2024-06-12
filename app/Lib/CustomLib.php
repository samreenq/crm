<?php
namespace App\Lib;
use Nnjeim\World\World;

Class CustomLib {

    /**
     * Getting country List
     */
public static function countryList()
{
    $country_list = array();
    $world_countries =  World::countries();
       
        if ($world_countries->success) {
          $countries = $world_countries->data;
          $countries = json_decode($countries,true);
          //echo '<pre>'; print_r($countries); exit;

          if(count($countries) > 0){
                foreach($countries as $key => $value){
                    $country_list[$value['id']] = $value['name'];
                }
          }

    }
    return $country_list;
    }

}