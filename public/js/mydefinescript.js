/*=================================
		---Default functions---
=================================*/

//Loader

const spinner = `<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
<span class="visually-hidden">Loading...</span>
</div>`;

// dom select

function domSelect(tagselector){
	var selected = document.querySelector(tagselector);
	return selected;
}


// Alerts
var successAlert = document.querySelector('#appAllertSuccess');
var faildAlert = document.querySelector('#appAllertFaild');


function showAllert(alertType){
	if(alertType == 'success'){
		successAlert.style.display = 'block';
		setTimeout(() => {
			successAlert.style.display = 'none';
		}, 2000);
	}else if(alertType == 'faild'){
		faildAlert.style.display = 'block';
		setTimeout(() => {
			faildAlert.style.display = 'none';
		}, 2000);
	}
}