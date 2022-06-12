$(document).ready(function(){
	function checkAllFields(){
		if (
			! $("input[name=nama]").val() 		||
			! $("textarea[name=alamat]").val() 	||
			! $("input[name=lahir]").val() 		
			)
		{
				$("#fieldAlert").fadeIn('fast')
				return false;
		}else{
				$("#fieldAlert").fadeOut('fast')
				return true;
		}
	}

	$("input").change(function(){
		checkAllFields();
	})

	// function checkPasswordConfirmation(){
	// 	let confirm = $("input[name=password_confirm]")
	// 	let origin  = $("input[name=password]")
	// 	let message = $("#passwordConfirmationMessage")

	// 	if (confirm.val() == origin.val()) {
	// 		message.fadeOut("fast")
	// 		confirm.removeClass('border-danger')
	// 		return true
	// 	}

	// 	message.show()
	// 	confirm.addClass('border-danger')
	// 	return false
	// }


	// $("input[name=password_confirm]").on({
	// 	keydown: function(){
	// 		checkAllFields()
	// 		checkPasswordConfirmation()
	// 	},

	// 	blur: function(){
	// 		checkAllFields()
	// 		checkPasswordConfirmation()
	// 	}
	// })

	$("#btnSave").click(function(e){
		e.preventDefault();
		if (! checkAllFields()) {
			return false
		}

		$.ajax({
			url: "/api/user/update",
			type: "POST",
			data: $("#formUpdateUser").serialize(),
			success: function(res){
				// if (res.status == 200) {
				// 	// localStorage.setItem('user_id', res.user_id)
				// 	// localStorage.setItem('alertMessage', 'update')
				// 	// console.log(res)
				// 	// window.location.replace('http://localhost:8000/user')

				// }

				console.log(res)
			}
		})
	})
})