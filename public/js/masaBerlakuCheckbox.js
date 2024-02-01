function masaBerlakuCheckbox() {
    var checkBox = document.getElementById("masa-berlaku-checkbox");
    var date = document.getElementById("masa-berlaku-date");

    if (checkBox.checked == true) {
        date.disabled=true;
    } else {
        date.disabled=false;
    }
}
