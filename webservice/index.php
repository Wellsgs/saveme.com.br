<?php

    require_once 'xml_Class.php';
    require_once 'config.php';
    
    $conexao = conecta();
    
    
    
    $xml = new Xml();
    
    $erro = 0;
    
    $idProduto = $_GET['id'];
    
   
    
    $xml->openTag("response");
    
    if($idProduto == ''){
        $erro = 1;
        $msgErro = 'Codigo Invalido';        
    }else{
        
        $request = $conexao->prepare("SELECT * FROM produto WHERE id_produto = " .$idProduto);
        $request->bindValue(":id", $id);
        $request->execute();
          
        
        if($request->rowCount() > 0){
            $dados = $request->fetch(PDO::FETCH_ASSOC); 
            $xml->addTag("nome_produto", $dados['nome']);
            $xml->addTag("valor", $dados['valor']);

        }else{
            $erro = 2;
            $msgErro = "Produto nao encontrado";
        }
    }
    
    $xml->addTag('erro', $erro);
    $xml->addTag('msgerro', 'Mensagem'.$msgErro);
    
    
    
    $xml->closeTag("response");
    
    var_dump($xml);