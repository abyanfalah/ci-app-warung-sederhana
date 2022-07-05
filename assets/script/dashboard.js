$(document).ready(function(){
	let welcomeAlert = $("#welcomeAlert")
	if(welcomeAlert){
		setTimeout(function(){
			welcomeAlert.fadeOut()
		},2500)
	}
})