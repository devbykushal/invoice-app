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
        openModal(invoiceId);
    }
}

// modal
function openModal(invoiceId){
    const modal = document.getElementById("modal");
    const invoiceData = invoices.find(i => i.id == invoiceId);
    const modalContent = document.getElementById("modalContent");
    modalContent.innerHTML = `<h2 class="flex justify-between font-bold text-2xl">
        <span>${toCurrentLang('invoice')} #${invoiceData.id}</span> ${invoiceData.invoice_number}
        </h2>
        <hr class="mt-2 mb-2">
        <p class="flex justify-between bg-zinc-200 py-1 px-2 mb-1"><strong>${toCurrentLang('customer')}:</strong></p>
        <div class="flex flex-col gap-1 pl-4">
         <p class="flex justify-between bg-zinc-200 py-1 px-2"><strong>${toCurrentLang('customer_name')}:</strong> ${invoiceData.customer.name}</p>
         <p class="flex justify-between bg-zinc-200 py-1 px-2"><strong>${toCurrentLang('customer_email')}:</strong> ${invoiceData.customer.email}</p>
          <p class="flex justify-between bg-zinc-200 py-1 px-2"><strong>${toCurrentLang('customer_phone')}:</strong> ${invoiceData.customer.phone}</p>
           <p class="flex justify-between bg-zinc-200 py-1 px-2"><strong>${toCurrentLang('customer_address')}:</strong> ${invoiceData.customer.address}</p>
        </div>
        <p class="flex justify-between bg-zinc-200 py-1 px-2 mt-1"><strong>${toCurrentLang('issue_date')}:</strong> ${invoiceData.issue_date}</p>
        <p class="flex justify-between bg-zinc-200 py-1 px-2 mt-1"><strong>${toCurrentLang('due_date')}:</strong> ${invoiceData.due_date}</p>
        <p class="flex justify-between bg-zinc-200 py-1 px-2 mt-1"><strong>${toCurrentLang('total_amount')}:</strong> $${invoiceData.total_amount}</p>
        <p class="flex justify-between bg-zinc-200 py-1 px-2 mt-1"><strong>${toCurrentLang('status')}:</strong> ${toCurrentLang(invoiceData.status.toLowerCase())}</p>
        <p class="flex justify-between bg-zinc-200 py-1 px-2 mt-1"><strong>${toCurrentLang('transaction')}:</strong> <a href='/invoice/${invoiceData.invoice_id}/transaction' target="_blank" class="text-blue-700">${toCurrentLang('view_all')}</a></p>`;

    modal.style.display = "block";
}

function toCurrentLang(value) {
    return langMessages[value];
}
