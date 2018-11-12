/**
* This is a validattion for contact page
* This is for @task1, @task2 and @task9
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

	/**
	* @task9
	* function: Toggle between hiding and showing an element
	* ref: https://www.w3schools.com/howto/howto_js_toggle_hide_show.asp
	*/
	var btnToggle = document.getElementById("btnToggle");
	btnToggle.onclick = function() {
		var btnText = this.innerHTML;
		var showText = document.getElementsByClassName("toggleElement");
		
		if (btnText == "Read More") {// show
			showText[0].classList.add("show");
			btnToggle.innerHTML = "Close";
		} else {
			// hide
			showText[0].classList.remove("show");
			btnToggle.innerHTML = "Read More";
		}
	}
}
/**
* Main Function of Validation
*/
function validForm() {
	var form = document.getElementById("form");
	var submit = document.getElementById("submitBtn");
	var errors = 0;
	var isValid = true;// no need?
	

	submit.onclick = function(e){
	// form.onsubmit = function(e){		
		// Delete all error messages
		initErrorText();
		
		// Check Name
		errors = validName(form);
		
		// Check Email
		errors += validEmail(form);
		
		// Check Comments
		errors += validComments(form);

		// errors = 0; //@test
		// if there is an error
		if (errors > 0) {
			// e.preventDefault();
			return false;
		} else {// no error

			// Pop up confirm dialog box 
			// var result = displayDialog(form);
			displayDialog(form);

			// var result = confirm('Are you sure you want to submit?\n' 
					// + getConfirmText(form), "");

			// if (!result) {
				// return false;
			// } else {
				// alert("Thank you\n" 
					// + "Your form was submitted Successfully!");
				// return true;
			// }
		return false;
		}
    }
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
		document.getElementById('errorFname').innerHTML = getErrorMsg("required");
		// firstName.focus();
		error = 1;
	}
	if (lastName.value == ""){
		document.getElementById('errorLname').innerHTML = getErrorMsg("required");
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
			= getErrorMsg("required");
		error = 1;	
	} else if (email.value.match(mailformat)) {
		// nothing to do
		// return true;
	} else {
		document.getElementById('errorEmail').innerHTML 
			= getErrorMsg("email");
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
			= getErrorMsg("required");
		error = 1;
	} else if (comments.value.length < 20) {
		document.getElementById('errorInquiry').innerHTML 
			= getErrorMsg("CommentsMin");
		error = 1;
	}
	return error;
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
	var rtn = false;
	
	// text
	var dlNode = document.createElement("dl");
	dlNode.innerHTML = getConfirmText(form);
	// insert after YES button
	dialog.insertBefore(dlNode, yes[0]);

	// pop up
	dialog.classList.add("show");
	
	
	// button
	yes[0].onclick = function() {
		// delete dialog
		dialog.classList.remove("show");
		dialog.removeChild(dlNode);

		// data submit!!!
		form.submit();
		// jump to thank you page
		location.href = "./thankyou.html";
		
		rtn = true;
		return rtn;
	};
	no[0].onclick = function() {
		// delete dialog
		dialog.classList.remove("show");
		dialog.removeChild(dlNode);
		
		rtn = false;
		return rtn;
	};

	// return rtn;
}
/**
* Create and get Error text
*/
function getErrorMsg(error) {
	var text = [];
	text = {
		"required": "This field is required.",
		"CommentsMin": "Comments should contain at least 20charactors!",
		"email": "Sorry, the email address is not recognized!",
		"submit": "There was a problem with your submission."
	};
	
	return text[error];
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
	var rtn = "<dt>First Name:</dt><dd>" + firstName + "</dd><br>"
			+ "<dt>Last Name:</dt><dd>" + lastName + "</dd><br>"
			+ "<dt>Email:</dt><dd>" + email + "</dd><br>"
			+ "<dt>Gender:</dt><dd>" + gender + "</dd><br>"
			+ "<dt>Comments:</dt><dd>" + comments + "</dd><br>"
			+ "<dt>How did you know this website?:</dt><dd>" + question + "</dd><br>";

	if (qCmnt != "") {
		// rtn += qCmnt;
		rtn += "<dd>" + qCmnt + "</dd>";   
	} else {
		// rtn += "</dl>";
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