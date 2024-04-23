function validate() {
	var flag = true;

	// Pattern Same as Class
	var alpha_pattern = /^[A-Z]{1}[a-z]{2,}$/;
	var email_pattern = /^[a-z]+\d*[@]{1}[a-z]+[.]{1}(com|net){1}$/;
	var number_pattern = /^(92){1}\d{3}-{1}\d{7}$/;
	var cnic_pattern = /^[0-9]{5}-{1}\d{7}-{1}\d{1}$/;

	// DOM values
	var fname = document.querySelector("#fname").value;
	var lname = document.querySelector("#lname").value;
	var email = document.querySelector("#email").value;
	var number = document.querySelector("#number").value;
	var cnic = document.querySelector("#cnic").value;
	var textarea = document.querySelector("#textarea").value;
	var country = document.querySelector("#country").value;
	var gender = document.querySelector('input[type="radio"]:checked');
	var policy = document.querySelectorAll(".policies");
	var form = document.getElementById("form_d");

	// Span message DOM
	var fname_msg = document.querySelector("#fname_msg");
	var lname_msg = document.querySelector("#lname_msg");
	var email_msg = document.querySelector("#email_msg");
	var number_msg = document.querySelector("#number_msg");
	var cnic_msg = document.querySelector("#cnic_msg");
	var textarea_msg = document.querySelector("#textarea_msg");
	var country_msg = document.querySelector("#country_msg");
	var gender_msg = document.querySelector('#gender_msg');
	var policy_msg = document.querySelector("#policy_msg");


	// Policy Counter
	var policy_counter = 0;
	for (let loop = 0; loop < policy.length; loop++) {
		if (policy[loop].checked) {
			policy_counter++;
		}
	}


	// First Name Validation
	if(fname === ""){
		flag = false;
		fname_msg.innerHTML = "Field Required";
	}else{
		fname_msg.innerHTML = "";
		if (alpha_pattern.test(fname) === false) {
			flag = false;
			fname_msg.innerHTML = "Fisrt Name Be Like Ali/Ahmed";
		}
	}


	// Last Name Validation
	if(lname !== ""){
		if (alpha_pattern.test(lname) === false) {
			flag = false;
			lname_msg.innerHTML = "Last Name Be Like Khan/Shaikh";
		}
	}else{
		lname_msg.innerHTML = "";
	}


	// Email Validation
	if(email === ""){
		flag = false;
		email_msg.innerHTML = "Field Required";
	}else{
		email_msg.innerHTML = "";
		if (email_pattern.test(email) === false) {
			flag = false;
			email_msg.innerHTML = "Email Be Like talha20@gmail.com";
		}
	}


	//Number Validation
	if(number === ""){
		flag = false;
		number_msg.innerHTML = "Field Required";
	}else{
		number_msg.innerHTML = "";
		if (number_pattern.test(number) === false) {
			flag = false;
			number_msg.innerHTML = "Number Be Like 92306-3541336";
		}
	}


	//Cnic Validation
	if(cnic === ""){
		flag = false;
		cnic_msg.innerHTML = "Field Required";
	}else{
		cnic_msg.innerHTML = "";
		if (cnic_pattern.test(cnic) === false) {
			flag = false;
			cnic_msg.innerHTML = "CNIC Be Like 41307-0581676-7";
		}
	}


	// teaxtarea Validation
	if (textarea === "") {
		flag = false;
		textarea_msg.innerHTML = "Field Required";
	}else{
		textarea_msg.innerHTML = "";
	}


	// Country Validation
	if (country === "") {
		flag = false;
		country_msg.innerHTML = "Field Required";
	}else{
		country_msg.innerHTML = "";
	}


	// Gender Validation
	if (!gender) {
		flag = false;
		gender_msg.innerHTML = "Field Required";
	}else{
		gender_msg.innerHTML = "";
	}



	// Policy Validation
	if(policy.length !== policy_counter){
		flag = false;
		policy_msg.innerHTML = "Field Required";
	}else{
		policy_msg.innerHTML = "";
	}



	if (flag === true) {
		form.style.display = 'none';
		return true;
	}else{
		return false;
	}
}