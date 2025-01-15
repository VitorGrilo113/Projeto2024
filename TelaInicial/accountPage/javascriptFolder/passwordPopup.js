const button = document.querySelector("#pass-edit")
const popupContainer = document.querySelector("#pass-popup");
const siteContainer = document.querySelector(".site-container");
const closeButton = document.querySelectorAll(".close-button");
const eyeButton = document.querySelectorAll(".input-bo img");
const passClose = document.getElementById("pass-close");
const headerContainer = document.querySelector(".headerPage")

let passStage = "invisible";


button.addEventListener("click", function () {
 popupContainer.style.display = "block"
    setTimeout(() => {
        popupContainer.classList.toggle("open")
        siteContainer.classList.toggle("blur");
        headerContainer.classList.toggle("blur");
  
    }, 10);


})

closeButton.forEach(currentButton => {
    currentButton.addEventListener("click", function () {
        currentButton.parentElement.classList.remove("open");
        
        siteContainer.classList.remove("blur");
        headerContainer.classList.remove("blur");

        setTimeout(() => {
            currentButton.parentElement.style.display = "none";
      
        }, 300);
    
    })
})

passClose.addEventListener("click", function() {
    passClose.parentElement.parentElement.classList.remove("open");
        
    siteContainer.classList.remove("blur");
    headerContainer.classList.remove("blur");
    

    setTimeout(() => {
        passClose.parentElement.parentElement.style.display = "none";
  
    }, 300);
})



eyeButton.forEach(currentButton => {
    currentButton.addEventListener("click", function () {

        if (passStage == "invisible") {
            passStage = "visible";
            currentButton.src = "  ../../LoginPage/imagens/close-eyes.png"
            let input = currentButton.parentElement.querySelector('input')
            input.type = "text"

          
        }
        else if (passStage == "visible") {
            passStage = "invisible";
            currentButton.src = "../../LoginPage/imagens/open-eyes.png"
              let input = currentButton.parentElement.querySelector('input')
            input.type = "password"
           

        }
    })
})

