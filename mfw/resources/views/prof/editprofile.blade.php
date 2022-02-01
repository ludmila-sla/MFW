@extends('layouts.main')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meu perfil</title>

       
       
            <link rel="stylesheet" href="css/app.css" type="text/css">
            
         
    </head>
   
    <body>
        
    
        <center>
        <form action= "/prof/editprofile" method= "POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}
        
        @if ($user->fotocapa)
        <p>    <img  class="capa2" src="/img/perfilcapa/{{ $user->fotocapa }}"alt="{{ $user->name }}"> </p>
          
        
            
       
            @endif
            @if ($user->fotoperfil)
          <p>  <img  class="perfil2" src="/img/perfil/{{ $user->fotoperfil }}"alt="{{ $user->name }}" > </p>
         
          
            @endif
           
            <br>
            <br>
            <br>
            <br>
            <br>
            
          
            @if ($user->fotocapa)
            <p>   Mudar imagem de capa <input type="file" id="fotocapa" name="fotocapa" class="from-control-file"> </p>
            <p> Para melhor qualidade, coloque uma imagem de, no minimo, 360 x 130 pixels </p>
            @else
           
            <p>   Colocar foto de capa <input type="file" id="fotocapa" name="fotocapa" class="from-control-file"> </p> 
       <p> Para melhor qualidade, coloque uma imagem de, no minimo, 360 x 130 pixels </p>
            @endif
            @if ($user->fotoperfil)
            <p>   Mudar imagem de perfil <input type="file" id="fotoperfil" name="fotoperfil" class="from-control-file"> </p>
            @else
            <p>   Colocar foto de perfil <input type="file" id="fotoperfil" name="fotoperfil" class="from-control-file"> </p>
            
            @endif
           
        <div id="events-container" class="col-md-12">
         
           
              
            <h4> Biografia: </h4>
          
            
      <textarea id="desc" name="desc">   {{ $user->desc }} </textarea>
                
        <h4> Redes Sociais: </h4> 


 <textarea  id="redes" name="redes" placeholder="Ex: www.instagram.com/seu-usuario">{{ $user->redes2 }}</textarea>  
 
      
        
        
  
</div>

  
   
      

        
 
    <input type="submit" class="btn btn-primary" name="atualizar" value="Atualizar">
  
</form>

</center>
    </body>
</html>
