$(document).ready(function(){
	let message = "";
	let action = localStorage.getItem('alertMessage')
	let barangId = localStorage.getItem('barang_id')
	if (action) {
		switch(action){
			case "create":
				message = "Barang berhasil dibuat"
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

		$("#alertMessage").text(message)
		$("#notificationAlert").show();
		setTimeout(function(){
			$("#notificationAlert").fadeOut();
		}, 2500)
		delete localStorage["alertMessage"];
		delete localStorage["barang_id"];
	}
})