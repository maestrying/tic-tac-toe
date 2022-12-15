let close;
function dropMenu() {
    document.getElementById('myDropdown').style="display: flex; position: absolute; flex-direction: column;";
    if (close == true) {
        document.getElementById('myDropdown').style="display: none;";
        close = false;
    } else {
        close = true;
    }
}