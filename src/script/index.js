function checkOther(selectedValue) {
    // let pakt id voor input van optie
    let otherInput = document.getElementById('otherInput');
    // laat zien dat input en zet op block
    otherInput.style.display = selectedValue === 'Other' ? 'block' : 'none';
}