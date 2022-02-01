<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>cadastro</title>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

            <link rel="stylesheet" href="css/styles.css" type="text/css">
            
           
      
    </head>
    <body>


        <x-jet-validation-errors class="mb-4" />
        <div class="d-flex justify-content-center h-100">
            <div class="register">
            
        <form method="POST" action="{{ route('register') }}">
            @csrf
<center>
            <h1> cadastro</h1>
</center>
            <div style=" margin-left: 65px">
               
               <x-jet-label for="name" value="{{ __('Nome') }}" /> 
           
                </div>
                <div style="margin-left: 40px">
               
                    <p>   <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </p>   
                     </div>
               
          
            <div style="margin-left: 65px">
           <x-jet-label for="email" value="{{ __('Email') }}" /> 
            </div>
            <div style="margin-left: 40px">
               <p> <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
               </p>
            </div>

            
            <div style="margin-left: 65px">
                 <x-jet-label for="password" value="{{ __('Senha') }}" /> 
            </div>
            <div style="margin-left: 40px">
          <p>      <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
          </p>   
        </div>

          
            <div style="margin-left: 65px">
                <x-jet-label for="password_confirmation" value="{{ __('Confirme a senha') }}" /> 
            </div>
            <div style="margin-left: 40px">
             <p>   <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
             </p>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            
             <div class="flex items-center justify-end mt-4">
              <center>
                <input type="submit" class="btn btn-primary" name="Register" value="Register">
              </center>
            </div>
            <br>
            
            <div >
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('já tem uma conta?') }}
                </a>
            </div>
           
        </form>
        </div>
        </div>
    </body>
</html>