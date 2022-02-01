<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      
        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
    
       
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
          <div class="collapse navbar-collapse" id="navbar">
          
        <a href="/dashboard">      <img src="/img/logo/logo1.png" alt="Logo"> </a>
          
            <ul class="navbar-nav">
            
              <li class="nav-item">
                <a href="/ler/biblioteca" >Biblioteca</a>
              </li>
              <li class="nav-item">
                <a href="/editarlivro" >Meus livros</a> 
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="mainmenubtn">Perfil</button>
                  <div class="dropdown-child">
         
           <a href="/prof/myprofile">Minha conta</a> 
                  <a href="/escrever/escrever">Criar livro</a> 
                  <a href="/prof/carteira">Carteira</a> 
                  <a href="/profile/show">Configurações</a> 
                  <form action="/logout" method="POST">
                    @csrf
                    {{ csrf_field() }}
                    <a href="/logout" 
                      class="nav-link" 
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      Sair
                    </a>
                  </form>
                  </div>
                </div>
              
              </li>
                 
              
            </li>
            </ul>
          </div>
        </nav>
     
           
    
     
      
     
      </header>
  
      <main>
        <div class="container-fluid">
          <div class="row">
            @if(session('msg'))
              <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
          </div>
        </div>
      </main>
      
    </body>
</html>