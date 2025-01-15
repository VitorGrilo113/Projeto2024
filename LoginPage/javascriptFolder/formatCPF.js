function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ""); // Remove tudo que não for número
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o primeiro ponto
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o segundo ponto
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Adiciona o traço
    return cpf;
}

// Aplica a formatação enquanto o usuário digita no campo CPF
document.getElementById("cpf-input").addEventListener("input", function () {
    this.value = formatarCPF(this.value);
});