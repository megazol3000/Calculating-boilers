function calc() {

	let warming = document.getElementById('utp').value;
	let qBath = document.getElementById('quantity').value;
	let square = document.getElementById('square').value;
	let firstNum = Math.ceil( parseFloat(warming) * parseFloat(qBath) * parseFloat(square) );

	if (firstNum <= 9 ) {
		firstValue = 10;
		} else if (firstNum <= 15 ){
		firstValue = 15;
		} else if (firstNum <= 20 ){
		firstValue = 20;
		}else if (firstNum <= 27 ){
		firstValue = 28;
		}else if (firstNum <= 41 ){
		firstValue = 41;
		}else if (firstNum <= 65 ){
		firstValue = 65;
		}else if (firstNum <= 85 ){
		firstValue = 85;
	} else {
		firstValue = 85;
	};

	var totalValue = firstValue + qBath;
	$.ajax({
        url: "calc.php?totalValue="+totalValue,
        method: "GET",
        cache: false,
        success: function(responseText){
            $('.result').html(responseText);
        }
    });		

}


	