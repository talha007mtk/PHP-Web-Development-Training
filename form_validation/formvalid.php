<?php

if (isset($_POST['register'])) {
    $flag = true;
    extract($_POST);

    // Pattern same as Class
    $alpha_pattern = "/^[A-Z]{1}[a-z]{2,}$/";
    $email_pattern = "/^[a-z]+\d*[@]{1}[a-z]+[.]{1}(com|net){1}$/";
    $number_pattern = "/^(92){1}\d{3}-{1}\d{7}$/";
    $cnic_pattern = "/^[0-9]{5}-{1}\d{7}-{1}\d{1}$/";


    // Span message
    $fname_msg = null;
    $lname_msg = null;
    $email_msg = null;
    $number_msg = null;
    $cnic_msg = null;
    $about_msg = null;
    $country_msg = null;
    $gender_msg = null;
    $policy_msg = null;


    // First Name Validation
    if ($fname == "") {
        $flag = false;
        $fname_msg = "Field Required";
    } else {
        $fname_msg = "";
        if (!preg_match($alpha_pattern, $fname)) {
            $flag = false;
            $fname_msg = "First Name Should Be Like Ali/Ahmed";
        }
    }


    // Last Name Validation
    if ($lname !== "") {
        if (!preg_match($alpha_pattern, $lname)) {
            $flag = false;
            $lname_msg = "Last Name Be Like Khan/Shaikh";
        }
    }else{
    	$lname_msg = "";
    }


    // Email Validation
	if($email == ""){
    $flag = false;
    $email_msg = "Field Required";
	} else {
	    if (!preg_match($email_pattern, $email)) {
	        $flag = false;
	        $email_msg = "Email Be Like talha20@gmail.com";
	    }
	}


	//Number Validation
	if($number == ""){
		$flag = false;
		$number_msg = "Field Required";
	}else{
		$number_msg = "";
		if (!preg_match($number_pattern, $number)) {
			$flag = false;
			$number_msg = "Number Be Like 92306-3541336";
		}
	}



	//Cnic Validation
	if($cnic == ""){
		$flag = false;
		$cnic_msg = "Field Required";
	}else{
		$cnic_msg = "";
		if (!preg_match($cnic_pattern, $cnic)) {
			$flag = false;
			$cnic_msg = "CNIC Be Like 41307-0581676-7";
		}
	}



	// teaxtarea Validation
	if ($about == "") {
		$flag = false;
		$about_msg = "Field Required";
	}else{
		$about_msg = "";
	}



	// Country Validation
	if ($country == "") {
		$flag = false;
		$country_msg= "Field Required";
	}else{
		$country_msg = "";
	}


	// Gender Validation
	if (!isset($gender)) {
		$flag = false;
		$gender_msg = "Field Required";
	}else{
		$gender_msg = "";
	}



	// Policy Validation
	if (!isset($policies)) {
        $flag = false;
        $policy_msg = "Field Required";
    } elseif (count($policies) < 4) {
        $flag = false;
        $policy_msg = "You must agree to all policies";
    }

		if ($flag == true){
			$data = true;		
		}
}
?>