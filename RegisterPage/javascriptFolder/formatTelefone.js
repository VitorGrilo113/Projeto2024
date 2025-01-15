function adicionarPrefixo(input) {
    
    if (!input.value.startsWith('+55')) {
        input.value = '+55 ';
    }
}

function formatarTelefone(input) {
    // Remove todos os caracteres que não são números, exceto o "+"
    let valor = input.value.replace(/[^\d+]/g, '');

    // Garante que o valor sempre comece com "+55 "
    if (!valor.startsWith('+55')) {
        valor = '+55 ' + valor.replace(/^\+?55/, '');
    }

    // Formata o número
    valor = valor.replace(/^\+55\s?/, '+55 '); // Garante o espaço após +55
    if (valor.length > 9 + 4) {
        valor = valor.replace(/^\+55\s(\d{2})(\d{5})(\d{4})$/, '+55 ($1) $2-$3'); // Celular
    } else if (valor.length > 8 + 4) {
        valor = valor.replace(/^\+55\s(\d{2})(\d{4})(\d{4})$/, '+55 ($1) $2-$3'); // Fixo
    } else if (valor.length > 6) {
        valor = valor.replace(/^\+55\s(\d{2})(\d{0,5})$/, '+55 ($1) $2'); // Incompleto
    } else if (valor.length > 3) {
        valor = valor.replace(/^\+55\s(\d{0,2})$/, '+55 ($1'); // Apenas DDD
    }

    // Atualiza o valor do input
    input.value = valor;
}

// Evita que o usuário apague o +55
document.getElementById('tel-input').addEventListener('keydown', function(event) {
    const input = event.target;
    if ((input.selectionStart <= 4 || input.selectionEnd <= 4) && 
        (event.key === 'Backspace' || event.key === 'Delete')) {
        event.preventDefault(); 
    }
});