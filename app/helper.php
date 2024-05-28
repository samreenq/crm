<?php

//Important Code


if(!function_exists('cD'))
    {
        function cD($data)
        {
            echo "<pre>";
            print_r($data);
            die;
        }
    }

    //stdobject to Array
    if(!function_exists('objectToArray'))
    {
        function objectToArray ($object) {
            if(!is_object($object) && !is_array($object)){
                return $object;
            }
            return array_map('objectToArray', (array) $object);
        }
    }


    //Check Numeric URL
    if(!function_exists('checkParamUrl'))
    {
        function checkParamUrl($value1,$value2,$value3="")
        {
            $redirect_url=$value2;
            if(empty($value1))
            {
                session()->flash("error","Url is empty");
                echo  redirect($redirect_url);
            }
            $url_id=substr($value1,5);

            if(empty($value3))
            $error_flash="Invalid Url";
            else
            $error_flash=$value3;

            if(!is_numeric($url_id))
            {

                session()->flash("error",$error_flash);
               echo  redirect($redirect_url);
            }

            return $url_id;

        }
    }

    if(!function_exists('urlParam'))
    {
        function urlParam($id)
        {
          return rand(10000,99999).$id;

        }
    }

    if(!function_exists('encodeTo16Char'))
    {

        function encodeTo16Char($number) {

            $characters = 'arstuvwxyzABCDESTUVWXYZ0123456789!@#^&*()';
            $base = strlen($characters);

            $code = '';
            while ($number > 0) {
                $remainder = $number % $base;
                $number = intdiv($number, $base);
                $code = $characters[$remainder] . $code;
            }

            // Pad the code with leading zeros if needed
            $code = str_pad($code, 16, 'a', STR_PAD_LEFT);

            return rtrim(strtr(base64_encode($code), '+/', '-_'), '=');
        }
    }
    if(!function_exists('decodeFrom16Char'))
    {
            function decodeFrom16Char($code)
             {
                $characters = 'arstuvwxyzABCDESTUVWXYZ0123456789!@#^&*()';
                $base = strlen($characters);

                $code = str_pad(strtr($code, '-_', '+/'), 16, 'a', STR_PAD_LEFT);
                $code = base64_decode($code);

                $number = 0;
                $length = strlen($code);
                for ($i = 0; $i < $length; $i++) {
                    $char = $code[$i];
                    $value = strpos($characters, $char);
                    $number = $number * $base + $value;
                }

                return $number;
            }
    }

    if(!function_exists('statusDropdown'))
    {
        /**
         * Status Dropdown values
         */
        function statusDropdown()
        {
           return array(
                'active' => "Active",
                'inactive' => "Inactive"
            );
        }
    }

    if(!function_exists('roleDropdown'))
    {
        /**
         * Status Dropdown values
         */
        function roleDropdown()
        {
           return array(
            'super_admin' => 'Super Admin',
            'sub_admin'  => 'Sub Admin',
            'customer' => 'Customer'
        );
        }
    }

    if(!function_exists('orgnizationTypeDropdown'))
    {
        /**
         * Organization Type
         */
        function orgnizationTypeDropdown()
        {
            return array(
                'corporation'=> 'Corporation',
                'business'=> 'Business',
                'technology'=> 'Technology',
                'healthcare'=> 'Healthcare',
                'education' => 'Education',
                'retailer' => 'Retailer',
                'service_provider' => 'Service Provider'
            );
        }
    }

    if(!function_exists('genderDropdown'))
    {
        /**
         * Status Dropdown values
         */
        function genderDropdown()
        {
           return array(
                'male' => "Male",
                'female' => "Female"
            );
        }
    }



?>
