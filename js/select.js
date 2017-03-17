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
