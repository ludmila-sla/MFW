@extends('layouts.main')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Novo capitulo</title>

       
       
            <link rel="stylesheet" href="css/app.css" type="text/css">
            
           
           
           
    </head>
   
    <body>
     
        <center>
        <form action= "/escrever/novocap/{{$livros->id}}" method= "POST" enctype="multipart/form-data">
         
            @csrf
            {{ csrf_field() }}
        <br>
        <br>
        <br>
       
        <h4> Titulo do capitulo: </h4> 
        <input type="text" name="nomecap" size="80">
  
  
     
   
      <br>

 
      <br>
  <p>  
   
    <textarea class="form-control" id="summary-ckeditor" name="cap"></textarea> 
    <script src="{{ asset('ckeditor/ckeditor.js') }}"> 
    </script>
   
    <script>
        CKEDITOR.replace( 'cap', {
            filebrowserUploadUrl: "/escrever/novocap/{{$livros->id}}', ['_token' => csrf_token() ]",
            filebrowserUploadMethod: 'form'
        });
        </script> 
    </p>
  
   

       
     
  
 
           <input type="submit" class="btn btn-primary" name="publicar" value="Publicar"> 
    
</form>
</center>
    </body>
</html>
