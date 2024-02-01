function randomNik(){

    var nik = document.getElementById("nik");
    var randomNumber = 0;

    for( var i = 0 ; i < 16 ; i++ ){
        var random = Math.floor(Math.random() * 10);
        randomNumber = (randomNumber + random).toString();
    }
    nik.value = randomNumber;

    console.log("random Number for NIK : " + randomNumber);
}
