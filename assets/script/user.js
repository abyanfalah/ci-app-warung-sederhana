$(document).ready(function(){
	let message = "";
	let action = "";
	if (action = localStorage.getItem('alertMessage')) {
		switch(localStorage.getItem('alertMessage')){
			case "create":
				message = "User created"
				break;

			case "update":
				message = "User updated"
				break;

			case "delete":
				message = "User deleted"
				break;

			default:
				$("#notificationAlert").hide();
				break;
		}

		console.log(localStorage)
		console.log(message)
		$("span#alertMessage").textContent = message;
		// $("span").html = ""
		$("#notificationAlert").show();
		delete localStorage["alertMessage"];
	}
})