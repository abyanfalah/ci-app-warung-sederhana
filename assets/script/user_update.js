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
				if (res.status == 200) {
					localStorage.setItem('user_id', res.user_id)
					localStorage.setItem('alertMessage', 'update')
					// window.location.replace('http://localhost:8000/user')
					window.location.replace('/user')

				}
			}
		})
	})
})