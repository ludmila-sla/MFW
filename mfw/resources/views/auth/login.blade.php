<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>login</title>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

            <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body>


        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="d-flex justify-content-center h-100">
            <div class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <center>
                <h1> Login</h1>
    </center>
    <div style=" margin-left: 30px">
                <x-jet-label for="email" value="{{ __('Email') }}" />
            </div>

            <div style="margin-left: 30px">
               <p> <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
               </p>  </div>

            <div style=" margin-left: 30px">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
            </div>

            <div style="margin-left: 30px">
              <p>  <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
              </p>   </div>

           
            <div class="flex items-center justify-end mt-4">
                <center>
                  <input type="submit" class="btn btn-primary" name="login" value="login">
                </center>
              </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
                
            </div>
        </form>
            </div>
        </div>
    </body>
    </html>