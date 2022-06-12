$(document).ready(function(){
	$("#btnProceedDelete").click(function(){
		$.ajax({
			url: "/api/user/delete",
			type: "POST",
			success: function(res){
				if(res.status == 200){
					localStorage.setItem('user_id', res.user_id)
					localStorage.setItem('alertMessage', 'delete')
					// window.location.replace('http://localhost:8000/user')
					window.location.replace('/user')
				}
				console.log(res)
			}
		})
	})
})