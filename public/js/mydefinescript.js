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