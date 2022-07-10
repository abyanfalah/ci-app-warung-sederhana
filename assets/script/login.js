function test(text = "test"){
	console.log(text)
}

function checkUsername(username){
	let result;
	$.ajax({
		url: __baseUrl+"/api/user/check_username",
		type: "post",
		async: false,
		data: {username: username},
		success: function(res){
			result = res.result
		}
	})
	return result
}

function checkUsernameWithPassword(username, password){
	let result;
	$.ajax({
		url: __baseUrl+"/api/user/check_username_with_password",
		type: "post",
		async: false,
		data: {
			username: username,
			password: password
		},
		success: function(res){
			result = res.result
		}
	})
	return result
}



$(document).ready(function(){
	$(document).on("click", "#btnLogin", function(e){
		e.preventDefault()
		let username =  $("input[name=username]").val()
		let password =  $("input[name=password]").val()
		let alertMessage = $("#alertMessage")

		// close alert when typing
		$(document).on("keypress", "input", function(){
			$(".alert").removeClass('show')
		})

		if(! username){
			alertMessage.text('Username harus diisi')
			$(".alert").addClass('show')
			return false;
		}

		if(! password){
			alertMessage.text('Password harus diisi')
			$(".alert").addClass('show')
			return false;
		}

		// if username doesn't exists
		if (! checkUsername(username)) {
			alertMessage.text('User tidak ditemukan')
			$(".alert").addClass('show')
			return false;
		}

		// if password is incorrect
		if (! checkUsernameWithPassword(username, password)) {
			alertMessage.text('Password salah')
			$(".alert").addClass('show')
			return false;
		}

		window.location.replace('/auth/authenticate')

	})
})