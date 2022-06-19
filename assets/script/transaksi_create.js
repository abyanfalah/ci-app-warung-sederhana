let _barang = {}
let _keranjang = {}
let id

$.get("/api/barang", function(res){
	for(let index of Object.keys(res)){
		_barang[res[index].id] = {}
		_barang[res[index].id].nama = res[index].nama 
		_barang[res[index].id].harga = res[index].harga 
		_barang[res[index].id].stok = res[index].stok 
	}
})


function checkStok(id){
	let btnAdd = $(".btnAddItem[data-id="+ id +"]")
	let btnPlus = $("div[data-id="+ id +"].btn-group>button.btnPlusKeranjang")

	if (_barang[id].stok < 1) {
		btnAdd.addClass("disabled")
		btnAdd.addClass("btn-secondary")

		btnPlus.addClass("disabled")
		btnPlus.addClass("btn-secondary")
	}else{
		btnAdd.removeClass("btn-secondary")
		btnAdd.removeClass("disabled")

		btnPlus.removeClass("disabled")
		btnPlus.removeClass("btn-secondary")
	}

	// set display stok di table
	$("td#"+ id +"-stok").text(_barang[id].stok)

	return _barang[id].stok
}

function createRows(){
	let counter = 1
	let tr = document.createElement("tr")
	let td = document.createElement("td")
	
	for(let id_item of Object.keys(_keranjang)){
		tr = document.createElement("tr")
		tr.setAttribute("data-id", id_item)
		tr.classList.add("bg-white")
		tr.classList.add("border-bottom-primary")

		td = document.createElement("td")
		td.textContent = counter++
		tr.append(td)

		td = document.createElement("td")
		td.textContent = id_item
		tr.append(td)

		for(let field of Object.keys(_keranjang[id_item])){
			if (field != "qty") {
				td = document.createElement("td")
				td.textContent = _keranjang[id_item][field]
				tr.append(td)
			}		
		}

		td = document.createElement("td")
	
		let btnGroup = document.createElement('div')
		btnGroup.setAttribute("data-id", id_item)
		btnGroup.classList.add('btn-group')

		// creating btn minus and append to btnGroup
		let btn = document.createElement('button')
		btn.classList.add("btn")
		btn.classList.add("btn-sm")
		btn.classList.add("btn-danger")
		btn.classList.add("btnMinusKeranjang")
		btn.innerHTML = "<strong>&minus;</strong>"
		btnGroup.append(btn)

		// creating btn input and append to btnGroup
		btn = document.createElement('button')
		btn.classList.add("btn")
		btn.classList.add("btn-sm")
		btn.classList.add("btn-light")
		btn.textContent = _keranjang[id_item].qty
		btnGroup.append(btn)

		// creating btn plus and append to btnGroup
		btn = document.createElement('button')

		let color = (_barang[id_item].stok ? "btn-primary" : "btn-secondary")
		if (! _barang[id_item].stok) {
			btn.setAttribute('disabled',true)
		}

		btn.classList.add("btn")
		btn.classList.add("btn-sm")
		btn.classList.add(color)
		btn.classList.add("btnPlusKeranjang")
		btn.innerHTML = "<strong>&plus;</strong>"
		btnGroup.append(btn)

		td.append(btnGroup)
		tr.append(td)

		$("#shoppingCart").append(tr)
	}
}

function addItemToKeranjang(id_item){
	// console.clear()
	if (! _barang[id_item].stok) { 
		console.log('stok barang sudah habis')
		return false 
	}
	
	// jika barang belum ada di keranjang
	if (! _keranjang[id_item]) {
		_keranjang[id_item] = {}
		_keranjang[id_item].nama = _barang[id_item].nama
		_keranjang[id_item].harga = _barang[id_item].harga
		_keranjang[id_item].qty = 1
	}
	// jika barang sudah ada di keranjang
	else{
		_keranjang[id_item].qty += 1
	}
	_barang[id_item].stok--
	
	updateKeranjang()
	checkStok(id_item)
}

function decreaseItemFromKeranjang(id_item){
	// console.clear()	
	if (! _keranjang[id_item].qty) { 
		console.log('barang sudah tidak ada di keranjang')
		return false 
	}

	_keranjang[id_item].qty--
	_barang[id_item].stok++

	// kalo barang dah g ada di keranjang
	if (_keranjang[id_item].qty < 1) {
		delete _keranjang[id_item]
		$("tr[data-id="+ id_item +"]").remove()
	}else{
		$(".btn-group[data-id="+ id_item +"] .btn-light").text(_keranjang[id_item].qty)
	}

	updateKeranjang()
	checkStok(id_item)
}

function updateKeranjang(){
	let counter = 1;
	let row
	$("#shoppingCart").empty()
	createRows();

	if ((Object.keys(_keranjang)).length) {
		$("#btnCheckout").attr('disabled', false)
		$("#btnCheckout").addClass('btn-success')
	}else{
		$("#btnCheckout").attr('disabled', true)
		$("#btnCheckout").removeClass('btn-succes')
	}
}

function createTableDetailTransaksi(){
	$("#tableDetailTransaksi").empty()

	let counter = 1
	let tr, td
	let total = 0
	let subtotal = 0
	
	

	for(let id_item of Object.keys(_keranjang)){

		tr = document.createElement("tr")

		td = document.createElement("td")
		td.textContent = counter++
		tr.append(td)

		td = document.createElement("td")
		td.textContent = id_item
		tr.append(td)

		for(let field of Object.keys(_keranjang[id_item])){
			td = document.createElement("td")
			td.textContent = _keranjang[id_item][field]
			tr.append(td)
		}

		td = document.createElement("td")
		subtotal = _keranjang[id_item].harga * _keranjang[id_item].qty
		td.textContent = subtotal
		td.classList.add("text-right")
		tr.append(td)
	
		$("#tableDetailTransaksi").append(tr)

		total += subtotal
	}

	$("#grandTotal").text("Rp " + total)
}

function pay(){

}


$(document).ready(function(){

	// tambah item ke keranjang
	$(document).on("click", ".btnAddItem", function(){
		id = $(this).attr('data-id')
		addItemToKeranjang(id)		
	})

	// plus item di keranjang
	$(document).on("click", ".btnPlusKeranjang", function(){
		id = $(this).parent().attr('data-id')
		addItemToKeranjang(id)
	})


	// minus item di keranjang
	$(document).on("click", ".btnMinusKeranjang", function(){
		id = $(this).parent().attr('data-id')
		decreaseItemFromKeranjang(id)
	})


	// checkout
	$(document).on("click", "#btnCheckout", function(){
		if (! Object.keys(_keranjang).length) { 
			return false 
		}
		createTableDetailTransaksi()
	})

	// bayar
	$(document).on("click", "#btnProceedCheckout", function(){
		pay()
	})


})