<?php
session_start();

if (!isset($_SESSION["usuario_logado"])) {
    header("Location: ../PáginaInicial/index.php");
    exit();
}

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$telefone = $_SESSION['telefone'];


if (isset($_POST['salvar_nome'])) {

    $novo_nome = $_POST['novo_nome'];

  
if (empty($novo_nome)) {
        echo "<script>alert('O nome não pode estar vazio!');</script>";
        exit();
}


    $sql_nome = "UPDATE cadastro SET nome = :novo_nome WHERE email = :email";

try {
        $conn = new PDO("mysql:host=localhost;dbname=golbet", 'if0_37709029', 'WereProgramers');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        die();
}

    $verificação = $conn->prepare($sql_nome);
    $verificação->bindParam(':novo_nome', $novo_nome);
    $verificação->bindParam(':email', $email);

if ($verificação->execute()) {
        $_SESSION['nome'] = $novo_nome;
        echo "<script>alert('Nome atualizado com sucesso!');</script>";
        header("Location: ../accountPage/index.php"); 
        exit();
} else {
        $erro = $verificação->errorInfo();
        echo "<script>alert('Erro ao atualizar nome: " . $erro[2] . "');</script>";
        }
    }


        //Alteração Telefone


        if (isset($_POST['salvar_telefone'])) {

            $novo_telefone = $_POST['novo_telefone'];
        
          
if (empty($novo_telefone)) {
                echo "<script>alert('O telefone não pode estar vazio!');</script>";
                exit();
}
        
        
            $sql_telefone = "UPDATE cadastro SET telefone = :novo_telefone WHERE email = :email";
        
try {
                $conn = new PDO("mysql:host=localhost;dbname=golbet", 'if0_37709029', 'WereProgramers');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
                die();
}
        
            $verificação = $conn->prepare($sql_telefone);
            $verificação->bindParam(':novo_telefone', $novo_telefone);
            $verificação->bindParam(':email', $email);
        
if ($verificação->execute()) {
                $_SESSION['telefone'] = $novo_telefone;
                echo "<script>alert('telefone atualizado com sucesso!');</script>";
                header("Location: ../accountPage/index.php"); 
                exit();
} else {
                $erro = $verificação->errorInfo();
                echo "<script>alert('Erro ao atualizar telefone: " . $erro[2] . "');</script>";
        }
    }

?>
              

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Configurações</title>
</head>
<body>

    <header class="headerPage">
        <div class="flex-unit">
            <div class="open-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <a href="../index.php"> <img class="logo-img" src="../Imagens/Logogolbet.header.png" ></a>
        </div>
     
       
        <nav class="nav">
          <a class="selected-link" href="../index.php">Apostar</a>
          <a href="#">Histórico de Apostas</a>
          <a href="#">Próximos jogos</a>
          <a href="#">Depositar</a>
         
          <div class="img-box">
              
              <a href="#"><img class="carrinho-img" src="../Imagens/carrinho-removebg-preview.png"></a>    
              <a href="#"><img class="account-icon" src="../Imagens/reload-removebg-preview.png"></a>
              <a class="img-button" href="#"><img class="account-icon" src="../Imagens/iconeConta.png"></a>
     
          </div>       
        </nav>

        <div class="accout-profile">
            <div class="top-account">
                <img class="account-img " src="https://www.pellarin.com.br/wp-content/uploads/2022/08/artigoBannerMobile767x716_homem-com-papada-como-eliminar.jpg">
                <div>
                <?php
                    echo '<p class="email-text">' .($nome) . '</p>';
                    ?>
                    <?php
                    echo '<p class="email-text">' .($email) . '</p>';
                    ?>
                </div>
             
                
            </div>
            <div class="manage-container">
              
                    <a href="../accountPage/index.php" class="manage-button">
                        <img src="../Imagens/profile.png">
                        <p>Editar Perfil</p>
                        <span>></span>
                    </a>

                    
                    <a href="#" class="manage-button">
                        <img src="../Imagens/setting.png">
                        <p>Configurações</p>
                        <span>></span>
                    </a>

                    <a href="#" class="manage-button">
                      <img src="../Imagens/saldoIcon.png">
                      <p>Meu saldo</p>
                      <span>></span>
                  </a>

                  <a href="#" class="manage-button">
                      <img src="../Imagens/depositarIcon.png">
                      <p>Depositar</p>
                      <span>></span>
                  </a>
        
                  <a href="#" class="manage-button">
                      <img src="../Imagens/sacarIcon.png">
                      <p>Sacar</p>
                      <span>></span>
                  </a>

        
                    <a href="#" class="manage-button">
                        <img src="../Imagens/help.png">
                        <p>Ajuda e Suporte</p>
                        <span>></span>
                    </a>
                    
                    
                    <a href="../../PáginaInicial/index.php" id="logout-img" src="../Imagens/logout.png">
                        <p>Sair</p>
                        <span>></span>
                    </a>
              
               
              
              
               
                </div>
            </div>

        
    </div>

      </header>
    
    <main class="site-container">
        <nav class="lateral-navigation">
            <div class="top-nav">
            
                <p class="back-button">X</p>

              
                <div class="account-card">
                    
                    <img class="account-img" src="https://www.pellarin.com.br/wp-content/uploads/2022/08/artigoBannerMobile767x716_homem-com-papada-como-eliminar.jpg" >
                    
                    <div>
                        
                        <?php
                        echo '<p class="other-subtitle">'. $nome .'</p>'
                        ?>
                        <?php
                        echo '<p class="paragraph-text">'. $email .'</p>'
                        ?>

                    </div>
                
                   
                   
                </div>
    
                <div class="buttons-container">
                    <a href="#" class="nav-button">
                        <img src="./images/accountIcon.png" >
                        <p>Editar Perfil</p>
                    </a>
            
                    <a href="#" class="nav-button">
                        <img src="./images/card.png" >
                        <p>Saldo</p>
                    </a>
            
                    <a href="#" class="nav-button">
                        <img src="./images/icons8-plus-50.png" >
                        <p>Depósitos</p>
                    </a>
            
                    <a href="#" class="nav-button">
                        <img src="./images/icons8-minus-32.png" >
                        <p>Saques</p>
                    </a>
            
                    <a href="#" class="nav-button">
                        <img src="../Imagens/setting.png" >
                        <p>Configurações</p>
                    </a>
            
                    <a href="#" class="nav-button">
                        <img src="../Imagens/saldoIcon.png" >
                        <p>Aparência</p>
                    </a>
            
                    <a href="#" class="nav-button">
                        <img src="../Imagens/saldoIcon.png" >
                        <p>Idiomas</p>
                    </a>
            
                </div>
            </div>
          
    
           
            <div class="bottom-nav">
                <a href="#" class="nav-button">
                    <img src="../Imagens/iconeConta.png" >
                    <p>Ajuda e Suporte</p>
                </a>
        
                <a href="../../PáginaInicial/index.php" class="nav-button">
                    <img src="../Imagens/logout.png" >
                    <p>Sair</p>
                </a>
            </div>
    
    
        </nav>
    
        <div class="right-frame">

            <div class="right-container">
            

            <div class="settings-container">
                <div class="text-box">
                    <h1 class="title">Editar Perfil</h1>
                    <p>Gerencie seus dados e preferências pessoais aqui.</p>
                </div>

                <h1 class="subtitle">Meu Perfil</h1>

                <div class="profile-manage">
                   
                    <div class="manage-content">
                        <h1 class="other-subtitle" >Nome de usuário:</h1>
                        <div class="flex">
                            <?php
                            echo '<p class="grey-txt" id="username-text">'.($nome).'</p>'
                            ?>
                            <p id="username-edit" class="purple-text">Editar</p>
                        </div>
                    
                    </div>

                  

                    <div class="manage-content">
                        <div>
                            <p class="other-subtitle">Foto de perfil</p>
                            <p id="text" class="grey-txt">Personalize seu perfil com uma foto!</p>
                        </div>
                   
                        
                        <div class="flex">
                            <img class="account-img" id="photo" src="https://www.pellarin.com.br/wp-content/uploads/2022/08/artigoBannerMobile767x716_homem-com-papada-como-eliminar.jpg">
                            <div class="group">
                                <p class="delete-button">Deletar</p>
                                <label id="upload-btn" class="purple-text" for="file">Mudar foto</label>
                                <input  type="file" id="file">
                           
                            </div>
                          
                        </div>
                 
                    </div>

                    <div class="manage-content">
                        <p class="other-subtitle">Telefone:</p>
                        <div class="flex">
                            <?php
                            echo '<p class="grey-txt" id="tel-text">'.($telefone).'</p>'
                            ?>
                            <p class="purple-text" id="tel-edit">Editar</p>
                        </div>
                    
                    </div>

                    <div class="manage-content">
                        <p class="other-subtitle">Senha:</p>
                        <div class="flex">
                            <p class="grey-txt">********</p>
                            <div  class="group">
                              
                                <p id="pass-edit" class="purple-text">Editar</p>
                            </div>                     
                        </div>
                    </div>
                </div>
            </div>

         

        </div>

            </div>

          

        
        

        

    </main>


    <div class="mobile-nav">
        <a href="../index.php" class="link-content">
            <img src="../imagens/homeIcon.png">
            <p>Início</p>
        </a>
    
        <div class="link-content">
            <img src="../imagens/thunderIcon.png">
            <p>Jogos</p>
        </div>
    
        <div class="link-content">
            <img src="../imagens/searchIcon.png">
            <p>Explorar</p>
        </div>
    
        <div class="link-content">
            <img src="../imagens/carrinho-removebg-preview.png">
            
            <p>Carrinho</p>
        </div>
    
    
    
    </div>

    
    <div class="popup-container">
        <form method="POST" class="change-popup" id="pass-popup">
            <p class="close-button">X</p>
            <p class="title">Editar Senha</p> 
            <div class="inputs-container">
                
            <div class="input-bo">
                <input type="password" name="senha_atual" placeholder="Senha Atual">
                <img src="../../LoginPage/imagens/open-eyes.png">
            </div>
    
            
            <div class="input-bo">
                <input type="password" name="nova_senha" placeholder="Nova Senha">
                <img src="../../LoginPage/imagens/open-eyes.png">
            </div>
    
            <div class="input-bo">
                <input type="password" name="repitir_senha" placeholder="Repita a Nova Senha">
                <img src="../../LoginPage/imagens/open-eyes.png">
            </div>
    
            <button class="button" name="salvar_senha"id="pass-close">Salvar</button>
    
    
        </div>
    
        </form>
    
        <form method="POST" class="change-popup" id="username-popup">
            <p class="close-button">X</p>
            <p class="title">Como você quer que agente te chame? </p>
             <p class="other-subtitle">Todas as pessoas que interagirem com você no Golbet verão o nome que você escolher.</p>
             <p class="other-subtitle">Somente usaremos o nome que consta em seu documento de identidade se for necessário por motivos legais.</p>
    
            <div class="inputs-container">
                
            <div class="input-bo">
        
                <input type="text" name="novo_nome" id="user-input" placeholder="Digite seu novo nome">
            </div>
    
         
        
    
    
        </div>


            <button class="button" name="salvar_nome" id="username-enviar">Salvar</button>
  

       
    
        </form>

        <form method="POST" class="change-popup" id="tel-popup">
            <p class="close-button">X</p>
            <p class="title">Editar número de telefone</p>
    
            <div class="inputs-container">
                
            <div class="input-bo">

                <input 
                type="text" 
                id="tel-input"
                name="novo_telefone"
                placeholder="Digite seu número junto com o código DDD" 
                onfocus="adicionarPrefixo(this)" 
                oninput="formatarTelefone(this)">

            </div>

            <p id="tel-error-text"></p>

            
    
            
         
    
    
        </div>
        
        <button class="button" name="salvar_telefone" id="tel-enviar">Salvar</button>
    
        </form>
    </div>



   

    <script src="./javascriptFolder/passwordPopup.js"></script>
    <script src="./javascriptFolder/usernamePopup.js"></script>
    <script src="./javascriptFolder/telPopup.js"></script>
    <script src="./javascriptFolder/importPhoto.js"></script>
    <script src="./javascriptFolder/lateralMenu.js"></script>
    <script src="./javascriptFolder/formatTelefone.js"></script>
 
</body>
</html>