function populateOnce(sO,sT){
	var sbOne = document.getElementById(sO);
	var sbTwo = document.getElementById(sT);
	var i = sbOne.selectedIndex;
	var elem = sbOne.options[i];
	if (elem.className == 'op'){
		sbTwo.add(sbOne.options[i]);
	}
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
function showStep(){
	var sel = document.getElementById("cuisinename");
	var name = sel.options[sel.selectedIndex].value;
	var meals = document.getElementsByTagName("meal");
	var visible = document.getElementsByClassName(name);
	if (name == "All"){
		visible = meals;
	}
	for (var i = 0; i < meals.length; i++) {
		meals[i].style="display: none";
	}
	for (var i = 0; i < visible.length; i++) {
		visible[i].style="";
	}

}

function showmeal(){
	var sel = document.getElementById("mealname");
	var name = sel.options[sel.selectedIndex].value;
	var meals = document.getElementsByTagName("meal");
	var visible = document.getElementById(name);
	for (var i = 0; i < meals.length; i++) {
		meals[i].style="display: none";
	}
	visible.style="";
}