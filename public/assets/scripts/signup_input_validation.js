
function validate(form)
{
	fail = validateFirstname(form.firstname.value)
	fail += validateLastname(form.lastname.value)
	fail += validateUsername(form.username.value)
	fail += validateEmail(form.email.value)
	fail += validatePassword(form.password.value)
	
	if(fail == "")
	 return true
	else{
		document.getElementById("info").innerHTML="<span style='color: red;'>Please fill the required fields</span>";
		 return false
	}
}
		
function validateFirstname(field)
{
	return (field == "") ? document.getElementById('firstNameInfo').innerHTML="Please enter your firstname" : ""
}		
function validateLastname(field)
{
	return (field == "") ? document.getElementById('lastNameInfo').innerHTML="Please enter your lastname " : ""
}		
function validateUsername(field)
{
	if (field == "") return document.getElementById('userNameInfo').innerHTML="Please enter your username"
	else if (field.length <3 || field.length>25)
	return document.getElementById('userNameInfo').innerHTML= "Username must be between 3 - 25 characters"
	else if (/[^A-Za-z0-9 -_]/.test(field))
	return document.getElementById('userNameInfo').innerHTML= "Username can only contain Letters and numbers"
	return ""
}
function validateEmail(field)
{
	if (field == "") return document.getElementById('emailInfo').innerHTML= "Please enter your email address"
	else if (!((field.indexOf(".")>0) && (field.indexOf("@")>0)) || /[^A-Za-z0-9.@ _-]/.test(field))
	return document.getElementById('emailInfo').innerHTML= "Sorry, invalid email Address"
	return ""
}

function validatePassword(field)
{
	if (field == "") return document.getElementById('passWordInfo').innerHTML="Please enter your password"
	else if (field.length<6 || field.length>32) return document.getElementById('passWordInfo').innerHTML="Password must be between 6 to 32 characters"
	return ""
}		


// VALIDATING THE FORMAT FOR EACH FIELD
function firstNameFormat(){
	document.getElementById('firstNameInfo').innerHTML="Please use (A-Z, a-z, . _ - characters) only"

}

function phoneFormat(){
	document.getElementById('phoneInfo').innerHTML="Please use (0-9 numbers) only"

}

function countryFormat(){
	document.getElementById('countryInfo').innerHTML="Please use (A-Z, a-z characters) only"

}



function lastNameFormat(){
	document.getElementById('lastNameInfo').innerHTML="Please use (A-Z, a-z, . _ - characters) only"

}


function userNameFormat(){
	document.getElementById('userNameInfo').innerHTML="Please use (A-Z, a-z, 0-9 . _ - characters) only"

}


function emailFormat(){
	document.getElementById('emailInfo').innerHTML="Please use valid email address only"

}



// USING AJAX TO CHECK IF A USERNAME ALREADY EXIT
function userNameFormat(username){
	if(username.value==''){
		document.getElementById('userNameInfo').innerHTML='';
		return;
	}

	params = "username="+ username.value;
	request = new XMLHttpRequest();
	request.open("POST", "check_user.php", true);
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	request.onreadystatechange = function(){
		if(this.readyState==4){
			if(this.status==200){
				if(this.responseText != null){
					document.getElementById('userNameInfo').innerHTML=this.responseText;
				}
			}
		}
	}

	request.send(params);
}



// USING AJAX TO CHECK IF AN EMAIL ADDRESS ALREADY EXIT IN THE DATABASE
function emailFormat(email){
	if(email.value==''){
		document.getElementById('emailInfo').innerHTML='';
		return;
	}

	params = "email="+ email.value;
	request = new ajaxRequest();
	request.open("POST", "check_user.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	request.onreadystatechange = function(){
		if(this.readyState==4){
			if(this.status==200){
				if(this.responseText != null){
					document.getElementById('emailInfo').innerHTML=this.responseText;
				}
			}
		}
	}

	request.send(params);
}

function ajaxRequest(){
	try{
		var request = new XMLHttpRequest();
	}

	catch(e1){
		try{
			request = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e2){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e3){
				request = false;
			}
		}

	}
	return request;
}



