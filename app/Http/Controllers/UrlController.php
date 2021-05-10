<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UrlRequest;


class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Url::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    

    public function store(UrlRequest $request){
        $url  = Url::create($request->all());
        return response($url ,Response::HTTP_CREATED);   
    }

    
    public function show(Url $url)
    {   
        $url->increment('visits');
        return redirect($url->original_url);
    }



    public function edit(Url $url)
    {
        //
    }




    public function update(Request $request, Url $url)
    {
        //
    }



    public function destroy(Url $url)
    {
       $url->delete();
       return response("",Response::HTTP_NO_CONTENT);
    }
}
