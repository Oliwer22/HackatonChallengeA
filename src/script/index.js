function checkOther(selectedValue) {
    // let pakt id voor input van optie
    let otherInput = document.getElementById('otherInput');
    // laat zien dat input en zet op block
    otherInput.style.display = selectedValue === 'Other' ? 'block' : 'none';
}


function submitFormWithDelay(event) {
    event.preventDefault(); // zorg dat die niet stuurt leeg

    setTimeout(function() {
      document.getElementById("myForm").submit(); // Stuurt na 5 seconde
    }, 5000); 
  }