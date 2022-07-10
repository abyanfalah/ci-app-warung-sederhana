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

	// nama, stok, satuan
	for(let field of Object.keys(_barangMasuk[idBarang])){
		td = document.createElement("td")
		td.textContent = _barangMasuk[idBarang][field]
		td.setAttribute("data-id", idBarang)
		
		if(field == "stok"){
			td.classList.add("stok-baru")
			td.classList.add("text-right")
			td.classList.add("pr-5")
		}	

		tr.append(td)	
	}

	// append row to table
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

	let tdStok = $("#tableBarangMasuk td[data-id="+idBarang+"].stok-baru")
	let stok = _barangMasuk[idBarang].stok

	// jika input sedang di edit, batalkan fungsi
	// if (! tdStok.text()) { return false }

	// create input stok
	let input = document.createElement("input")
	input.setAttribute("type", "text")
	input.setAttribute("data-id", idBarang)
	input.classList.add("form-control")
	input.classList.add("text-right")
	input.style.width = "100px"
	input.setAttribute("value", stok)

	tdStok.empty()
	tdStok.append(input)
	input.focus()

}

function updateStok(idBarang){
	let stokBaru = $("#tableBarangMasuk input[data-id='"+idBarang+"']").val()
	if (parseInt(stokBaru) > 0) {
		_barangMasuk[idBarang].stok = stokBaru
	}
	displayStok(idBarang)
}

function displayStok(idBarang){
	let tdStok = $("#tableBarangMasuk td[data-id="+idBarang+"].stok-baru")
	tdStok.empty()
	let stok = _barangMasuk[idBarang].stok
	tdStok.text(stok)
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
		
		// kalau barang sudah ada, batalkan fungsi
		if (_barangMasuk[id]) { return false }

		_barangMasuk[id] = _barang[id]
		refreshTableBarangMasuk()
		editStokBaru(id)
	})

	// column tableBarangMASUK click action
	$(document).on("click", "#tableBarangMasuk td", function(){
		let id = $(this).attr('data-id')
		editStokBaru(id)
	})

	// input stok only number
	$(document).on("keypress", "#tableBarangMasuk input", function(e){
		let char = e.keyCode
		if (char == 13){
			let id = $(this).attr('data-id')
			updateStok(id)
		}

		if (char < 48 || char > 57) {
			return false
		}
	})

	// input stok blur (unfocus)
	$(document).on("blur", "#tableBarangMasuk input", function(){
		let id = $(this).attr('data-id')
		updateStok(id)
	})


})


$("#sectionPilihBarang").show()