<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function test(){
        return view('index');
    }

    /* contactview */

    public function contact()
    {
        $categories=Category::all();
        return view('contactform',compact('categories'));
    }

/* request->confirm  */
    public function confirm(Request $request){
        $confirm=$request->only(['first_name','last_name','gender','email','address','detail','building','category_id']);

        $category=Category::find($confirm['category_id']);
        
        $telParts=$request->input('tel');
        $tellnumber=implode('',$telParts);
        $confirm['tel']=$tellnumber;
        return view('confirmation',compact('confirm','category'));
    }

    /* confirm->create */

    public function create(Request $request)
    {
        $contact=$request->only(['first_name','last_name','gender','email','address','detail','building','tel','category_id']);
        Contact::create($contact);
        return view('thanks');
    }

    /* admin view */

    public function index(){
        $contacts=Contact::with('category')->get();
        return view('index',compact('contacts'));
    }
}
