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
        session()->flash('contact_form-input', $input);
        session()->flash('contact_form-telparts', $input['tel']);

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

    /* csv export */

    public function exportCsv(Request $request){

    /* 検索条件の取得 */
    $name_email=$request->input('name_email');
    $gender=$request->input('gender');
    $date=$request->input('date');
    $category_content=$request->input('category_content');

    $items = Contact::with('category')->allSearch($name_email,$gender,$date,$category_content)->get();
    $filename = 'contact_list_' . date('Y-m-d_His') . '.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename={$filename}",
        'Pragma' => 'no-cache',
        'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
        'Expires' => '0'
    ];

    $callback = function() use ($items) {
        $file = fopen('php://output', 'w');

        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

        // ヘッダー行を入れる場合
        fputcsv($file, ['お問合せ日時','お問い合わせの種類','名前','性別','メールアドレス','電話番号','住所','建物名','お問合せ内容']);

        foreach($items as $item){
            fputcsv($file, [
                $item->created_at,
                $item->category ? $item->category->content : '',
                $item->last_name. '  ' . $item->first_name,
                $item->gender==1 ? '男性' : ($item->gender==2 ? '女性' : 'その他'),
                $item->email,
                $item->tel,
                $item->address,
                ! empty($item->building) ? $item->building : '',
                $item->detail,
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}



}
