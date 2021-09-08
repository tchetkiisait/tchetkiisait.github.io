var cookies = 0;
var cursors = 0;
var save = {
    cookies: cookies,
    cursors: cursors,
    }	
function cookieClick(number){
    cookies = cookies + number;
    document.getElementById("cookies").innerHTML = cookies;
};

function save(){
	localStorage.setItem("save",JSON.stringify(save)); 
};

function load(){
	if(savegame!=null) {
		var savegame = JSON.parse(localStorage.getItem("save"));
		if (typeof savegame.cookies !== "undefined") cookies = savegame.cookies;
		if (typeof savegame.cookies !== "undefined") cookies = savegame.cookies;
    }	
}
var cursors = 0;

function buyCursor(){
    var cursorCost = Math.floor(10 * Math.pow(1.1,cursors));     
    if(cookies >= cursorCost){                                   
        cursors = cursors + 1;                                   
    	cookies = cookies - cursorCost;                          
        document.getElementById('cursors').innerHTML = cursors;  
        document.getElementById('cookies').innerHTML = cookies;  
    };
    var nextCost = Math.floor(10 * Math.pow(1.1,cursors));       
    document.getElementById('cursorCost').innerHTML = nextCost;  
};

window.onload = load;
window.setInterval(function(){
	
	cookieClick(cursors);
	
}, 1000);