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
        <form action= "/escrever/updatecap/{{$livro->id}}/{{$capitulo->id}}" method= "POST" enctype="multipart/form-data">
         
            @csrf
            {{ csrf_field() }}
        <br>
        <br>
        <br>
       
        <h4> titulo do capitulo: </h4> 
        <input type="text" name="nomecap" size="80" value="{{$capitulo->nomecap}}">
  
  
     
   
      <br>

      <div id="detail_textarea">  <textarea class="form-control" id="summary-ckeditor" name="cap"> {!! $capitulo->cap !!} </textarea> 
    <script src="{{ asset('ckeditor/ckeditor.js') }}"> 
    </script>
   
    <script>
        CKEDITOR.replace( 'cap', {
            filebrowserUploadUrl: "/escrever/novocap/{{$livro->id}}', ['_token' => csrf_token() ]",
            filebrowserUploadMethod: 'form'
        });
        </script> 
      </div>

     
  
 
           <input type="submit" class="btn btn-primary" name="publicar" value="Publicar"> 
    
</form>
<form action="/escrever/delete/{{ $capitulo->id }}" method="POST">
    @csrf
    @method('DELETE')
    <br>
    <button type="submit" class="btn btn-primary" onclick="return confirm('Tem certeza de que deseja deletar esse capitulo?');"> Deletar</button>
</form>  
</center>
    </body>
</html>
