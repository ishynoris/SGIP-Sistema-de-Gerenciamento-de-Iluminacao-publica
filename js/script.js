
/*! Script usado no arquivo registarOcorrencia.php */
// var currentDiv = 0;
			
// function activateButton(button){
	// btn-default disabled block-button
	// if(button.classList.contains("disabled")){
		// button.classList.remove("disabled");
	// }
	// if(button.classList.contains("block-button")){
		// button.classList.remove("block-button");
	// }
	// if(button.classList.contains("btn-default")){
		// button.classList.remove("btn-default");
	// }
	// btn-primary
	// button.classList.add("btn-primary");
// }

// function disabledButton(button){
	// btn-primary
	// if(button.classList.contains("btn-primary")){
		// button.classList.remove("btn-primary");
	// }
	// btn-default disabled block-button
	// button.classList.add("disabled");
	// button.classList.add("block-button");
	// button.classList.add("btn-default");
// }

// function removeHide(id, array){
	// div = document.getElementById(id);
	// div.classList.remove("hide");
	// for(var i = 0; i < array.length; i++){
		// div = document.getElementById(array[i]);
		// div.classList.add("hide");
	// }
// }

// function updateDivs(){
	
	// switch(currentDiv){
		// case 0:
			// document.getElementById("progress-bar").style.width = "20%";
			// removeHide("step-0", new Array("step-1", "step-2", "step-3", "step-4"));
		// break;
		// case 1:
			// document.getElementById("progress-bar").style.width = "40%";
			// removeHide("step-1", new Array("step-0", "step-2", "step-3", "step-4"));
		// break;
		// case 2:
			// document.getElementById("progress-bar").style.width = "60%";
			// removeHide("step-2", new Array("step-0", "step-1", "step-3", "step-4"));
		// break;
		// case 3:
			// document.getElementById("progress-bar").style.width = "80%";
			// removeHide("step-3", new Array("step-0", "step-1", "step-2", "step-4"));
		// break;
		// case 4:
			// document.getElementById("progress-bar").style.width = "100%";
			// removeHide("step-4", new Array("step-0", "step-1", "step-2", "step-3"));
		// break;
	// }
// }

// function imprimir(value){
	// window.alert("[" + value + "]");
// }
function start(){
	window.alert("start");
	// activateButton(document.getElementById("li-" + currentDiv));
	// activateButton(document.getElementById("btn-next"));
	// disabledButton(document.getElementById("btn-previous"));
		
	// div = document.getElementById("step-0");
	// if(div.classList.contains("hide")){
		// div.classList.remove("hide");
	// }
	
	// var nLi = $(".nav-pills li").length;
	
	// for(var i = 1; i < nLi; i++){
		// disabledButton(document.getElementById("li-" + i));
	// }
}

function next(){
		
	window.alert("next");
	// disabledButton(document.getElementById("li-" + currentDiv++));
	// activateButton(document.getElementById("li-" + currentDiv));
	
	// if(currentDiv > 0){
		// activateButton(document.getElementById("btn-previous"));
	// }
	// if(currentDiv == 4){
		// disabledButton(document.getElementById("btn-next"));
	// }
	// updateDivs();
	
}

function previous(){
	window.alert("previous");
	// disabledButton(document.getElementById("li-" + currentDiv--));
	// activateButton(document.getElementById("li-" + currentDiv));
	
	// if(currentDiv == 0){
		// disabledButton(document.getElementById("btn-previous"));
	// }
	// if(currentDiv < 5){
		// activateButton(document.getElementById("btn-next"));
	// }
	// updateDivs();
}