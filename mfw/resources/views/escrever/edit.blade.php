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
        <form action= "/escrever/update/{{$livros->id}}" method= "POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}
        <br>
        <br>
        <br>
        
        
        <div id="events-container" class="col-md-12">
           
          
              
             
                
        <h4> Titulo do livro: </h4> 
      <p>  <input type="text" name="titulo" size="80" value="{{ $livros->titulo }}"> </p>
        
        <img src="/img/livros/{{ $livros->image }}" alt="{{ $livros->titulo }}">
   
    <p> <br>  Mudar imagem<input type="file" id="image" name="image" class="from-control-file">
     </p>
  
</div>

  
   
      
<h4> sinopse: </h4>
   <p> <textarea name="descricao" id="desc" placeholder="Máximo de 1700 caractéres"> {{ $livros->descricao }}</textarea> </p>

        </center>
    <p>Qual a categoria do seu livro?
    
        <select name="categoria">
           
            <option value="acao" <?php if($livros->categoria == 'acao') echo"selected"; ?>> Ação</option>
            <option value="aventura" <?php if($livros->categoria == 'aventuta') echo"selected"; ?>> Aventura</option>
            <option value="conto" <?php if($livros->categoria == 'conto') echo"selected"; ?>> Conto </option>
            <option value="espiritual" <?php if($livros->categoria == 'espiritual') echo"selected"; ?>> Espiritual</option>
            <option value="fanfic" <?php if($livros->categoria == 'fanfic') echo"selected"; ?>> Fanfic </option>
            <option value="fantasia" <?php if($livros->categoria == 'fantasia') echo"selected"; ?>> Fantasia </option>
            <option value="ado" <?php if($livros->categoria == 'ado') echo"selected"; ?>> Ficção adolescente</option>
            <option value="cien" <?php if($livros->categoria == 'cien') echo"selected"; ?>> Ficção científica </option>
            <option value="ficcao" <?php if($livros->categoria == 'ficcao') echo"selected"; ?>> Ficção geral </option>
            <option value="hist" <?php if($livros->categoria == 'hist') echo"selected"; ?>> Ficção histórica </option>
            <option value="humor" <?php if($livros->categoria == 'humor') echo"selected"; ?>> Humor</option>
            <option value="suspense" <?php if($livros->categoria == 'suspense') echo"selected"; ?>> Mistério/Suspense </option>
            <option value="naofic" <?php if($livros->categoria == 'fanfic') echo"selected"; ?>> Não ficção</option>
            <option value="outro" <?php if($livros->categoria == 'outro') echo"selected"; ?>> Outros gêneros </option>
            <option value="paranor" <?php if($livros->categoria == 'paranor') echo"selected"; ?>> Paranormal</option>
            <option value="poesia" <?php if($livros->categoria == 'poesia') echo"selected"; ?>> Poesias </option>
            <option value="romance" <?php if($livros->categoria == 'romance') echo"selected"; ?>> Romance</option>
            <option value="terror" <?php if($livros->categoria == 'terror') echo"selected"; ?>> Terror</option>
            
    </select>
     </p>
     @if ($livros->maior==18)
        <p> O livro é apenas para maiores de idade?</p>
   
        <p>  <input type="radio" name="maior" value="18" checked> Sim </p>
         <p>  <input type="radio" name="maior" value="1"> Não </p>
       
           
       @else
       <p> O livro é apenas para maiores de idade?</p>
   
       <p>  <input type="radio" name="maior" value="18"> Sim </p>
        <p>  <input type="radio" name="maior" value="1"checked> Não </p>
      
       @endif
       @if ($livros->dir=="s")
       <p>Todos os direitos autorais desse livro pertencem a você?</p>
   
       <p>  <input type="radio" name="dir" value="s" checked> Sim </p>
        <p>  <input type="radio" name="dir" value="n"> Não, é dominio público </p>
     @else 
     <p>Todos os direitos autorais desse livro pertencem a você?</p>
   
     <p>  <input type="radio" name="dir" value="s"> Sim </p>
      <p>  <input type="radio" name="dir" value="n" checked> Não, é dominio público </p>
       @endif
        
     <center>
        <p> Tags:  <input type="text" name="tags" size="80" value="{{ $livros->tags }}" placeholder="Separe as tags por vírgula. Ex: terror, ficção,..."> </p> 
 
    <input type="submit" class="btn btn-primary" name="atualizar" value="Atualizar">
  
</form>
<form action="/escrever/{{ $livros->id }}" method="POST">
    @csrf
    @method('DELETE')
    <br>
    <button type="submit" class="btn btn-primary"> Deletar livro</button>
</form> 
</center>
    </body>
</html>
