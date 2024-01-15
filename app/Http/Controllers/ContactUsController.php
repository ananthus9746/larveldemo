<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('pages.contact-us');
    }

    public function send_mail(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;

        $mail = new PHPMailer\PHPMailer(true);
        // $mail->SMTPDebug = PHPMailer\SMTP::DEBUG_SERVER;             //Enable verbose debug output
        $mail->isSMTP();                                                //Send using SMTP
        $mail->Host       = 'mail.archistone.com';             //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
        $mail->Username   = 'contact-us-page@archistone.com';       //SMTP username
        $mail->Password   = '8pIVawL8w7Q5yh6R';                             //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;   //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('contact-us-page@archistone.com', 'Archistone');
        $mail->addReplyTo($email, $name);

        $mail->addAddress('abranasays@gmail.com', 'Ulegendary Digital');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'From Ulegendary Digital Website Archistone';
        $mail->Body    = '
            <p><strong>Name:</strong> ' . $first_name . ' ' . $last_name . '</p>

            <p><strong>Email:</strong> ' . $email . '</p>

            <p><strong>Phone Number:</strong> ' . $phone . '</p>

            <p><strong>Message:</strong> </p>

            <p>' . $message . '</p>
        ';

        if ($mail->send()) {
            return back()->with('status', 'success')->with('msg', 'Message has been sent');
        } else {
            return back()->width('status', 'error')->with('msg', 'Message failed to send');
        }
    }
}
