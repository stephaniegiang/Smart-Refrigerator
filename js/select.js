function populateOnce(sO,sT){
	var sbOne = document.getElementById(sO);
	var sbTwo = document.getElementById(sT);
	var i = sbOne.selectedIndex;
	sbTwo.add(sbOne.options[i]);
}

function populateAll(sO,sT){
	
	var sbOne = document.getElementById(sO);
	var sbTwo = document.getElementById(sT);
	var i = sbOne.selectedIndex;
	sbTwo.add(sbOne.options[i]);		
}

function removeElement(){
	var sb = document.getElementById("sbOne");
	sbOne.remove(sbOne.selectedIndex);
}


function complete(){
	setTimeout(showcomplete, 2000);
}
function showcomplete(){
	var complete = document.getElementById("confirm");
	complete.className="confirm";
	setTimeout(function(){
		var complete = document.getElementById("confirm");
		complete.className="";
	}, 10000);
}

//used for chef report page
function showStep(step){
document.getElementById(step).style.visibility = 'visible';		
}


