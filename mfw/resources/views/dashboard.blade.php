@extends('layouts.main')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Dashboard</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body >
     

<div id="search-container" class="col-md-12">
    <h1>Busque um livro</h1>

 
    <form action="/dashboard" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
       
    </form>
 
    <form>
    
    <p> Filtrar por gênero: 
        <select name="filtro">
           
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
       
        <input type="submit" class="btn btn-primary" value="Filtrar">
  </form> </p>
</div>


 <br>
  

 <div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    <div id="events-container" class="col-md-12">
    <div id="cards-container" class="row">
        @foreach($livros as $livro)
     
            <div class="card">
                <center>
                <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->titulo }}">
                </center>
            <h5 > {{ $livro->titulo }} </h5>
            @if (strlen($livro->descricao)>130)
            <?php
            $livro->descricao=substr($livro->descricao, 0, 130)."...";
            ?>
            @endif
            <div >
               
               
                <p class="size">{{ $livro->descricao }}</p>
                <p> <a href="/prof/verprof/{{$livro->user_id}}"> Autor: {{ $livro->user_name}}</p>
              
               <a href="/ler/verlivro/{{$livro->id}}"> Ver mais </a>
               <?php
               $i=0;
               ?>
              
                  @foreach($capitulos as $capitulo)
                  @if($capitulo->livro_id == $livro->id)
                  <?php
       $s[$i]=$capitulo->id;
      
       $i=$i+1;
       ?>
               
                @endif     
                @endforeach
                <?php
                $o=min($s);
               
                ?>
             
               <center>
            <p>   <a href="/ler/leitura/{{$livro->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
               </center>
               
            </div>
        </div>
    
   
    @endforeach
</div>
</div>
    @elseif ($filtro)
   <h2>  Exibindo resultado: </h2>
   <div id="events-container" class="col-md-12">
    <div id="cards-container" class="row">
        @foreach($livros as $livro)
     
            <div class="card">
                <center>
                <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->titulo }}">
                </center>
            <h5 > {{ $livro->titulo }} </h5>
            @if (strlen($livro->descricao)>130)
            <?php
            $livro->descricao=substr($livro->descricao, 0, 130)."...";
            ?>
            @endif
            <div >
               
               
                <p class="size">{{ $livro->descricao }}</p>
                <p> <a href="/prof/verprof/{{$livro->user_id}}"> Autor: {{ $livro->user_name}}</p>
              
               <a href="/ler/verlivro/{{$livro->id}}"> Ver mais </a>
               <?php
               $i=0;
               ?>
              
                  @foreach($capitulos as $capitulo)
                  @if($capitulo->livro_id == $livro->id)
                  <?php
       $s[$i]=$capitulo->id;
      
       $i=$i+1;
       ?>
               
                @endif     
                @endforeach
                <?php
                $o=min($s);
               
                ?>
             
               <center>
            <p>   <a href="/ler/leitura/{{$livro->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
               </center>
               
            </div>
        </div>
    
   
    @endforeach
</div>
</div>
    @else
    <h2>Livros novos: </h2>
   
    
        <div id="events-container" class="col-md-12">
            <div id="cards-container" class="row">
        @foreach($livros as $livro)
     
            <div class="card">
                <center>
                <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->titulo }}">
                </center>
            <h5 > {{ $livro->titulo }} </h5>
            @if (strlen($livro->descricao)>130)
            <?php
            $livro->descricao=substr($livro->descricao, 0, 130)."...";
            ?>
            @endif
            <div >
               
               
                <p class="size">{{ $livro->descricao }}</p>
                <p> <a href="/prof/verprof/{{$livro->user_id}}"> Autor: {{ $livro->user_name}}</p>
              
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
    
   
    @endforeach
</div>
</div>
    <br>
    @if($livs!='[]')
    <h2> Livros com poucas leituras: </h2>
    <div id="events-container" class="col-md-12">
    <div id="cards-container" class="row">
        @foreach($livs as $liv)
     
            <div class="card">
                <center>
                <img src="/img/livros/{{ $liv->image }}" alt="{{ $liv->titulo }}">
                </center>
            <h5 > {{ $liv->titulo }} </h5>
            @if (strlen($liv->descricao)>130)
            <?php
            $liv->descricao=substr($liv->descricao, 0, 130)."...";
            ?>
            @endif
            <div >
               
               
                <p class="size">{{ $liv->descricao }}</p>
                <p> <a href="/prof/verprof/{{$liv->user_id}}"> Autor: {{ $liv->user_name}}</p>
               
               <a href="/ler/verlivro/{{$liv->id}}"> Ver mais </a>
               
               <?php
               $i=0;
               $s=[];
               ?>
              
                  @foreach($capitulos as $capitulo)
                  @if($capitulo->livro_id == $liv->id)
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
            <p>   <a href="/ler/leitura/{{$liv->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
               </center>
               @endif
            </div>
        </div>
   

      
   
    @endforeach
</div>
</div>
@endif
    <br>
    <h2> Livros com poucas curtidas: </h2>
    <div id="events-container" class="col-md-12">
        <div id="cards-container" class="row">
        @foreach($lis as $li)
     
            <div class="card">
                <center>
                <img src="/img/livros/{{ $li->image }}" alt="{{ $li->titulo }}">
                </center>
            <h5 > {{ $li->titulo }} </h5>
            @if (strlen($li->descricao)>130)
            <?php
            $li->descricao=substr($li->descricao, 0, 130)."...";
            ?>
            @endif
            <div >
               
               
                <p class="size">{{ $li->descricao }}</p>
                <p> <a href="/prof/verprof/{{$li->user_id}}"> Autor: {{ $li->user_name}}</p>
               
               <a href="/ler/verlivro/{{$li->id}}"> Ver mais </a>
               <?php
               $i=0;
               $s=[];
               ?>
              
                  @foreach($capitulos as $capitulo)
                  @if($capitulo->livro_id == $li->id)
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
            <p>   <a href="/ler/leitura/{{$li->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
               </center>
               @endif
            </div>
        </div>
   
        @endforeach
    </div>
</div>
        @if($les!='[]')
        <br>
        <h2> Mais famosos: </h2>
        <div id="events-container" class="col-md-12">
            <div id="cards-container" class="row">
            @foreach($les as $le)
         
                <div class="card">
                    <center>
                    <img src="/img/livros/{{ $le->image }}" alt="{{ $le->titulo }}">
                    </center>
                <h5 > {{ $le->titulo }} </h5>
                @if (strlen($le->descricao)>130)
                <?php
                $le->descricao=substr($le->descricao, 0, 130)."...";
                ?>
                @endif
                <div >
                   
                   
                    <p class="size">{{ $le->descricao }}</p>
                    <p> <a href="/prof/verprof/{{$le->user_id}}"> Autor: {{ $le->user_name}}</p>
                   
                   <a href="/ler/verlivro/{{$le->id}}"> Ver mais </a>
                   <?php
               $i=0;
               $s=[];
               ?>
              
                  @foreach($capitulos as $capitulo)
                  @if($capitulo->livro_id == $le->id)
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
                <p>   <a href="/ler/leitura/{{$le->id}}/{{$o}}">   <input type="submit" class="btn btn-primary" name="ler" value="Ler">  </a> </p>
                   </center>
                   @endif
                </div>
            </div>

            @endforeach
        </div>
    </div>
        @endif
</div>
</div>
</div>
@endif
    </body>
</html>



   