@extends('layouts.main')
<!DOCTYPE html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>biblioteca</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body>
     

<br>
<br>
<br>
  

    <h2>Sua biblioteca</h2>
    <div id="events-container" class="col-md-12">
        <div id="cards-container" class="row">
    @foreach($listas as $lista)
    @if($user->id == $lista->user_id)
    

    
  
        
        
           
           
            @foreach($livros as $livro)
              @if($livro->id == $lista->livro_id)
            <div class="card">
                <center>
                <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->titulo }}">
                
            <h5 > {{ $livro->titulo }} </h5>
        </center>
            <div >
               
                @if (strlen($livro->descricao)>130)
            <?php
            $livro->descricao=substr($livro->descricao, 0, 130)."...";
            ?>
            @endif
                <p class="size">{{ $livro->descricao }}</p>
                <p> Autor: {{ $livro->user_name}}</p>
               
               <a href="/ler/verlivro/{{$livro->id}}"> Ver mais </a>
               <?php
               $i=0;
               $s=[];
               ?>
              
                  @foreach($capitulos as $capitulo)
                  @if($capitulo->livro_id == $livro->id)
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
                <p>   <a href="/ler/leitura/{{$livro->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
                   </center>
                   @endif
            </div>
        </div>
     
             @endif  
            @endforeach
        @endif
      
    @endforeach
           
       </div>
    </div>
</body>
</html>


   