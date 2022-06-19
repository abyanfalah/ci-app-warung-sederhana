$(document).ready(function(){
	
	// ==========
	// global variables

	let nama
	let telpon
	// ==========



	function refresh(){
		// $("#tablePelanggan").html("")
		$("#tablePelanggan").load('/api/pelanggan/table')
	}

	refresh()

	function checkAllFields(formId){
		let form = "#" + formId;
		if (
			! $(form + " input[name=nama]").val() 		||
			! $(form + " input[name=telpon]").val() 	||
			! $(form + " input[name=alamat]").val()
			) {
			$(".fieldAlert").fadeIn('fast')
			return false;
		}else{
			$(".fieldAlert").fadeOut('fast')
			return true;
		}
	}

	$(".btnBatal").click(function(){
		$("input").val("")
		$(".fieldAlert").fadeOut()
	})

	// create section
	$("#btnSaveCreate").click(function(){
		if (! checkAllFields("formCreatePelanggan")) {
			return false
		}

		$.ajax({
			url: "/api/pelanggan/create",
			type: "POST",
			data: $("#formCreatePelanggan").serializeArray(),
			success: function(res){
				if (res.status == 200) {
					refresh()
					$("#modalCreatePelanggan").modal("hide")
					$("input").val("")
					console.log(res)
				}
			}
		})
	})

	// update section
	$(document).on('click', '.btnUpdate', function(){
		$("span.pelangganName").text($(this).attr('data-nama'))

		let nama = $(this).attr('data-nama')
		let telpon = $(this).attr('data-telpon')
		let alamat = $(this).attr('data-alamat')
		
		$("#formUpdatePelanggan input[name=old_telpon]").val(telpon)
		$("#formUpdatePelanggan input[name=nama]").val(nama)		
		$("#formUpdatePelanggan input[name=telpon]").val(telpon)
		$("#formUpdatePelanggan input[name=alamat]").val(alamat)

		$("#modalUpdatePelanggan").modal('show')
	})	

	$("#btnSaveUpdate").click(function(){
		if (! checkAllFields("formUpdatePelanggan")) {
			return false
		}

		$.ajax({
			url: "/api/pelanggan/update",
			type: "POST",
			data: $("#formUpdatePelanggan").serializeArray(),
			success: function(res){
				if (res.status == 200) {
					refresh()
					$("#modalUpdatePelanggan").modal("hide")
					$("input").val("")
				}
				console.log(res)
			}
		})
	})

	// delete section
	$(document).on('click', '.btnDelete', function(){
		nama = $(this).attr("data-nama")
		telpon = $(this).attr("data-telpon")
		$("span.pelangganName").text(nama)

	})

	$("#btnProceedDelete").click(function(){
		$.ajax({
			url: "/api/pelanggan/delete",
			type: "POST",
			data: {telpon: telpon},
			success: function(res){
				if (res.status == 200) {
					refresh();
					$("#modalDeletePelanggan").modal("hide")
				}
				console.log(res)
			}
		})
	})

	$("input").on({
		change: function(){
			// checkAllFields();
		},

		keypress: function(){
			// checkAllFields();
			$(".fieldAlert").fadeOut();
		}
	})


	// search section
	$("#cariPelangganInput").on(function(){
		
	})


	
	$("#cariPelangganInput").on({
		keypress: function(){
			let searchInput = $("#cariPelangganInput").val()
			let query = "SELECT * FROM pelanggan where nama like '%"+ searchInput +"%' or alamat like '%"+ searchInput +"% or telpon like '%"+ searchInput +"%'"
			$("#searchQuery").text(query)
			if (! searchInput.val()) {
				$("#searchQuery").hide()
			}else{
				$("#searchQuery").show()
			}
		},

		change: function(){
			$("#searchQuery").text(query)
		}
	})
})