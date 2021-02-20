<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\ShortLink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
   
        return view('shortenLink', compact('shortLinks'));
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'url' => 'required|url'
        ]);
   
        $input['title'] = $request->title;
        $input['url'] = $request->url;
        $input['short'] = Str::random(6);
   
        ShortLink::create($input);
  
        return redirect('/')
             ->with('success', 'Short Url Created Successfully!');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($short)
    {
        $find = ShortLink::where('short', $short)->first();
   
        return redirect($find->url);
    }
}