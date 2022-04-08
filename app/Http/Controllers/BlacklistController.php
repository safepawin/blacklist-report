<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\BlacklistImage;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blacklist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('images'));
        $blacklist = Blacklist::create([
            "product" => $request->product,
            "price" => $request->price,
            "identity_bank" => $request->identity_bank,
            "name" => $request->firstname,
            "lastname" => $request->lastname,
            "detail" => $request->detail,
            "preview_img" => ""
        ]);

        foreach ($request->images as $image) {
            $name = date('YmdHis') . $image->getClientOriginalName();
            $image->move(public_path() . '/images/' . $blacklist->identity_bank, $name);
            $blacklist_image = BlacklistImage::create([
                'image' => '/' . $blacklist->identity_bank . '/' . $name,
                'blackllists_id' => $blacklist->id
            ]);
        }
        $update_blacklist_image = Blacklist::find($blacklist->id)->update([
            'preview_image' => $blacklist_image->product_image
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blacklist  $blacklist
     * @return \Illuminate\Http\Response
     */
    public function show(Blacklist $blacklist)
    {
        $blacklist = Blacklist::find($blacklist->id);
        // dd($blacklist->id);
        return view('blacklist.show', compact('blacklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blacklist  $blacklist
     * @return \Illuminate\Http\Response
     */
    public function edit(Blacklist $blacklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blacklist  $blacklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blacklist $blacklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blacklist  $blacklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blacklist $blacklist)
    {
        //

    }

    public function showall($blacklist)
    {
        // dd($blacklist);
        $blacklists = Blacklist::where('identity_bank', "=", $blacklist)->get();

        return view('blacklist.showall')->with('blacklists', $blacklists);
    }

    public function findIdentityBank(Request $request)
    {
        $blacklist = Blacklist::where('identity_bank', 'like', "%{$request->identity_bank}%")->get();
        return view('welcome')->with('blacklist', $blacklist);
    }
}
