$(document).ready(function(){
	function checkAllFields(){
		if (
			! $("input[name=nama]").val() 		||
			! $("textarea[name=alamat]").val() 	||
			! $("input[name=lahir]").val() 		||
			! $("input[name=username]").val() 	||
			! $("input[name=password]").val() 	||
			! $("input[name=password_confirm]").val()
			) {
			$("#fieldAlert").fadeIn('fast')
			return false;
		}else{
			$("#fieldAlert").fadeOut('fast')
			return true;
		}
	}

	function checkPasswordConfirmation(){
		let confirm = $("input[name=password_confirm]")
		let origin  = $("input[name=password]")
		let message = $("#passwordConfirmationMessage")

		if (confirm.val() == origin.val()) {
			message.fadeOut("fast")
			confirm.removeClass('border-danger')
			return true
		}

		message.show()
		confirm.addClass('border-danger')
		return false
	}


	$("input[name=password_confirm]").on({
		keydown: function(){
			checkAllFields()
			checkPasswordConfirmation()
		},

		blur: function(){
			checkAllFields()
			checkPasswordConfirmation()
		}
	})

	$("#btnSave").click(function(e){
		if (! checkAllFields()) {
			return false
		}

		if (! checkPasswordConfirmation()) {
			return false;
		}

		$.ajax({
			url: "/api/user/create",
			type: "POST",
			data: $("#formCreateUser").serialize(),
			success: function(res){
				if (res.status == 200) {
					localStorage.setItem('alertMessage', 'create')
					window.location.replace('/user');
				}
			}
		})
	})
})