<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates=\App\Candidate::all();
        return view('candidates/index',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasfile('foto'))
         {
            $file = $request->file('foto');
            $file_name=time().$file->getClientOriginalName();
            $file_name = '/images/'.$file_name;
            $file->move(public_path().'/images/', $file_name);
         }
        $candidate = new \App\Candidate;
        $candidate->nome_completo=$request->get('nome_completo');
        $candidate->nome_exibicao=$request->get('nome_exibicao');
        $candidate->endereco=$request->get('endereco');
        $candidate->numero_candidato=$request->get('numero_candidato');
        $candidate->candidate_id=$request->get('candidate_id');
        $candidate->foto=$file_name;
        $candidate->save();
        
        return redirect('candidates/create')->with('success', 'Candidato criado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = \App\Candidate::find($id);
        return view('candidates/edit',compact('candidate','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidate= \App\Candidate::find($id);
        $candidate->nome_completo=$request->get('nome_completo');
        $candidate->nome_exibicao=$request->get('nome_exibicao');
        $candidate->numero_candidato=$request->get('numero_candidato');
        $candidate->endereco=$request->get('endereco');
        $candidate->party_id=$request->get('party_id');
        $candidate->save();
        return redirect('candidates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = \App\Candidate::find($id);
        $candidate->delete();
        return redirect('candidates')->with('success','Candidato foi deletado.');
    }
}
