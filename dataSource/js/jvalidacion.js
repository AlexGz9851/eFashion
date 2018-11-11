	function validacion() {

	
var inputNtarjeta = document.forms["logUp"]["Tarjeta"].value;   
var tarjeta = document.forms["logUp"]["banco"].value; 
 

   
   
	
	if(tarjeta==1){
	if(!/^3[47][0-9]{13}$/.test(inputNtarjeta))
	{
	alert("el numero de tarjeta no corresponde a American Express");
	return false;
	}
	}
	
	
	if(tarjeta==2){
	if(!/^4[0-9]{12}(?:[0-9]{3})?$/.test(inputNtarjeta))
	{
	alert("el numero de tarjeta no corresponde a Visa");
	return false;
	}
	}
	
	if(tarjeta==3){
	if(!/^(?:5[1-9][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/.test(inputNtarjeta))
	{
	alert("el numero de tarjeta no corresponde a MasterCard");
	return false;
	}
	}	
	

    return true;}

