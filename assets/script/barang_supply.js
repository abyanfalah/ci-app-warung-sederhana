let _supplier = {}

function loadSupplier(){
	$("#tableListSupplier").load("/api/supplier/get_supplier_list")
}


$(document).ready(function(){
	loadSupplier()
	// $("#tableListSupplier").DataTable()

	// btnPilihSupplier
	$(document).on("click", ".btnPilihSupplier", function(){
		_supplier.id     = $(this).attr('data-id')
		_supplier.nama   = $(this).attr('data-nama')
		_supplier.telpon = $(this).attr('data-telpon')
		_supplier.asal   = $(this).attr('data-asal')

		
		$("button[data-target='#modalPilihSupplier']").hide('fast')// hide button pilih supplier
		$("#modalPilihSupplier").modal('hide')


		// isi table supplier dengan data dari object _supplier
		$("#idSupplier")	.text(_supplier.id)
		$("#namaSupplier")	.text(_supplier.nama)
		$("#telponSupplier").text(_supplier.telpon)
		$("#asalSupplier")	.text(_supplier.asal)

		$("#supplierDetail").show('fast')
		$("div#sectionPilihBarang").slideDown()
	})
})