const ButtonEdit = document.querySelector("#tel-edit")
const PopupContainer = document.querySelector("#tel-popup");
const containerSite = document.querySelector(".site-container");
const buttonSave = document.querySelector("#tel-enviar");
const telLabel = document.querySelector("#tel-text");
const telInput = document.querySelector("#tel-input");
const telErrorLabel = document.getElementById("tel-error-text");



ButtonEdit.addEventListener("click", function () {
    PopupContainer.style.display = "block"
    setTimeout(() => {
        PopupContainer.classList.toggle("open")
        containerSite.classList.toggle("blur");
        headerContainer.classList.toggle("blur");
  
    }, 10);

})

buttonSave.addEventListener("click", function() {



    if(telInput.value.length == 19) {
        telErrorLabel.style.display = "none"
        telErrorLabel.textContent = ""
        PopupContainer.classList.remove("open");
        containerSite.classList.remove("blur");
        headerContainer.classList.remove("blur");
         
        telLabel.textContent =  telInput.value;
    
       
    
        setTimeout(() => {
           PopupContainer.style.display = "none";
      
        }, 300);
    }

    else {
        telErrorLabel.style.display = "block"
        telErrorLabel.textContent = "Digite um telefone válido"
    }


   
    
})




