$(document).ready(function(){
	if (localStorage.getItem('userCreated') == "true") {
		$("#userCreatedAlert").show();
		localStorage.setItem('userCreated', 'false')
	}
})