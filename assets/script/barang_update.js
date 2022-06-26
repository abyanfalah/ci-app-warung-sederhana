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

	$("input").change(function(){
		checkAllFields();
	})

	$("#btnSave").click(function(e){
		e.preventDefault();
		if (! checkAllFields()) {
			return false
		}

		$.ajax({
			url: "/api/barang/update",
			type: "POST",
			data: $("#formUpdateBarang").serialize(),
			success: function(res){
				if (res.status == 200) {
					localStorage.setItem('barang_id', res.barang_id)
					localStorage.setItem('alertMessage', 'update')
					window.location.replace('/barang')
				}
			}
		})
	})
})