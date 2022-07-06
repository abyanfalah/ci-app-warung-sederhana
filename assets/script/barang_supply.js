let _barang = {}
let _supplier = {}

function loadSupplier(){
	$("#tableListSupplier").load("/api/supplier/get_supplier_list")
}

function chooseSupplier(){	
	$("button[data-target='#modalPilihSupplier']").hide('fast')// hide button pilih supplier
	$("#btnPilihSupplierLain").slideDown('fast')
	$("#modalPilihSupplier").modal('hide')


	// isi table supplier dengan data dari object _supplier
	$("#idSupplier")	.text(_supplier.id)
	$("#namaSupplier")	.text(_supplier.nama)
	$("#telponSupplier").text(_supplier.telpon)
	$("#asalSupplier")	.text(_supplier.asal)

	$("#supplierDetail").show('fast')
	$("div#sectionPilihBarang").slideDown()
}

function loadBarang(){
	$.ajax({
		url : "/api/barang/get_all_with_capitalized_name",
		success : function(res){
			storeResult(res)
		}
	})

	// store data barang with id as the index
	function storeResult(res){
		let id
		for(let index of Object.keys(res)){
			id = res[index].id
			_barang[id] = {}

			_barang[id].nama = res[index].nama
			_barang[id].stok = res[index].stok
		}
	}
}


$(document).ready(function(){
	loadSupplier()
	loadBarang()

	// btnPilihSupplier
	$(document).on("click", ".btnPilihSupplier", function(){
		_supplier.id     = $(this).attr('data-id')
		_supplier.nama   = $(this).attr('data-nama')
		_supplier.telpon = $(this).attr('data-telpon')
		_supplier.asal   = $(this).attr('data-asal')
		chooseSupplier()
	})

	$("td").click(function(){
		let id = $(this).attr('data-id-barang')

		console.log(_barang)


	})

})


$("#sectionPilihBarang").show()