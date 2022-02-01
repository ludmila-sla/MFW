
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Welcome</title>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

            <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body >
        <header >
           
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
               
              <div class="collapse navbar-collapse" id="navbar">
                <img src="/img/logo/logo1.png" alt="Logo">
                <div style="padding-left: 85%">
                
                <ul class="navbar-nav">
            
       
            <div> <a href="/login" class="nav-link">Login</a> </div>

           <div>  <a href="/register"class="nav-link">Register</a> </div>
           </ul>
                        </div>
              </div>
            </nav>
            
        </header>

<div id="search-container" class="col-md-12">
    <h1>Busque um livro</h1>
    <form action="/dashboard" method="GET">
        @csrf
        {{ csrf_field() }}
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
       
    </form>
  
    
</div>
<br>
<br>
<br>

<div id="events-container" class="col-md-12">
   
    <h2>Livros recomendados</h2>

    <div id="cards-container" class="row">
        @foreach($livros as $livro)
     
            <div class="card">
                <center>
                <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->titulo }}">
                </center>
            <h5 > {{ $livro->titulo }} </h5>
            @if (strlen($livro->descricao)>130)
            <?php
            $livro->descricao=substr($livro->descricao, 0, 130)."...";
            ?>
            @endif
            <div >
               
               
                <p class="size">{{ $livro->descricao }}</p>
                <p> <a href="/prof/verprof/{{$livro->user_id}}"> autor: {{ $livro->user_name}}</p>
                <a href="/ler/verlivro/{{$livro->id}}"> Ver mais </a>
                <?php
               $i=0;
               $s=[];
               ?>
              
                  @foreach($capitulos as $capitulo)
                  @if($capitulo->livro_id == $livro->id)
                  <?php
                  $s[$i]=$capitulo->id;
                 
                  $i=$i+1;
                  ?>
                          
                           @endif     
                           @endforeach
                           @if ($s!=null)
                           <?php
                           
                           $o=min($s);
                        
                           ?>
             
                   <center>
                <p>   <a href="/ler/leitura/{{$livro->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
                   </center>
                   @endif
            </div>
        </div>
      
   
    @endforeach
    </div>
</div>

    </body>
</html>


   