<?php
    echo "<pre>";
    //Etapa.1 - Criar Array
    echo "Etapa.1";
    $arrayAlunos = [
        [
        "nome" => "Telma",
        "idade" => 17,
        "curso" => "DS"
        ],
        [
            "nome" => "Agnaldo",
            "idade" => 16,
            "curso" => "Informatica"
        ]
    ];

    //Etapa.2 - Converter Array para JSON
    echo "Etapa.2";
    $jsonNovo=json_encode($arrayAlunos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo "JSON criado com sucesso !";
    echo $jsonNovo;

    //Etapa.3 - Salvar JSON em arquivo
    echo "Etapa.3\n";
    $nomeArquivo = "novo_alunos.json";
    if (file_put_contents($nomeArquivo,$jsonNovo)){
        echo "Arquivo criado com sucesso!";
    }else{
        echo "Ops, Arquivo não criado!";
    };

    //Etapa.4 - Lendo arquivo JSON
    echo "Etapa.4\n";
    $dadosJSON = file_get_contents("novo_alunos.json");
    echo $dadosJSON;

    //Etapa.5 - Convertendo JSON para ObjetoDados ou Array
    echo "Etapa.5\n";
    $alunosObjeto = json_decode($dadosJSON);

    $alunosArray = json_decode($dadosJSON, true);

    echo "Exibindo dados como Objeto\n";
    echo $alunosObjeto[0]->nome;
    print_r($alunosObjeto);

    echo "Exibindo dados como array";
    echo $alunosArray[0]["nome"];
    echo "\n";
    print_r($alunosArray);

    //Etapa.6 - Exibindo todas as chaves do Objeto e Array
    echo "Etapa.6\n";
    echo "Exibindo todas as chaves/valores do Objeto. \n";
    foreach ($alunosObjeto as $aluno) {
        echo "Nome: " . $aluno->nome . "\n";
        echo "Idade: " . $aluno->idade . "\n";
        echo "Curso: " . $aluno->curso . "\n";
        echo "\n";
    }

    //Etapa.7 - Exibindo todas as chaves do Array
    echo "Exibindo todas as chaves/valores do Array. \n";

    foreach($alunosArray as $aluno) {
        echo "Nome: " . $aluno["nome"] . "\n";
        echo "Idade: " . $aluno["idade"] . "\n";
        echo "Curso: " . $aluno["curso"] . "\n";
        echo "\n";
    }

    //Etapa.8 - Verificando erros de JSON
    echo "Etapa.8\n";
    echo "=== Verificando Erros de JSON ===\n";
    if (json_last_error() !== JSON_ERROR_NONE){
        echo "Erro no JSON: " . json_last_error_msg();
        exit;
    } else {
        echo "JSON carregado com sucesso! \n";
    }


?>