<?php
echo "<pre>";

// 1. Criando o Array com tipos de dados corretos
echo "===== CRIANDO ARRAY =====\n";
$arrayInventario = [
    [
        "nome" => "Raquete de beach tennis",
        "categoria" => "Esporte",
        "preco" => 1700.00, // Número real (float/double) sem aspas
        "disponivel" => true
    ],
    [
        "nome" => "Bolinha de beach tennis",
        "categoria" => "Esporte",
        "preco" => 20.00,
        "disponivel" => true
    ],
    [
        "nome" => "Raqueteira",
        "categoria" => "Esporte",
        "preco" => 400.00,
        "disponivel" => true
    ]
];

// 2. Transformando em JSON
echo "\n===== TRANSFORMANDO EM JSON =====\n";
$json_novo = json_encode($arrayInventario, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo "JSON criado com sucesso!\n\n";
echo $json_novo . "\n";

// 3. Salvando o arquivo (usaremos o mesmo nome para salvar e ler)
$nome_arquivo = "estoque.json";

if (file_put_contents($nome_arquivo, $json_novo)) {
    echo "\nArquivo '$nome_arquivo' criado com sucesso!<br>";
} else {
    echo "\nOps, arquivo não criado!<br>";
}

// 4. Lendo o arquivo (Garantindo que o nome seja o mesmo)
if (file_exists($nome_arquivo)) {
    $dadosJSON = file_get_contents($nome_arquivo);
    
    echo "<br>---- CONTEÚDO BRUTO DO ARQUIVO ----<br>";
    echo htmlspecialchars($dadosJSON); // Protege a exibição no navegador
    
    // 5. Decodificando
    $inventarioObjeto = json_decode($dadosJSON); // Vira Objeto (stdClass)
    $inventarioArray = json_decode($dadosJSON, true); // Vira Array Associativo
    
    // Verificação de erros de decodificação
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Erro no JSON: " . json_last_error_msg();
        exit;
    }

    echo "<br><br>---- EXIBIÇÃO EM OBJETO (Primeiro Item) ----<br>";
    echo "Nome: " . $inventarioObjeto[0]->nome;

    echo "<br><br>---- EXIBINDO VIA FOREACH (OBJETO) ----<br>";
    foreach ($inventarioObjeto as $item) {
        echo "Produto: {$item->nome} | Preço: R$ " . number_format($item->preco, 2, ',', '.') . "<br>";
    }

} else {
    echo "Erro: O arquivo $nome_arquivo não foi encontrado.";
}
?>