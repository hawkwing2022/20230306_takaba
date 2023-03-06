<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public $form_data = [
        ["last_name", 'text'],
        ["first_name", 'text'],
        ["gende", 'tinyint'],
        ["email", 'email'],
        ["postcode", 'char(8)'],
        ["address", 'text'],
        ["building_name", 'text'],
        ["opinion", 'text'],
    ];

    public function inquiry()
    {
        return view('inquiry', ['form_data' => $this->form_data,]);
    }

    public function confirm (Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'postcode' => 'required | min:8 | max:8',
            'address' => 'required',
            'opinion' => 'required',
        ]);
        $inputs = $request->all();
        $request->session()->reflash();
        return view('confirm', ['inputs' => $inputs]);
    }

    public function submit(Request $request)
    {
        $form = $request->all();
        Contact::create($form);
        return view('thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
    public function manage()
    {
        return view('manage');
    }

    public function search(Request $request)
    {
        $name = $request['name'];
        $gender = $request['gender'];
        $frd = $request['from_cfmdate'];
        $tod = $request['to_cfmdate'];
        $email = $request['email'];
        $contents = Contact::doSearch($name, $gender, $frd, $tod, $email);
        return view('manage', ['contents' => $contents]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return back();

    }
}
