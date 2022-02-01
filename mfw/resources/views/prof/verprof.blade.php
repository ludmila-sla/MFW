@extends('layouts.main')

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title> {{ $prof->name }} </title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
            
    
      
    </head>
   
    <body>
      
        
       
        
    
           
            @if ($prof->fotocapa)
        
            <p>       <img  class="capa3" src="/img/perfilcapa/{{ $prof->fotocapa }}"alt="{{ $prof->name }}"> 
               
                    
               
                @endif
                @if ($prof->fotoperfil)
               <center>
            
                  <img  class="perfil3" src="/img/perfil/{{ $prof->fotoperfil }}"alt="{{ $prof->name }}" > </p>
               </center>
                  @endif
                  <div id="events-container" class="col-md-12">
 
                    <br>
            
            <br><br>
            <br>
            <center>
            <h4> Biografia: </h4>
            <p> {{ $prof->desc }} </p>
                
            <h4> Redes Sociais: </h4> 
            <div id="detail_textarea">  
          
                <p>
                  {!! $user->redes !!} 
                    
              </p>
            </div>
        </center>
        <br> <br>
        <h4> Livros de {{$prof->name}}: </h4> 
        
        <div id="cards-container" class="row">
            @foreach($livros as $livro)
         @if($livro->user_id==$prof->id)
                <div class="card">
                    <center>
                    <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->titulo }}">
                   
                <h5 > {{ $livro->titulo }} </h5>
            </center>
 
                @if (strlen($livro->descricao)>150)
                <?php
                $livro->descricao=substr($livro->descricao, 0, 150)."...";
                ?>
                @endif
                <div >
                   <p class="size">{{ $livro->descricao }}</p>
                  
                  <a href="/ler/verlivro/{{$livro->id}}" > Ver mais </a> 
                    <center>
                 <p>   <a href="/ler/leitura">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
                    </center>
                </div>
            </div>
          
       @endif
        @endforeach
      
       
     
  
       

  
</div>


    </body>
</html>
