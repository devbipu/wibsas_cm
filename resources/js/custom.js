/********

Name: js files for upload data and select data

Version: 1.0.0

*********/





/*=================================
		---Default functions---
=================================*/

// dom select

function domSelect(tagselector){
	var selected = document.querySelector(tagselector);
	return selected;
}

//get modal

// function catchModal(modalId){
// 	const myModalEl = document.querySelector(modalId)
// 	let modal = new bootstrap.Modal(myModalEl);
// 	return modal;
// }


//Loader

const spinner = `<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
<span class="visually-hidden">Loading...</span>
</div>`;

/*=================================
		---Clients js----
=================================*/

window.addEventListener('DOMContentLoaded', (event) => {
    showAllClients()
});







const myModalEl = document.getElementById('addClientModel');
let modal = new bootstrap.Modal(myModalEl);

var clientDatas = domSelect('#addClientsForm').addEventListener('submit', (e)=>{
	e.preventDefault();


	const form = domSelect('#addClientsForm');
	const data = Object.fromEntries(new FormData(form).entries());
	
	domSelect('#addClientBtn').innerHTML= spinner;

	

	axios.post('/addclients', data)
	.then((res) => {
		domSelect('#addClientBtn').innerHTML='Save Changes';
		if(res.status == 200){
			document.getElementById("addClientsForm").reset();
			modal.hide();
			showAllClients()
		}
	})
	.catch((error) => {
		console.log(error)
	})
})



function showAllClients(){

	axios.get('/all-clients')
	.then((res) => {
		var allClients = res.data;
		var tableRows = domSelect('#clientsTable tbody');
		tableRows.innerHTML = "";
		for(var client in allClients){
			console.log(allClients[client])
			tableRows.innerHTML += "<tr><td>"+
			client +
			"</td> <td> <a href ='clients/"+ allClients[client].id +" ' >"+ allClients[client].client_name +
			"</td><td>"+ allClients[client].contact_name + 
			"</td><td>"+ allClients[client].contact_number + 
			"</td><td>"+ allClients[client].client_address + 
			"</td></tr>"
		}
	})
	.catch((e) => {
		console.log(e);
	})
}
