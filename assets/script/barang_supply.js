let _barang = {}
let _barangMasuk = {}
let _supplier = {}


function loadSupplier(){
	$("#tableListSupplier").load("/api/supplier/get_supplier_list")
}

function displaySupplier(){	
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

			_barang[id].id = id
			_barang[id].nama = res[index].nama
			_barang[id].stok = res[index].stok
			_barang[id].satuan = res[index].satuan
		}
	}
}

function createRowBarangMasuk(idBarang, counter){
	let tr, td
	tr = document.createElement("tr")

	// Numbering
	td = document.createElement("td")
	td.textContent = counter
	td.setAttribute("data-id", idBarang)
	tr.append(td)

	// id
	td = document.createElement("td")
	td.textContent = idBarang
	td.setAttribute("data-id", idBarang)
	tr.append(td)

	// Nama barang
	td = document.createElement("td")
	td.textContent = _barang[idBarang].nama
	td.setAttribute("data-id", idBarang)
	tr.append(td)	

	// Stok
	td = document.createElement("td")
	td.textContent = _barang[idBarang].stok
	td.setAttribute("data-id", idBarang)
	td.classList.add("stok-baru")
	tr.append(td)

	// Satuan
	td = document.createElement("td")
	td.textContent = _barang[idBarang].satuan
	td.setAttribute("data-id", idBarang)
	tr.append(td)

	// append to table
	$("#tableBarangMasuk").append(tr)
}

function refreshTableBarangMasuk(){
	$("#tableBarangMasuk").empty()
	let counter = 1
	for(let id of Object.keys(_barangMasuk)){
		createRowBarangMasuk(id, counter)
		counter++
	}
}

function editStokBaru(idBarang){
	let input = document.createElement("input")
	input.setAttribute("type", "text")
	input.classList.add("form-control")
	input.focus

	let tdStok = $("#tableBarangMasuk td[data-id="+idBarang+"].stok-baru")

	tdStok.empty()

	tdStok.append(input)
	
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
		displaySupplier()
	})


	// column tableBarang click action
	$("#tableBarang td").click(function(){
		let id = $(this).attr('data-id')

		if (!_barangMasuk[id]) {
			_barangMasuk[id] = _barang[id]
			refreshTableBarangMasuk()
		}

		console.log(_barang[id])
	})

	// column tableBarangMASUK click action
	$(document).on("click", "#tableBarangMasuk td", function(){
		let id = $(this).attr('data-id')
		editStokBaru(id)
	})
})


$("#sectionPilihBarang").show()