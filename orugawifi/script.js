function stopRobot(){

	$.get( "update_state.php", { 
		baccion: "P", 
		velocidad: "0"} );
}

function fullForward(){

	$.get( "update_state.php", { 
		baccion: "A", 
		velocidad: "220"} );
}

function reverse(){

	$.get( "update_state.php", { 
		baccion: "R", 
		velocidad: "120"} );

}

function turnLeft(){

	$.get( "update_state.php", { speedLeft: "100", 
		baccion: "I", 
		velocidad: "180"} );

}

function turnRight(){

	$.get( "update_state.php", { speedLeft: "100", 
		baccion: "D", 
		velocidad: "180"} );

}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

