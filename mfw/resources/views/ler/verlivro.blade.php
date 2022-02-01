@extends('layouts.main')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Detalhes do livro</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body >
     


 <br>
  <br>
  <center>
 <div id="events-container" class="col-md-12">
 
   
      
     
            <div class="cs">
                
                    <h5 > {{ $livros->titulo }} </h5>
                <img src="/img/livros/{{ $livros->image }}" alt="{{ $livros->titulo }}">
             
              <br>
            <div >
                <br>
                <p class="size">{{ $livros->descricao }}</p>
                <p> <a href="/prof/verprof/{{$livros->user_id}}"> autor: {{ $livros->user_name}}</p>
                    
               
                  
                   
                        <div class="dropdown">
                          <button class="mainmenubtn">Lista de Capítulos </button>
                          <div class="dropdown-child">
                            @foreach($capitulos as $capitulo)
                            @if($capitulo->livro_id == $livros->id)
                 
                          <a href="/ler/leitura/{{$livros->id}}/{{$capitulo->id}}">{{ $capitulo->nomecap }} </a> 
                          @endif     
                          @endforeach
                          </div>
                        </div>
                      
                     <br>
                     <br>
                     
               
              <p> Leituras: {{$livros->leitura}}  &nbsp&nbsp Votos: {{$livros->voto}}  &nbsp&nbsp Comentários: {{$livros->comentario}}</p>
                <form action="/ler/biblioteca/{id}/{idlista}" method="POST">
                    @csrf
                    {{ csrf_field() }}
                <p>      <a href="/ler/biblioteca/{{$livros->id}}"> Salvar livro na lista</a> </p>
               
            </form>
            <?php
            $i=0;
            $s=[];
            ?>
           
               @foreach($capitulos as $capitulo)
               @if($capitulo->livro_id == $livros->id)
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
             <p>   <a href="/ler/leitura/{{$livros->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
                </center>
                @endif
                 
           
              
            </div>
        </div>
      
   
  
</div>

</center>
    </body>
</html>



   