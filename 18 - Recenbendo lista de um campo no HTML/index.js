let nomes = [];

function adicionarNome() {
    let campoNome = document.getElementById("nome");
    let nomeDigitado = campoNome.value;

    // Validação: não permitir vazio
    if (nomeDigitado === "") {
        alert("Digite um nome antes de adicionar!");
        return;
    }

    // Limite de 5 nomes
    if (nomes.length >= 5) {
        alert("Você já cadastrou 5 nomes!");
        return;
    }

    // Adiciona no array
    nomes.push(nomeDigitado);

    // Mostra no console
    console.log("Array atualizado:", nomes);

    // Limpa o campo
    campoNome.value = "";

    // Atualiza a tela
    atualizarLista();
}

function atualizarLista() {
    let lista = document.getElementById("listaNomes");
    let info = document.getElementById("info");

    // Limpa a lista antes de montar novamente
    lista.innerHTML = "";

    // Atualiza mensagem de quantidade
    info.innerText = "Nomes cadastrados: " + nomes.length + " / 5";

    // Monta a lista
    for (let i = 0; i < nomes.length; i++) {
        let item = document.createElement("li");
        item.innerText = nomes[i];
        lista.appendChild(item);
    }
}
