<?php

class ContactsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $contacts = Contact::all();

		// load the view and pass the nerds
		return View::make('contacts.index')
			->with('contacts', $contacts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('contacts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            
		$rules = Contact::$rules;
             
            	$validator = Validator::make(Input::all(),$rules);
		// process the login
		if ($validator->fails()) {
			return Redirect::to('contacts/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
                        $contact = new Contact;
			$contact->name       = Input::get('name');
			$contact->email      = Input::get('email');
			$contact->message = Input::get('message');
			$contact->save();
                        //send mail
                        $data['contact'] = $contact;
                        Mail::send('emails.contactstore', $data, function($message)
                        {
                            $message->to('mailer@example.tld', 'mailer')->subject('Contact form results');
                        });
			// redirect
			Session::flash('message', 'Successfully created contact!');
			return Redirect::to('contacts');
		}
                
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('contacts.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('contacts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
