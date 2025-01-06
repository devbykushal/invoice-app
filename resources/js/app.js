import './bootstrap';

// left nav invoice and transaction toggle
document.getElementById("dropdownToggler").onclick = () =>{
    if(document.getElementById("dropdown").style.display === "none") {
        document.getElementById("dropdown").style.display = "flex";
    } else {
        document.getElementById("dropdown").style.display = "none";
    }
}

// // language select toggle
document.getElementById("languageTrigger").onclick = () => {
    if(document.getElementById("languageSelect").style.display === "none") {
        document.getElementById("languageSelect").style.display = "flex";
    } else {
        document.getElementById("languageSelect").style.display = "none";
    }
}

document.addEventListener('click', (e) => {
    const languageSelect = document.getElementById("languageSelect");
    const languageTrigger = document.getElementById("languageTrigger");

    if (!languageSelect.contains(e.target) && languageSelect.style.display === "flex" && e.target !== languageTrigger) {
        languageSelect.style.display = "none";
    }
});


// invoice preview

for (let i = 0; i < document.getElementsByClassName("invoice-preview").length; i++) {
    const element = document.getElementsByClassName("invoice-preview")[i];
    const invoiceId = element.getAttribute('data-id');
    element.onclick = () => {
        alert("yo"+invoiceId);
    }
}
