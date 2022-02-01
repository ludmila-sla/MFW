<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Livro;
use App\Models\Biblioteca;

class UserController extends Controller
{
    public function show(){
        $user = auth()->user();
       
      
       
        
       

        return view('prof/myprofile', ['user'=>$user]);
    }

    public function adduser(Request $request) {

        $user = auth()->user();
        $id= $user->id;
        $user = User::findOrFail($id);
        $user->desc = $request->desc;
        $redes= $request->redes;
        $user->redes2 = $request->redes;
        if (!is_string ($redes)){
        $user->redes = $redes;
        }
        $er = "/((http|https|ftp|ftps):\/\/(www\.|.*?\/)?|www\.)([a-zA-Z0-9]+|_|-)+(\.(([0-9a-zA-Z]|-|_|\/|\?|=|&)+))+/i";
        preg_match_all ($er, $redes, $match);
 
        foreach ($match[0] as $link)
        {
            //coloca o 'http://' caso o link não o possua
            if(stristr($link, "http://") === false && stristr($link, "https://") === false)
            {
                $link_completo = "http://" . $link;
            }else{
                $link_completo = $link;
            }
             
            $link_len = strlen ($link);
 
            //troca "&" por "&", tornando o link válido pela W3C
           $web_link = str_replace ("&", "&amp;", $link_completo);
           $redes = str_ireplace ($link, "<a href=\"" . $web_link . "\" target=\"_blank\">". (($link_len > 60) ? substr ($web_link, 0, 25). "...". substr ($web_link, -15) : $web_link) ."</a> <br>", $redes);
            
        }
        $user->redes = $redes;
        if($request->hasFile('fotoperfil') && $request->file('fotoperfil')->isValid()) {

            $requestImage = $request->fotoperfil;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/perfil'), $imageName);

            $user['fotoperfil'] = $imageName;

        }
        if($request->hasFile('fotocapa') && $request->file('fotocapa')->isValid()) {

            $requestImage = $request->fotocapa;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/perfilcapa'), $imageName);

            $user['fotocapa'] = $imageName;

        }
        $user->save();
        
        return redirect('/prof/myprofile')->with('msg', 'Perfil alterado com sucesso!');

    }  
public function edit() {

    $user = auth()->user();
    $user = User::findOrFail($user->id);
   

    return view('/prof/editprofile', ['user'=>$user]);

    }




    public function showprof($id){
        $user = auth()->user();
      
        $prof = User::findOrFail($id);
      
       
       
        $listas = Biblioteca::all();
       
       
        $livros = Livro::all();
       
        
        
 
        return view('/prof/verprof', 
            ['user' => $user, 'prof'=>$prof, 'livros'=>$livros,  'listas'=>$listas]
        );
    }
}