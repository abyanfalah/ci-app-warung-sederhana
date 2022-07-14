let _barang = {}
let _barangMasuk = {}
let _supplier = {}


function loadSupplier(){
	$("#tableListSupplier").load(__baseUrl+"/api/supplier/get_supplier_list")
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
		url : __baseUrl+"/api/barang/get_all_with_capitalized_name",
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
		td.setAttribute("data-id", idBarang)
		td.textContent = _barangMasuk[idBarang][field]
		
		if(field == "stok"){
			td.classList.add("stok-baru")
			td.classList.add("text-right")
			td.classList.toggle("pr-3")
		}

		tr.append(td)	
	}

	// btn hapus item
	td = document.createElement("td")
	td.innerHTML = "&times"
	td.classList.add("btnDelete")
	td.classList.add("align-items-center")
	td.classList.add("justify-content-center")
	td.setAttribute("data-id", idBarang)

	// hover this td
	td.addEventListener("mouseenter", function(){
		this.classList.add("bg-danger")
		this.classList.add("text-white")
	})
	td.addEventListener("mouseleave", function(){
		this.classList.remove("bg-danger")
		this.classList.remove("text-white")
	})

	tr.append(td)

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

	// create input stok
	let input = document.createElement("input")
	input.setAttribute("type", "text")
	input.setAttribute("data-id", idBarang)
	
	input.classList.add("form-control")
	input.classList.add("text-right")
	input.classList.add("bg-warning")
	input.style.color = "black"
	
	input.style.width = "100px"
	
	if (stok > 0) {
		input.setAttribute("value", stok)
	}

	tdStok.empty()
	tdStok.append(input)
	input.focus()

}

function updateStok(idBarang){
	let stokBaru = $("#tableBarangMasuk input[data-id='"+idBarang+"']").val()
	stokBaru = parseInt(stokBaru)
	if (stokBaru > 0) {
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

function getUsername(){
	let username
	$.ajax({
		url : __baseUrl+"/api/user/get_current_username",
		async: false,
		success : function(res){
			username = res.username
		}
	})
	return username
}

function authenticate(){
	let username = getUsername()
	let password = $("form input[type=password][name=passwordConfirmation]").val()

	let result;
	$.ajax({
		url: __baseUrl+"/api/user/check_username_with_password",
		type: "post",
		async: false,
		data: {
			username: username,
			password: password
		},
		success: function(res){
			result = res.result
		}
	})
	return result
}

function updateDatabaseStok(){
	console.log("======Update barang======")
	for(let id of Object.keys(_barangMasuk)){
		let stokBaru = parseInt(_barang[id].stok) + _barangMasuk[id].stok
		$.ajax({
			url : __baseUrl + "/api/barang/update_stok",
			type: "post",
			data: {
				id: id,
				stok: stokBaru
			},
			async: false,
			success: function(res){
				console.log(res)
			}
		})
	}
	console.log("======END OF Update barang+++++++")
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

		// deepcopy the obj
		_barangMasuk[id] = JSON.parse(JSON.stringify(_barang[id]))
		_barangMasuk[id].stok = 0

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

	// btn hapus item dari list barang masuk
	$(document).on("click", "#tableBarangMasuk .btnDelete", function(){
		let id = $(this).attr("data-id")
		delete _barangMasuk[id]
		refreshTableBarangMasuk()
	})

	// btn simpan
	$("#btnSimpan").click(function(){
		let adaBarangMasuk = Object.keys(_barangMasuk).length
		if (! adaBarangMasuk) { return false }
	})

	// btn batal
	$(".btnCancelConfirmation").click(function(){
		$(".btnConfirmationSection").show('fast')
		$("#requirePasswordSection").hide('fast')
		$("#wrongPasswordMessage").hide('fast')
		$("form input[type=password][name=passwordConfirmation]").val('')
	})

	// btn simpan > ya
	$("#btnConfirmUpdate").click(function(){
		$(".btnConfirmationSection").hide('fast')
		$("#requirePasswordSection").show('fast')
		$("form input[type=password][name=passwordConfirmation]").focus()
	})

	// autentikasi password
	$("form #btnPasswordConfirmation").click(function(event){
		event.preventDefault()
		if (authenticate()) {
			updateDatabaseStok()
			$("#modalConfirmation").modal('hide')
			for(let barang in _barangMasuk) delete _barangMasuk[barang]
		}else{
			$("#wrongPasswordMessage").show('fast')
		}

	})

	// when typing password
	$("form input[type=password][name=passwordConfirmation]").keypress(function(){
		$("#wrongPasswordMessage").hide('fast')
	})



})

