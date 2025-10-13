<?php

   session_start();
   include_once 'conexao.php';

   $email = $_POST['email'];
   $senha = $_POST['senha'];

   $consulta = "SELECT * FROM usuarios WHERE email =  :email AND senha = :senha";

    $stmt = $pdo->prepare($consulta);

    // vincula os parâmetros
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    // executa a consulta
    $stmt->execute();

    // obtém o num de registro encontrados 
    $num_registro = $stmt->rowCount();

    // obtém o resultado
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    // exibe o resultado 
    var_dump($resultado);

    if($num_registro == 1){
        $_SESSION['id'] = $resultado['id'];
        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['email'] = $resultado['email'];
        header('Location: restrita.php');

        echo "Acesso permitido para a restrita.php";
    }
    else{ echo "Vc not está cadastrado, sorry";
        header('Location: index.php');}
    
        
    
?>



