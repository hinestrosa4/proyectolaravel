<?php
namespace App\Http\Controllers;

use App\Mail\NosecaenMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function store(Request $request)
    {
        $message=[
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->content,
            'archivo'=>$request->file('archivo')
        ];
        Mail::to($message['email'])->send(new NosecaenMail($message));
        return redirect()->route('')->with('status','Email enviado correctamente');
    }
}
