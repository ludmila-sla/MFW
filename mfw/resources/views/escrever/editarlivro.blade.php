@extends('layouts.main')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>meus livros</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body >
     

<br>
<br>
<br>
  
   
  <center> 
   
  <a href="/escrever/escrever"> <input type="submit" class="btn btn-primary"  value="criar novo livro">   </a> 

    <h2>Seus livros</h2> 
    <div >
  
        
        <div id="events-container" class="col-md-12">
            @if(count($livros) > 0)
            <div id="cards-container" class="row">
                @foreach($livros as $livro)
             
                    <div class="edit">
                      
                        <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->titulo }}">
                       
                    <h5 > {{ $livro->titulo }} </h5>
                   @if (strlen($livro->descricao)>200)
                   <?php
                   $livro->descricao=substr($livro->descricao, 0, 200)."...";
                   ?>
                   @endif
                    <div >
                      
                       
                        <p class="size">{{ $livro->descricao }}</p>
                       
                       
                       
                    </div>
                  
                     
                       
                         
                     <div class="dropdown">
                          <button class="mainmenubtn">Lista de Capítulos </button>
                          <div class="dropdown-child">
                            @foreach($capitulos as $capitulo)
                            @if($capitulo->livro_id == $livro->id)
                 
                          <a href="/escrever/editcap/{{$livro->id}}/{{$capitulo->id}}">{{ $capitulo->nomecap }} </a> 
                          @endif     
                          @endforeach
                          </div>
                        </div>
                      
                       
                      
                       
                       
                <p>    <a href="/escrever/novocap/{{$livro->id}}">  Novo capítulo  </a> </p>
<a href="/escrever/edit/{{$livro->id}}">    <input type="submit" class="btn btn-primary" name="editar" value="Editar"> </a>

<form action="/escrever/{{ $livro->id }}" method="POST" >
    @csrf
    @method('DELETE')
    <br>
    <button type="submit" class="btn btn-primary" onclick="return confirm('Tem certeza de que deseja deletar esse livro?');"> Deletar livro</button>
</form>               
</div>
              
           
            @endforeach
            @else
            <p>Você ainda não tem nenhum livro</a></p>
            @endif
           
           
            
                
               
               
            </div>
           
       
  </center>

</body>
</html>


   