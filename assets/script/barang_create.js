$(document).ready(function(){
	function checkAllFields(){
		if (
			! $("input[name=nama]").val() 		||
			! $("input[name=harga]").val()
		) {
			$("#fieldAlert").fadeIn('fast')
			return false;
		}else{
			$("#fieldAlert").fadeOut('fast')
			return true;
		}
	}

	$("#btnSave").click(function(e){
		e.preventDefault();
		if (! checkAllFields()) {
			return false
		}

		$.ajax({
			url: "/api/barang/create",
			type: "POST",
			data: $("#formCreateBarang").serialize(),
			success: function(res){
				if (res.status == 200) {
					localStorage.setItem('alertMessage', 'create')
					window.location.replace(__baseUrl+'/barang');
				}
				console.log(res)
			}
		})
	})
})