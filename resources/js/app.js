import './bootstrap';

document.getElementById("dropdownToggler").onclick = () =>{
    if(document.getElementById("dropdown").style.display === "none") {
        document.getElementById("dropdown").style.display = "flex";
    } else {
        document.getElementById("dropdown").style.display = "none";
    }
}
