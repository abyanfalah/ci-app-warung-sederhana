// ==========
	// global variables

	let id, nama, telpon, asal, action
	// ==========

function refresh(){
	$("#tableSupplier").load("/api/supplier/table")
}

function checkAllFields(formId){
	let form = "#" + formId;
	if (
		! $(form + " input[name=nama]").val() 		||
		! $(form + " input[name=telpon]").val() 	||
		! $(form + " input[name=asal]").val()
		) {
		$(".fieldAlert").fadeIn('fast')
		return false;
	}else{
		$(".fieldAlert").fadeOut('fast')
		return true;
	}
}

function alert(action){
	switch(action){
			case "create":
				message = "Supplier berhasil dibuat"
				break;

			case "update":
				message = nama + " berhasil diupdate "
				break;

			case "delete":
				message = nama + " berhasil dihapus"
				break;

			default:
				$("#notificationAlert").hide();
				break;
		}

		$("#alertMessage").text(message)
		$("#notificationAlert").show();
		setTimeout(function(){
			$("#notificationAlert").fadeOut();
		}, 2500)
		
}

$(document).ready(function(){

	refresh()

	$(".btnBatal").click(function(){
		$("input").val("")
		$(".fieldAlert").fadeOut()
	})

	// create section
	$("#btnSaveCreate").click(function(){
		if (! checkAllFields("formCreateSupplier")) {
			return false
		}

		$.ajax({
			url: "/api/supplier/create",
			type: "POST",
			data: $("#formCreateSupplier").serializeArray(),
			success: function(res){
				if (res.status == 200) {
					refresh()
					$("#modalCreateSupplier").modal("hide")
					alert('create')
					$("input").val("")
					console.log(res)
				}
			}
		})
	})

	// update section
	$(document).on('click', '.btnUpdate', function(){
		$("span.supplierName").text($(this).attr('data-nama'))

		id = $(this).attr('data-id')
		nama = $(this).attr('data-nama')
		telpon = $(this).attr('data-telpon')
		asal = $(this).attr('data-asal')
		
		$("#formUpdateSupplier input[name=nama]").val(nama)		
		$("#formUpdateSupplier input[name=telpon]").val(telpon)
		$("#formUpdateSupplier input[name=asal]").val(asal)

		$("#modalUpdateSupplier").modal('show')
	})	

	$("#btnSaveUpdate").click(function(){
		let data = $("#formUpdateSupplier").serializeArray()

		if (! checkAllFields("formUpdateSupplier")) {
			return false
		}

		// add id to data[] at the first index
		id = {name: "id", value: id}
		data.unshift(id)

		$.ajax({
			url: "/api/supplier/update",
			type: "POST",
			data: data,
			success: function(res){
				if (res.status == 200) {
					refresh()
					$("#modalUpdateSupplier").modal("hide")
					alert('update')
					$("input").val("")
				}
				console.log(res)
			}
		})
	})

	// delete section
	$(document).on('click', '.btnDelete', function(){
		nama = $(this).attr("data-nama")
		id = $(this).attr("data-id")
		$("span.supplierName").text(nama)

	})

	$("#btnProceedDelete").click(function(){
		$.ajax({
			url: "/api/supplier/delete",
			type: "POST",
			data: {id: id},
			success: function(res){
				if (res.status == 200) {
					refresh();
					$("#modalDeleteSupplier").modal("hide")
					alert('delete')
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
	$("#cariSupplierInput").on(function(){
		
	})


	
	$("#cariSupplierInput").on({
		keypress: function(){
			let searchInput = $("#cariSupplierInput").val()
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