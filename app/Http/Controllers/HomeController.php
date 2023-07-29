<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Work;
use App\Models\About;
use App\Models\Experience;
use App\Models\Educations;
use App\Models\Social;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home');
    }
    public function about()
    {
        $abouts = About::all();
        return view('front.about',compact('abouts'));
    }
    public function resume()
    {
        
        return view('front.resume');
    }
    public function services()
    {
        $services = Service::all();
        return view('front.services',compact('services'));
    }

    public function portfolio()
    {
        $works = Work::all();
        $services = Service::all();
        return view('front.portfolio',compact('works','services'));
    }
    public function detail($id)
    {
        $detail = Work::where(['id'=>$id])->first();
        return view('front.detail',compact('detail'));
    }
    public function contact()
    {
        return view('front.contact');
    }

    public function login()
    {
        return view('front.auth.login');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
