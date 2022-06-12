$(document).ready(function(){
	let message = "";
	let action = "";
	let userId = localStorage.getItem('user_id')
	if (action = localStorage.getItem('alertMessage')) {
		switch(localStorage.getItem('alertMessage')){
			case "create":
				message = "User berhasil dibuat"
				break;

			case "update":
				message = userId + " berhasil diupdate "
				break;

			case "delete":
				message = userId + " berhasil dihapus"
				break;

			default:
				$("#notificationAlert").hide();
				break;
		}

		console.log(localStorage)
		console.log(message)
		$("#alertMessage").text(message)
		$("#notificationAlert").show();
		delete localStorage["alertMessage"];
		delete localStorage["user_id"];
	}
})