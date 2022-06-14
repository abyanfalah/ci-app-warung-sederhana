$(document).ready(function(){
	
	// ==========
	// global variables

	let nama
	let telpon
	// ==========


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
					$("#modalCreatePelanggan").modal("hide")
					$("input").val("")
					console.log(res)
				}
			}
		})
	})

	// update section
	$(".btnUpdate").on("click", function(){
		$("span.pelangganName").text($(this).attr('data-nama'))

		let nama = $(this).attr('data-nama')
		let telpon = $(this).attr('data-telpon')
		let alamat = $(this).attr('data-alamat')


		
		$("#formUpdatePelanggan input[name=old_telpon]").val(telpon)

		$("#formUpdatePelanggan input[name=nama]").val(nama)		
		$("#formUpdatePelanggan input[name=telpon]").val(telpon)
		$("#formUpdatePelanggan input[name=alamat]").val(alamat)

		$("#modalUpdatePelanggan").modal('show')

		// let	data =  $("#formUpdatePelanggan").serializeArray()
		// console.log(data)
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
					$("#modalUpdatePelanggan").modal("hide")
					$("input").val("")
				}
				console.log(res)
			}
		})
	})

	// delete section
	$(".btnDelete").on("click", function(){
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
})