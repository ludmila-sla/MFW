@extends('layouts.main')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>capitulo</title>

       
       
            <link rel="stylesheet" href="css/styles.css" type="text/css">
            
            
         
    </head>
   
    <body>
        <br>
        <br>
        <br>
      
        <br>
        <br>
        <br>
          
   
        <center>
            <h5 > Capitulo: {{ $capitulo->nomecap }} </h5>
        </center>
             <div class="ler">
    <div id="detail_textarea">
        {!! $capitulo->cap !!} 
         
   </div>
             </div>
   <center>
   
   <p> Curtidas: {{$capitulo->vot}}   &nbsp&nbsp &nbsp    Leituras:  {{$capitulo->leit}}    &nbsp&nbsp&nbsp   Comentários: {{$capitulo->co}}</p>
 

@if($curtiu==false)
   <form action= "/ler/curtir/{{$livro->id}}/{{$capitulo->id}}" method= "POST" >
    @csrf  
    {{ csrf_field() }} 
    <input type="submit" class="btn btn-primary" name="curtir" value="Curtir" > 
   </form>
   @else

   <form action= "/ler/curtir/{{$livro->id}}/{{$capitulo->id}}" method= "POST" >
    @csrf
    {{ csrf_field() }} 
   
   <input type="submit" class="btn btn-primary" name="descurtir" value="Descurtir">
</form>

 @endif
 
   <br>
   <?php
   $i=0;
   $c=-1;
   $l=$capitulo->id;
   ?>
   @foreach($capitulos as $capitulo)

    @if($capitulo->livro_id == $livro->id)
       <?php
       $s[$i]=$capitulo->id;
       $i=$i+1;
       ?>
               @if ($capitulo->id==$l)
               <?php
               $c=$i;
               ?>
               @endif
               
                @endif     
                @endforeach
                @if ($c>=0 && $c<$i)
                <?php
                $v=$s[$c];
                ?>

                

 
   @endif
   @foreach($capitulos as $capitulo)
   @if($capitulo->livro_id == $livro->id)

<button class="btn btn-primary"> <a href="/ler/leitura/{{$livro->id}}/{{$capitulo->id}}">{{ $capitulo->nomecap }} </a> </button>, &nbsp&nbsp 
 @endif     
 @endforeach
   <br>
</center>
<div id="events-container" class="col-md-12">
 
   <h2 style="margin-left: 200px;"> Comentários: </h2>

   @foreach($comentarios as $comentario)
  <p> <span> <a href="/prof/verprof/{{$livro->user_id}}"> {{$comentario->user_name}}</a>: {{$comentario->coment}}</span> </p>
   <br>
  
   
   @endforeach
 
   <form action= "/ler/comentar/{{$livro->id}}/{{$capitulo->id}}" method= "POST" >
    @csrf  
    {{ csrf_field() }} 
    <textarea id="comen" name="comentario"> </textarea>
   
    <p class="s"> <input type="submit" class="btn btn-primary" name="comentar" value="Comentar"> </p>
      
   </form>
   <br>

</div>
  
    </body>
</html>
