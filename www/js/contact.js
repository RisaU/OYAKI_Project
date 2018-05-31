/**
* This is a validattion for contact page
* ref(for Confirm dialog box): https://www.sejuku.net/blog/28217
*/

/**
* Initializtion
*/
function init() {
	if (!document.createElement) return false;
	if (!document.createTextNode) return false;
	if (!document.getElementById) return false;

	console.log("Initializtion is done!");
}
/**
* Main Function of Validation
*/
function validForm() {
	var submit = document.getElementById("submit");
	var form = document.getElementById("form");
	var errors = 0;
	var isValid = true;// no need?

	// submit.onclick = function(){
	form.onsubmit = function(e){
		
		
		// Delete all error messages
		initErrorText();
		
		// Check Name
		errors = validName(form);
		
		// Check Email
		errors += validEmail(form);
		
		// Check Comments
		errors += validComments(form);


		if (errors > 0) {
			isValid = false;
		} else {
			isValid = true;
		}
		
		isValid = true;// @test
		// console.log(isValid);
		
		if (!isValid) { // error
			// alert('Preventing form submission');
			e.preventDefault();
		} else {// no error
		
			// Pop up confirm dialog box 
			var result = displayDialog(form);
			// var result = confirm('Are you sure you want to submit?\n' 
								// + userAnswer, "");
			// if (!result) {
				// return false;
			// } else {
				// alert("Thank you\n" 
					// + "Your form was submitted Successfully!");
			// }
			// return false;
			
		}
		return false;
    }
}

/**
* Pop up a confirm dialog box
* ref: https://www.sejuku.net/blog/28217
* ref: http://www.atmarkit.co.jp/ait/articles/0807/02/news144.html
*/
function displayDialog(form) {
	// dialog
	var dialog = document.getElementById("contactFormDialog");
	var yes = document.getElementsByClassName("dialogYes");
	var no = document.getElementsByClassName("dialogNo");
	
	// text
	var divNode = document.createElement("div");
	divNode.innerHTML = getConfirmText(form);
	// insert after YES button
	dialog.insertBefore(divNode, yes[0]);
	

	// pop up
	dialog.classList.add("show");
	
	return true;
}

/**
* Initialize error text
*/
function initErrorText() {

	var errors = document.getElementsByClassName("errorMsg");

	for (var i=0; i<errors.length; i++) {
		// console.log(errors[i].textContent);
		errors[i].textContent = "";
	}
}
/**
* Check name format
*/
function validName(form) {
	var firstName = form["firstname"];
	var lastName = form["lastname"];
	var error = 0;

	if (firstName.value == "") {
		document.getElementById('errorFname').innerHTML = "Please enter your first name";
		// firstName.focus();
		error = 1;
	}
	if (lastname.value == ""){
		document.getElementById('errorLname').innerHTML = "Please enter your last name";
		// lastName.focus();
		error = 1;
	}
	return error;
}
/**
* Check Email format
* ref: https://www.w3resource.com/javascript/form/email-validation.php
*/
function validEmail(form) {
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var email = form['email'];
	var error = 0;
	
	if (email.value == "") {
		document.getElementById('errorEmail').innerHTML 
			= "Please enter your Email address!"
		error = 1;	
	} else if (email.value.match(mailformat)) {
		// nothing to do
		// return true;
	} else {
		document.getElementById('errorEmail').innerHTML 
			= "Sorry, '" + email.value + "' is not recognized as an Email address!"
		error = 1;
	}
	return error;
}
/**
* Check comments format
*/
function validComments(form) {
	var comments = form.inquiry;
	var error = 0;
	
	if (comments.value == "") {
		document.getElementById('errorInquiry').innerHTML 
			= "Please enter something!";
		error = 1;
	}
	if (comments.value.length < 20) {
		document.getElementById('errorInquiry').innerHTML 
			= "Comments should contain at least 20charactors!";
		error = 1;
	}
	return error;
}
/**
* Create and get confirm text 
*/
function getConfirmText(form) {
	var firstName = form["firstname"].value;
	var lastName = form["lastname"].value;
	var email = form['email'].value;
	var gender = form['gender'].value;
	var comments = form.inquiry.value;
	var question = form['search'].value;
	var qCmnt = form['other_text'].value;
/*	
	var rtn = "First Name: " + firstName + "\n"
			+ "Last Name: " + lastName + "\n"
			+ "Email: " + email + "\n"
			+ "Gender: " + gender + "\n"
			+ "Comments: " + comments + "\n"
			+ "How did you know this website?: " + question + "\n";
	
*/ 
	var rtn = "<p>First Name: " + firstName + "</p><br>"
			+ "<p>Last Name: " + lastName + "</p><br>"
			+ "<p>Email: " + email + "</p><br>"
			+ "<p>Gender: " + gender + "</p><br>"
			+ "<p>Comments: " + comments + "</p><br>"
			+ "<p>HOw did you know this website?: " + question + "</p><br>";

	if (qCmnt != "") {
		// rtn += qCmnt;
		rtn += "<p>" + qCmnt + "</p>";   
	}
	return rtn;
}
/**
* Display error text
* note: not use now..
*/
function displayError(text) {
	for (var key in text) {
		document.getElementById(key).innerHTML = text[key];
	}
}

/** *******************************************************************************
* addLoadEvent 
* ref: class script1, week7
* ref: http://thinkarc.blogspot.com.au/2008/02/addeventlistener-attachevent.html
********************************************************************************* */
function addLoadEvent(func) {
	// If addEventListener is available
	if(typeof window.addEventListener == 'function'){ 
		window.addEventListener('load', func, false);
		return true;

	// If attachEvent is available(for IE)
	} else if(typeof window.attachEvent == 'object'){
		window.attachEvent('onload', func);
		return true;
	}

	// If both're NOT available
	var oldonload = window.onload; 
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
		oldonload();
		func();
	 }
	}
}
addLoadEvent(init);
addLoadEvent(validForm);
// addLoadEvent(prepareGallery);