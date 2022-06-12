$(document).ready(function(){
	let message = "";
	let action = "";
	let barangId = localStorage.getItem('barang_id')
	if (action = localStorage.getItem('alertMessage')) {
		switch(localStorage.getItem('alertMessage')){
			case "create":
				message = "barang berhasil dibuat"
				break;

			case "update":
				message = barangId + " berhasil diupdate "
				break;

			case "delete":
				message = barangId + " berhasil dihapus"
				break;

			default:
				$("#notificationAlert").hide();
				break;
		}

		console.log(localStorage)
		console.log(message)
		$("#alertMessage").text(message)
		$("#notificationAlert").show();
		delete localStorage["alertMessage"];
		delete localStorage["barang_id"];
	}
})