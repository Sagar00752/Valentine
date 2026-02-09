<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ValentineMail;

class MailController extends Controller
{
    public function sendValentine()
    {
        Mail::to('sagargaikwad00752@gmail.com')->send(new ValentineMail("Sagar"));

        return "Valentine mail sent successfully 💌";
    }
}
