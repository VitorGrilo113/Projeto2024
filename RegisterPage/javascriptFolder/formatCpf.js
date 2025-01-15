let inputCpf = document.getElementById('cpf-input')

inputCpf.addEventListener('input', function(e) {
    let inputValue = inputCpf.value;
   if(inputValue >= 3) {
    console.log("s")
   }
  });