<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\User;
use App\Models\Capitulo_user;
use App\Models\Capitulo;
use App\Models\Comentario;
use App\Models\Biblioteca;
use CreateCapituloUserTable;
use CreateVotosCapituloTable;

class LivroController extends Controller
{
    public function index() {
 
            $livros = Livro::all();
            $capitulos = Capitulo::all();
           
         
    
        return view('welcome',['livros' => $livros, 'capitulos'=>$capitulos]);

    }
public function dashboard(){
    $filtro = request('filtro');
        $search = request('search');

        if($filtro){
            $capitulos = Capitulo::all();
            $livros = Livro::where('categoria', '=', $filtro)->get();
          
        } 

       

        elseif($search) {
            $capitulos = Capitulo::all();
            $livros = Livro::where('titulo', 'like', '%'.$search.'%')
           ->orwhere(
                'tags', 'like', '%'.$search.'%'
                )
          ->orwhere(
                'user_name', 'like', '%'.$search.'%'
                )->get();
              

        } 
        else {
            $capitulos = Capitulo::all();
            $livros = Livro::orderBy('created_at', 'DESC')->get();
     
               
        }      
        $livs=Livro::where('leitura', '<', 12)->get();
        $lis= Livro::where('voto', '<', 10)->get();
        $les= Livro::where('leitura', '>', 12)
        ->orwhere(
            'voto', '>', 10
            )
      ->orwhere(
            'comentario', '>', 10
             )->get();
        return view('/dashboard',['capitulos'=>$capitulos, 'les'=>$les, 'lis'=>$lis,'livs'=>$livs, 'livros' => $livros, 'search' => $search, 'filtro'=>$filtro]);
    
}
    public function create() {
        return view('escrever/escrever');
    }

    public function store(Request $request) {

        $livros = new Livro;

        $livros->titulo = $request->titulo;
        $livros->descricao = $request->descricao;
        $livros->categoria = $request->categoria;
        $livros->maior = $request->maior;
        $livros->dir = $request->dir;
        $livros->tags = $request->tags;
        $livros->voto = 0;
        $livros->comentario = 0;
        $livros->leitura = 0;
      if ($livros->titulo== null || $livros->descricao== null || $livros->categoria== null|| $livros->maior== null|| $livros->dir== null|| $livros->tags== null){
        return redirect('escrever/escrever')->with('msg', 'Preencha todos os campos corretamente!');
      }
      
   
        // Image Upload
      
        else{
        $user = auth()->user();
        $livros->user_id = $user->id;
      $livros->user_name=$user->name;
      if($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/livros'), $imageName);

        $livros->image = $imageName;

    }
        $livros->save();

        return redirect('/editarlivro')->with('msg', 'Livro criado com sucesso!');
        }
    }

    public function show($id) {
        $user = auth()->user();
        $listas = Biblioteca::all();
       
      
        $livros = Livro::findOrFail($id);
        $capitulos = Capitulo::all();

        return view('/ler/verlivro', ['user'=>$user, 'livros' =>  $livros , 'capitulos'=>$capitulos , 'listas'=>$listas]);
        
    }
    public function lercap( $id, $capid) {
        $user = auth()->user();
        $is= $user->id;
        $livro = Livro::findOrFail($id);
        $capitulo = Capitulo::findOrFail($capid);
        $capitulo->leit= $capitulo->leit+1;
        $comentarios=Comentario::where('capitulo_id', '=', $capid)->get();
   
        $capitulos = Capitulo::all();
        $curtiu=null;
       
        $like = Capitulo_user::where([['capitulo_id', '=', $capid], ['user_id', '=', $is]])->first();
      
      
        if ($like!=null && $like!='[]') {
          
            $already_like = true;
        
    
            if ($already_like == true ) {
               
                $curtiu=true;
                
            } 
            }
         else {
           
            $curtiu= false;
        }
       
      
      
          
           $livro->comentario=$livro->comentario+ $capitulo->co;
           $livro->leitura=$livro->leitura+ $capitulo->leit;
           $livro->update();
        
        return view('/ler/leitura', [ 'curtiu'=>$curtiu, 'comentarios'=>$comentarios,'user'=>$user, 'livro'=>$livro, 'capitulo' =>  $capitulo, 'capitulos'=>$capitulos]);
        
    }
    public function curtir($id, $capid){
        $user = auth()->user();
        $is= $user->id;
        $livro = Livro::findOrFail($id);
        $capitulo = Capitulo::findOrFail($capid);
       
        $comentarios=Comentario::where('capitulo_id', '=', $capid)->get();
      $curtiu=null;
        $capitulos = Capitulo::all();
        $like = Capitulo_user::where([['capitulo_id', '=', $capid], ['user_id', '=', $is]])->first();
      
      
        if ($like!=null && $like!='[]') {
          
            $already_like = true;
        
    
            if ($already_like == true ) {
                $like->delete();
                $z=$capitulo->vot;
                $z=$z-1;
                $capitulo->vot=$z;
                $curtiu=false;
                $capitulo->update();
            } 
            }
         else {
            $like = new Capitulo_user();
            $like->like = true;
            $like->user_id = $user->id;
            $like->capitulo_id = $capitulo->id;
            $z=$capitulo->vot;
           
            $z=$z+1;
            $capitulo->vot=$z;
            $like->save();
            $capitulo->update();
            $curtiu= true;
        }
       
      
           $livro->voto=$livro->voto+ $capitulo->vot;
          
           $livro->update();
        
        return view('/ler/leitura', [ 'comentarios'=>$comentarios,'like'=>$like,'user'=>$user, 'livro'=>$livro, 'capitulo' =>  $capitulo, 'capitulos'=>$capitulos, 'curtiu'=>$curtiu]);
        
    }
  
    public function salvar(Request $request, $id) {
       
                $user = auth()->user();
        $livros = Livro::findOrFail($id);
        if($user->id != $livros->user_id) {
            return redirect('/dashboard');
        }
        $capitulos= new Capitulo();
        $capitulos->livro_id=$livros->id;
      $capitulos->vot=0;
      $capitulos->leit=0;
      $capitulos->co=0;
    $capitulos->nomecap =$request->nomecap;

   
     
        if($request->hasFile('cap') && $request->file('cap')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('/img/cap'), $imageName);

            $capitulos['cap'] = $imageName;

        }
      else {
        $capitulos->cap = $request->cap;
      }
      if ($capitulos->nomecap== null ||$capitulos->cap== null ){
          echo 'Preencha todos os campos corretamente!';
        return view('escrever/novocap', ['livros'=>$livros, 'capitulos'=>$capitulos]);
      }
      else{
        $capitulos->save();
        return redirect( '/editarlivro');
      }
    }
  
    public function criar($id) {
        $livros = Livro::findOrFail($id);
        return view('/escrever/novocap', ['livros'=>$livros]);
    }
    public function editarlivro(){
        $user = auth()->user();
       
        $livros = $user->livros;
        $capitulos= Capitulo::all();
       
        $meusLivros = $user->meusLivros;
        
        return view('/escrever/editarlivro', 
            ['livros' => $livros, 'meusLivros' => $meusLivros, 'capitulos'=> $capitulos]
        );
    
    }
   
    public function edit($id) {

        $user = auth()->user();

        $livros = Livro::findOrFail($id);

        if($user->id != $livros->user_id) {
            return redirect('/dashboard');
        }

        return view('escrever/edit', ['livros' => $livros]);

    }
    public function update(Request $request) {



        $livros = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/livros'), $imageName);

            $livros['image'] = $imageName;
        }
        
        Livro::findOrFail($request->id)->update( $livros);

        return redirect('/editarlivro')->with('msg', 'Livro editado com sucesso!');
    }
    public function editcap($id, $idcap) {

        $user = auth()->user();
        $livro = Livro::findOrFail($id);
        $capitulo = Capitulo::findOrFail($idcap);

        if($user->id != $livro->user_id) {
            return redirect('/dashboard');
        }

        return view('escrever/editcap', ['livro'=>$livro, 'capitulo' => $capitulo]);

    }
    public function updatecap(Request $request, $id, $idcap) {


        $livro = Livro::findOrFail($id);
        $capitulo =  Capitulo::findOrFail($request->idcap);
        $capitulo->nomecap = $request->nomecap;
        if($request->hasFile('cap') && $request->file('cap')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('/img/cap'), $imageName);

            $capitulo['cap'] = $imageName;

        }
      else {
        $capitulo->cap = $request->cap;
      }
        
     $capitulo->update();

        return redirect('/editarlivro')->with('msg', 'capitulo editado com sucesso!');
    }
    public function destroy($id) {

        Livro::findOrFail($id)->delete();

        return redirect('/editarlivro')->with('msg', 'livro excluido com sucesso!');

    }
    public function destroycap($id) {

        Capitulo::findOrFail($id)->delete();

        return redirect('/editarlivro')->with('msg', 'capitulo excluido com sucesso!');

    }
   
    public function addlista(Request $request, $id) {

        $user = auth()->user();
        $v=$user->id;
        $livro = Livro::findOrFail($id);
        
        
        $like = Biblioteca::where([ ['livro_id', '=', $id], ['user_id', '=', $v]])->get();
        if ($like!=null && $like!='[]') {
            return redirect('/ler/biblioteca')->with('msg', 'Esse livro já está na lista!');
        }
        else{
        $biblio = new Biblioteca;
      

        $biblio->livro_id= $request->id;
        $biblio->user_id = $user->id;
        $biblio->user_name=$user->name;
       
       
        $biblio->save();
        }
        return redirect('/ler/biblioteca')->with('msg', 'Livro salvo com sucesso!');
        
        
    }
 
    
    public function showbiblioteca(){
        $user = auth()->user();
       
        $listas = Biblioteca::all();  
        
        $capitulos = Capitulo::all();
       
       
        $livros = Livro::all();
  

        return view('/ler/biblioteca', 
            ['capitulos'=>$capitulos,'listas' => $listas, 'livros'=>$livros, 'user'=>$user]
        );
    }
    public function comentar( Request $request, $id, $idcap) {
       
        $user = auth()->user();
        $is= $user->id;
$livro = Livro::findOrFail($id);
$capitulo = Capitulo::findOrFail($idcap);
$capitulos = Capitulo::all();
$coment= new Comentario();
$comentarios=Comentario::where('capitulo_id', '=', $idcap)->get();
$coment->coment=$request->comentario;
$coment->capitulo_id=$capitulo->id;
$coment->user_id=$user->id;
$coment->user_name=$user->name;



if ($coment->coment!=null){
$coment->save();
$capitulo->co= $capitulo->co+1;
$capitulo->save();

    
$livro->voto=$livro->voto+ $capitulo->vot;
$livro->comentario=$livro->comentario+ $capitulo->co;
$livro->leitura=$livro->leitura+ $capitulo->leit;
$livro->update();
}
$curtiu=true;

return view('/ler/leitura', [ 'comentarios'=>$comentarios,'curtiu'=>$curtiu, 'coment'=>$coment, 'user'=>$user, 'livro'=>$livro, 'capitulo' =>  $capitulo, 'capitulos'=>$capitulos]);

}

   }




