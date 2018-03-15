<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo','descricao','user_id','conteudo','data'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public static function listaArtigos($paginate)
    {
        $user = auth()->user();

        if($user->admin == "S"){
            $listaArtigos = Artigo::select('id','titulo','descricao','user_id','data')->paginate($paginate);
            foreach ($listaArtigos as $key => $value) {
                //Primeira e Melhor Possibilidade de Consulta
                $value->user_id = User::find($value->user_id)->name;
                $value->data = \Carbon\Carbon::parse($value->data)->format('d-m-Y');
                //Segunda Possibilidade de Consulta utilizando o Model
                //$value->user_id = $value->user_name;
                //unset($value->user);
            }
        }else
        {
            $listaArtigos = Artigo::select('id','titulo','descricao','user_id','data')->where('user_id','=',$user->id)->paginate($paginate);
            foreach ($listaArtigos as $key => $value) {
                //Primeira e Melhor Possibilidade de Consulta
                $value->user_id = User::find($value->user_id)->name;
                $value->data = \Carbon\Carbon::parse($value->data)->format('d-m-Y');
                //Segunda Possibilidade de Consulta utilizando o Model
                //$value->user_id = $value->user_name;
                //unset($value->user);
            }
        }

            //Terceira Possibilidade de Consulta, utilizando relacionamento manual pelo DB
            /*
            $listaArtigos = DB::table('artigos')
                            ->join('users','users.id','=','artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao','users.name','artigos.data')
                            ->whereNull('deleted_at')
                            ->paginate($paginate);
            */

        return $listaArtigos;
    }

    public static function listaArtigosSite($paginate, $busca = null)
    {
        if($busca){
            $listaArtigosSite = DB::table('artigos')
                            ->join('users','users.id','=','artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao','users.name as autor','artigos.data')
                            ->whereNull('deleted_at')
                            ->whereDate('data','<=',date('Y-m-d'))
                            ->where(function($query) use ($busca){
                              $query->orWhere('titulo','like','%'.$busca.'%')
                                    ->orWhere('descricao','like','%'.$busca.'%');
                            })    
                            ->orderBy('data','DESC')
                            ->paginate($paginate);
        }else{
            $listaArtigosSite = DB::table('artigos')
                            ->join('users','users.id','=','artigos.user_id')
                            ->select('artigos.id','artigos.titulo','artigos.descricao','users.name as autor','artigos.data')
                            ->whereNull('deleted_at')
                            ->whereDate('data','<=',date('Y-m-d'))
                            ->orderBy('data','DESC')
                            ->paginate($paginate);
        }    
        return $listaArtigosSite;
    }
}
