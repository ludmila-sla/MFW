@extends('layouts.main')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Escrever</title>

       
       
            <link rel="stylesheet" href="css/app.css" type="text/css">
            
           
      
    </head>
   
    <body>
        <center>
        <form action= "/ler" method= "POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}
        <br>
        <br>
        <br>
        
        <h4> Titulo do livro: </h4> 
        <input type="text" name="titulo" size="80">
  
    <p> <br>  Adicionar capa <input type="file" id="image" name="image" class="from-control-file">
     </p>
    
     
   
      
<h4> Sinopse: </h4>
   <p> <textarea name="descricao" id="desc" placeholder="Máximo de 1700 caractéres"></textarea> </p>
        </center>
    <p>Qual a categoria do seu livro?
    
        <select name="categoria">
            <option value="acao"> Ação</option>
            <option value="aventura"> Aventura</option>
            <option value="conto"> Conto </option>
            <option value="espiritual"> Espiritual</option>
            <option value="fanfic"> Fanfic </option>
            <option value="fantasia"> Fantasia </option>
            <option value="ado"> Ficção adolescente</option>
            <option value="cien"> Ficção científica </option>
            <option value="ficcao"> Ficção geral </option>
            <option value="hist"> Ficção histórica </option>
            <option value="humor"> Humor</option>
            <option value="suspense"> Mistério/Suspense </option>
            <option value="naofic"> Não ficção</option>
            <option value="outro"> Outros gêneros </option>
            <option value="paranor"> Paranormal</option>
            <option value="poesia"> Poesias </option>
            <option value="romance"> Romance</option>
            <option value="terror"> Terror</option>
        </select>
     </p>
        <p>O livro é apenas para maiores de idade?</p>
   
        <p>  <input type="radio" name="maior" value="18"> Sim </p>
         <p>  <input type="radio" name="maior" value="1"> Não </p>
       
         <p>Todos os direitos autorais desse livro pertencem a você?</p>
   
         <p>  <input type="radio" name="dir" value="s"> Sim </p>
          <p>  <input type="radio" name="dir" value="n"> Não, é dominio público </p>
     <center>
        <p> Tags:  <input type="text" name="tags" size="80" placeholder="Separe as tags por vírgula. Ex: terror, ficção,..."> </p> 
 
    <input type="submit" class="btn btn-primary" name="publicar" value="Publicar">

 
    
</form>
</center>
    </body>
</html>
