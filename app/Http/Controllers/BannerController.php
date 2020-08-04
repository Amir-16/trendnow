<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=banner::paginate(5);

        return view('dashboard.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            if ($request->hasFile('picture'))
            {
                $bannerdata= $request->all();
                $picturename=time().'__'.$request->picture->getClientOriginalName();
                 $request->picture->move('images/Banners',$picturename);
                 $bannerdata['picture']=$picturename;
               banner::create($bannerdata);
                return redirect()->route('banners.create')->with('message','Data insertion successful');

            }
            else {
                $bannerdata= $request->all();
                banner::create($bannerdata);
                return redirect()->route('banners.create')->with('message','Data insertion successful');
            }


        }
        catch (QueryException $e)
        {
            {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('dashboard.banners.show',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('dashboard.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        try {


            if ($request->hasFile('picture'))
            {
                $updatedata= $request->all();
                $picturename=time().'__'.$request->picture->getClientOriginalName();
                $request->picture->move('images/Banners',$picturename);
                $updatedata['picture']=$picturename;

                $banner->update($updatedata);
                return redirect()->route("banners.show",[$banner])->with('message','Data updated successful');


            }
            else
            {
                $updatedata= $request->all();
                $banner->update($updatedata);
                return redirect()->route("banners.show",[$banner])->with('message','Data updated successful');
            }


        }
        catch (QueryException $e)
        {
            {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        try {
            $banner->delete();
            return redirect()->route('banners.index')->with('message','Data deleted successful');
        }
        catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
