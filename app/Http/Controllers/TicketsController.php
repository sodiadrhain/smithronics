<?php

namespace site\Http\Controllers;

use Illuminate\Http\Request;

use site\Http\Requests;
use site\Http\Controllers\Controller;
use site\Http\Requests\TicketsFormRequest;
use site\Ticket;
use Illuminate\Support\Facades\Input;
use Mail;
use Swift_Mailer;
use Swift_SmtpTransport;
class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $tickets = Ticket::all();
      return view('tickets.index', compact('tickets'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('contact');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketsFormRequest $request)
    {
      $slug = Input::get('slug');
      $ticket = new Ticket(array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'subject' => $request->get('subject'),
        'message' => $request->get('message'),
        'slug' => $slug
      ));
      $ticket->save();
      $sendmsg = Input::get('message');
      $backup = Mail::getSwiftMailer();
      $transport = Swift_SmtpTransport::newInstance('smithronics.com', 465, 'ssl');
      $transport->setUsername('support@smithronics.com');
      $transport->setPassword('SmithRonicsSupport101');
      $gmail = new Swift_Mailer($transport);
      Mail::setSwiftMailer($gmail);
      Mail::send('users.contact', array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'subject2' => $request->get('subject'),
        'message2' => $sendmsg,
        'ticket_id' => $slug
      ), function($message) {
             $message->from('support@smithronics.com')->to(Input::get('email'), Input::get('email'))->subject('['.Input::get('slug').']: '.Input::get('subject'));
         });
        Mail::send('users.contact2', array(
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'subject2' => $request->get('subject'),
           'message2' => $sendmsg,
           'ticket_id' => $slug
         ), function($message) {
                $message->from('support@smithronics.com')->to('support@smithronics.com', 'support@smithronics.com')->subject('New Support Ticket: ['.Input::get('slug').']: '.Input::get('subject'));
            });
    Mail::setSwiftMailer($backup);
      return redirect('/contact')->with('status', 'Your message has been submitted! Its unique id is: '.$slug.'; We will get back to you soon');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
