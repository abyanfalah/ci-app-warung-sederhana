$(document).ready(function(){
	$("#btnProceedDelete").click(function(){
		$.ajax({
			url: __baseUrl+"/api/user/delete",
			type: "POST",
			success: function(res){
				if(res.status == 200){
					localStorage.setItem('user_id', res.user_id)
					localStorage.setItem('alertMessage', 'delete')
					window.location.replace(__baseUrl+'/user')
				}
				console.log(res)
			}
		})
	})
})