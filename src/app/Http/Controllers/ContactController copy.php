<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactFormRequest;

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
    public function confirm(ContactFormRequest $request){

        /* 入力内容の保持 */

        $input=$request->all();
        session(['contact_form-input' =>$input]);
        session(['contact_form-telparts'=>$input['tel']]);

        $confirm=$request->only(['first_name','last_name','gender','email','address','detail','building','category_id']);

        $category=Category::find($confirm['category_id']);
        $telParts=$request->input('tel');
        $tellnumber=implode('',$telParts);
        $confirm['tel']=$tellnumber;
        return view('confirmation',compact('confirm','category',));
    }

    /* confirm->create */

    public function create(Request $request)
    {
        $contact=$request->only(['first_name','last_name','gender','email','address','detail','building','tel','category_id']);
        Contact::create($contact);
        return view('thanks');
    }

    /* admin view */

    // public function index(){
    //     $contacts=Contact::with('category')->get();
    //     $categories=Category::all();
    //     return view('index',compact('contacts','categories'));
    // }

    /* delete action */

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    /* search action */
    public function allsearch(Request $request){
        $name_email=$request->input('name_email');
        $gender=$request->input('gender');
        $date=$request->input('date');
        $category_content=$request->input('category_content');

        $contacts=Contact::with('category')->allSearch($name_email,$gender,$date,$category_content)->paginate(7);
        $categories=Category::all();

        return view('index',compact('contacts','categories'));
    }
}
