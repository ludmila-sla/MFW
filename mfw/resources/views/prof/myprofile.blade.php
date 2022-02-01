@extends('layouts.main')

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Minha conta</title>
        
        <link rel="stylesheet" href="css/styles.css" >
            
    
      
    </head>
   
    <body>
        <center>
        <form action= "/prof/editprofile" method= "GET" enctype="multipart/form-data">
            @csrf  {{ csrf_field() }} 
            <input type="submit" class="btn btn-primary" name="editar" value="Editar Perfil">
  
        </form>
        <br>
        <br>
      
        
        
       @if ($user->fotocapa)
        
     <p>       <img  class="capa" src="/img/perfilcapa/{{ $user->fotocapa }}"alt="{{ $user->name }}"> 
        
             
        
         @endif
         @if ($user->fotoperfil)
        
     
           <img  class="perfil" src="/img/perfil/{{ $user->fotoperfil }}"alt="{{ $user->name }}" > </p>
           @endif
          <br>
           <div id="events-container" class="col-md-12">
            <h4> Biografia: </h4>
            <p> {{ $user->desc }} </p>
                
        <h4> Redes Sociais: </h4> 
     <div id="detail_textarea">  
   
         <p>
           {!! $user->redes !!} 
             
       </p>
     </div>
  
        <br>
        <a href="/prof/editprofile"> <input type="submit" class="btn btn-primary"  value="Editar Perfil">   </a> 
        <br>
        <br>
        <br>
       

  
</div>


</center>
    </body>
</html>
