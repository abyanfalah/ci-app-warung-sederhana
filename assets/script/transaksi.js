function getBarang(id_barang){
	let barang
	$.ajax({
		url : __baseUrl+"/api/barang/index/" + id_barang,
		type: "get",
		async: false,
		success: function(res){
			barang = res
		}
	})
	return barang
}

function getDetailTransaksi(id_transaksi){
	// get detail
	let detail_transaksi = {}

	$.ajax({
		url : __baseUrl+"/api/transaksi/get_detail/" + id_transaksi,
		type: "get",
		async: false,
		success: function(res){
			detail_transaksi = res
			console.log(res)
		}
	})

	// get nama, harga dan subtotal
	let nama_item
	let harga_item
	let qty

	for(let item of Object.keys(detail_transaksi)){
		barang = getBarang(detail_transaksi[item].id_barang)
		nama_item = barang.nama
		harga_item = barang.harga
		qty = detail_transaksi[item].qty

		detail_transaksi[item].nama = nama_item
		detail_transaksi[item].harga = harga_item
		detail_transaksi[item].subtotal = harga_item * qty
	}

	return detail_transaksi;
}


function createTableDetail(id_transaksi){
	let detail_transaksi = getDetailTransaksi(id_transaksi)
	let tr, td
	let counter = 1

	$("#tableDetailTransaksi").empty()
	
	for(let item of Object.keys(detail_transaksi)){
		tr = document.createElement('tr')

		td = document.createElement('td')
		td.textContent = counter++
		tr.append(td)

		td = document.createElement('td')
		td.textContent = detail_transaksi[item].id_barang
		tr.append(td)

		td = document.createElement('td')
		td.textContent = detail_transaksi[item].nama
		tr.append(td)

		td = document.createElement('td')
		td.classList.add("text-right")
		td.textContent = detail_transaksi[item].harga
		tr.append(td)

		td = document.createElement('td')
		td.textContent = detail_transaksi[item].qty
		tr.append(td)

		td = document.createElement('td')
		td.classList.add("text-right")
		td.textContent = detail_transaksi[item].subtotal
		tr.append(td)


		$("#tableDetailTransaksi").append(tr)
	}
}

$(document).ready(function(){

	// show detail
	$(document).on("click", ".btnShowDetail", function(){
		let transaksi = {}
		let id_transaksi = $(this).attr("data-id")
		$.ajax({
			url : __baseUrl+"/api/transaksi/index/" + id_transaksi,
			type: "get",
			async : false,
			success: function(res){
				$("#viewIdTransaksi").text(id_transaksi)
				$("#viewNamaPelanggan").text(res.pelanggan)
				$("#viewNamaKasir").text(res.user)
				$("#viewGrandTotal").text(res.total)
				
				createTableDetail(id_transaksi)

				$("#modalView").modal("show")
			}
		})

	})
})