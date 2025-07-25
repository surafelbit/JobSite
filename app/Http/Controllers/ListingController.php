<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    public function index(){
        // dd(request()->tag);
        return view('listing.index',['heading'=>'latest Listings',
        'lists'=>Listing::latest()->filter(request(['tag','search']))->paginate(5)]);
        }
    public function show(Listing $listing){
        return view('listing.show',['listing'=>$listing]);

    }
    public function create(){
        return view ('listing.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $formRequest = $request->validate([
            'company'=>['required',Rule::unique('listings','company')],
            "title"=>"required",
            "location"=>"required",
            "website"=>"required",
            "email"=>["required","email"],
            "tags"=>"required",
            "description"=>"required"
            ]
        );
        if($request->hasFile('logo')){
            $formRequest['logo']=$request->file('logo')->store('logos','public');
        }
        $formRequest['user_id']=auth()->id();

        Listing::create($formRequest);
        return redirect("/")->with('message','listing created succesfully');
    }
    public function edit(Listing $listing){
     return view('listing.edit',['listing'=>$listing]);
    }
    public function update(Request $request, Listing $listing){
        if($listing->user_id !== auth()->id()){
            abort(403,"Unauthorized Action");
        }
        $formRequest = $request->validate([
            'company'=>['required'],
            "title"=>"required",
            "location"=>"required",
            "website"=>"required",
            "email"=>["required","email"],
            "tags"=>"required",
            "description"=>"required"
            ]
        );
        if($request->hasFile('logo')){
            $formRequest['logo']=$request->file('logo')->store('logos','public');
        }
        $formRequest['user_id']=auth()->id();
        $listing->update($formRequest);
        return back()->with('message','listing updated succesfully');
    
    }
    public function destroy(Request $request, Listing $listing){
        if($listing->user_id !== auth()->id()){
            abort(403,"Unauthorized Action");
        }
        $listing->delete();
        return redirect("/")->with("message","succesfully deleted");
    }
    public function manage(){
        return view('listing.manage',['listing'=>auth()->user()->listing()->get()]);
    }
}
