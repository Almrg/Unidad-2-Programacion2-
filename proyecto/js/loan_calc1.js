function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
function mostrarVentana1()
{
    var ventana = document.getElementById('miVentana'); // Accedemos al contenedor
    ventana.style.marginTop = "10px"; // Definimos su posición vertical. La ponemos fija para simplificar el código
    ventana.style.marginLeft = "150px";  // Definimos su posición horizontal
	 //ventana.style.marginLeft = ((document.body.clientWidth-1000) / 2) +  "px"; // Definimos su posición horizontal
    ventana.style.display = 'block'; // Y lo hacemos visible
	check1();
}

function ocultarVentana()
{
    var ventana = document.getElementById('miVentana'); // Accedemos al contenedor
    ventana.style.display = 'none'; // Y lo hacemos invisible
}

function printPage()
						{
							document.getElementById('print').style.visibility = 'hidden';
							// Do print the page
							if (typeof(window.print) != 'undefined') {
								window.print();
							}
							document.getElementById('print').style.visibility = '';
						}
						

function check1() { 
	var loanamt = top.document.frm_folio.monto.value;
	var paymnt = top.document.frm_folio.plazo.value;
	var rate = top.document.frm_folio.interes.value;

	if(loanamt=="" || isNaN(parseFloat(loanamt)) || loanamt==0) { 
		alert("Por favor ingrase en monto del préstamo.");
		ocultarVentana();
		return false; 
	} else if(paymnt=="" || isNaN(parseFloat(paymnt)) || paymnt==0) {
		alert("Por favor introdusca en número de pagos.");
		ocultarVentana();
		return false; 
	} else if(rate=="" || isNaN(parseFloat(rate)) || rate==0) {
		alert("porfavor incerte en interes mensual.");
		ocultarVentana();
		return false; 
	} else {
		show(); 
	}
}


function fixVal(value,numberOfCharacters,numberOfDecimals,padCharacter) { 
	var i, stringObject, stringLength, numberToPad;            // define local variables

	value=value*Math.pow(10,numberOfDecimals);                 // shift decimal point numberOfDecimals places
	value=Math.round(value);                                   //  to the right and round to nearest integer

	stringObject=new String(value);                            // convert numeric value to a String object
	stringLength=stringObject.length;                          // get length of string
	while(stringLength<numberOfDecimals) {                     // pad with leading zeroes if necessary
		stringObject="0"+stringObject;                     // add a leading zero
		stringLength=stringLength+1;                       //  and increment stringLength variable
	}

	if(numberOfDecimals>0) {			           // now insert a decimal point
		stringObject=stringObject.substring(0,stringLength-numberOfDecimals)+"."+
		stringObject.substring(stringLength-numberOfDecimals,stringLength);
	}

	if (stringObject.length<numberOfCharacters && numberOfCharacters>0) {
		numberToPad=numberOfCharacters-stringObject.length;      // number of leading characters to pad
		for (i=0; i<numberToPad; i=i+1) {
			stringObject=padCharacter+stringObject;
		}
	}

	return stringObject;                                       // return the string object
}

function show() {
	
	var amount=parseFloat(top.document.frm_folio.monto.value);
	var numpay=parseInt(top.document.frm_folio.plazo.value);
	var rate=parseFloat(top.document.frm_folio.interes.value);
 
	rate=rate/100;
	var monthly=rate;
	//var monthly=rate/12;
	var payment=((amount*monthly)/(1-Math.pow((1+monthly),-numpay)));
	var total=payment*numpay;
	var interest=total-amount;

	var output = "";
	var detail = "";

	output += "<table align='center' style='width:50%;margin:5px'> \
			<tr> <td>Importe de préstamo:</td><td align='right'>$"+amount+"</td></tr><tr><td>Num pagos:</td> \
			<td align='right'>"+numpay+"</td></tr> \
			<tr><td>Tasa mensual :</td><td align='right'>"+fixVal(monthly,0,3,' ')+"</td></tr><tr><td>Mensualidad:</td> \
			<td align='right'>$"+fixVal(payment,0,2,' ')+"</td><tr><td>Total Interes:</td> \
			<td align='right'>$"+fixVal(interest,0,2,' ')+"</td></tr></tr><tr><td>Total a pagar:</td> \
			<td align='right'>$"+fixVal(total,0,2,' ')+"</td></tr> </table>";

	detail += "<table border='0' align='center' cellpadding='5' cellspacing='0' width='90%' style='font-family:courier;font-size:12px'> \
			<tr><td align='center' valign='bottom' bgcolor='white'><b>No</b></td><td align='right' valign='bottom' bgcolor='white'><b>Pago</b></td> \
			<td align='right' valign='bottom' bgcolor='white'><b>Interes</b></td><td align='right' valign='bottom' bgcolor='white'><b>Capital</b></td> \
			<td align='right' valign='bottom' bgcolor='white'><b>Adeudo</b></td></tr><tr><td align='center' bgcolor='white'>0</td> \
			<td align='center' bgcolor='white'>&nbsp;</td><td align='center' bgcolor='white'>&nbsp;</td><td align='center' bgcolor='white'>&nbsp;</td> \
			<td align='right' bgcolor='white'>"+fixVal(amount,0,2,' ')+"</td></tr>";

	newPrincipal=amount;

	var i = 1;
	while (i <= numpay) {
		newInterest=monthly*newPrincipal;
		reduction=payment-newInterest;
		newPrincipal=newPrincipal-reduction;
		
		detail += "<tr><td align='center'>"+i+"</td><td align='right' bgcolor='white'>"+fixVal(payment,0,2,' ')+"</td> \
				<td align='right' bgcolor='white'>"+fixVal(newInterest,0,2,' ')+"</td> \
				<td align='right' bgcolor='white'>"+fixVal(reduction,0,2,' ')+"</td> \
				<td align='right' bgcolor='white'>"+fixVal(newPrincipal,0,2,' ')+"</td></tr>";

		i++;
	}

	detail += "</table>";

	document.getElementById("pmt").innerHTML = output;
	document.getElementById("det").innerHTML = detail;
}
