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

            if(count($countries) > 0){
                    foreach($countries as $key => $value){
                        $country_list[$value['id']] = $value['name'];
                    }
            }

        }
        return $country_list;
    }

    public static function getStateList($country_code)
    {
        // if(!$country_id){
            $state_list = array();
            $world_countries_state =  World::countries([
                'fields' => 'states',
                'filters' => [
                    'iso2' =>$country_code,
                ]
            ]);

            if ($world_countries_state->success) {
                $countries_state = $world_countries_state->data;
                $countries_state = json_decode($countries_state,true);

                if(count($countries_state) > 0){
                    foreach($countries_state as $states)
                    {
                        $state_data = $states['states'];
                            foreach($state_data as $key => $state)
                            {
                                $state_list[$state['id']] = $state['name'];
                            }
                    }

                }
            }

            return $state_list;
        // }

    }

}
