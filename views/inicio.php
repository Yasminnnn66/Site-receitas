<!--//Pagina do login//-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pratos</title>
    <link href="https://fonts.cdnfonts.com/css/itc-benguiat-std?styles=64886" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='/css/Inicio.css' rel='stylesheet'>
</head>

    <body>

            <header>
                <div class="topo">
                <nav class="navbar">
                    <ul class="nav-links">
                        <li><a href="#inicio">Início</a></li>
                        <li><a href="#menu" class="transition">Menu</a></li>
                        <li><a href="#contato">Contato</a></li>
                    </ul>
                    <div class="icon-buttons">

                        <a href="/logout"  <button class="icon-bt" >
                             <i class='bx bx-log-out'> </i>
                        </button> </a>

                    </div>

                </nav></div>
            </header>

      <div class="intro">

 <h1 id="inicio">Seja Bem-vindo!</h1>
 <h3>Oque você vai preparar hoje?</h3>
      </div>

      <div>

        <h2 >Faça a sua receita!</h2>
        <img class="rest" src="img/reserva.png" alt="">
        <p class="text">✨ Crie a receita do seu jeito! ✨
<br>
            Aqui, você tem liberdade para fazer a sua receita exatamente como preferir. <br> Basta clicar no botão abaixo e soltar a imaginação!

 Personalize, experimente <br> e aproveite cada  sabor!</p>

        <a href="/nova-receita" class="botao2" type="button"
            value="Form">Faça a sua receita!</a>
      </div>


      <main><h1 id="menu"> Menu </h1></main>
      <div class="imagens">
      <div><a href="/list"><img class="entrada" src="img/entrada menu.jfif" alt="Entradas" ><h3 class="men">Entradas</h3></a></div>
      <div><a href=""><img class="sobremesas" src="img/Sobremesa menu.jpg" alt="Sobremesa"><h3 class="men">Sobremesas</h3></a></div>
      <div><a href=""><img class="pratos" src="img/Pratos menu.jpg" alt="Pratos"><h3 class="men">Pratos</h3></a></div>
      <div><a href=""><img class="bebidas" src="img/Bebidas menu.jpg" alt=""><h3 class="men">Bebidas</h3></a></div>
      </div>

       <footer >

        <p id="contato" class="foot">&copy; 2025 ReceitasMrPhellipe. Todos os direitos reservados.</p>
       </footer>
    </div>

</body>
</html>