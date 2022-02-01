@extends('layouts.main')
<!DOCTYPE html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Carteira</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body>
     

<br>
<br>
<br>
  
<center>
    <div class="register">
        <br>
    <h2>Saldo disponível:</h2> 
    <p> R$ 20,00 </p>
<br>

<h2> Sacar dinheiro </h2>
    <form action="/prof/sacar" method="POST">
        @csrf
        {{ csrf_field() }}
        <p> Digite seu usuário do Picpay: </p>
     <p>   <input type="text" id="picpay" name="picpay" >    </p>
       
        <p> Quanto deseja sacar? </p>
         <p>   <input type="text" id="valor" name="valor" >    </p>
           
        
            
      
        <input type="submit" class="btn btn-primary" name="sacar" value="Sacar"> 
       
    </form>
</div>
           
       
</center>
</body>
</html>


   