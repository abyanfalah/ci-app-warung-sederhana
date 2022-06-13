$(document).ready(function(){
	$("#btnProceedDelete").click(function(){
		$.ajax({
			url: "/api/barang/delete",
			type: "POST",
			success: function(res){
				if(res.status == 200){
					localStorage.setItem('barang_id', res.barang_id)
					localStorage.setItem('alertMessage', 'delete')
					window.location.replace('/barang')
				}
			}
		})
	})
})