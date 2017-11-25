<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->with('posts', $posts);
	}

	public function getAbout() {
		$first = "Joseph";
		$last = "Jonathan";
		$fullname = $first . " " . $last;
		$username = "Joe4Jesus";
		$email = "joemario35@gmail.com";
		$data = [];
		$data['username'] = $username;
		$data['fullname'] = $fullname;
		$data['email'] = $email;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, array(
			'name' => 'required|max:255', 
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:3'
		));

		$data = array(
			'name' => $request->name,
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);

		Mail::send('emails.contact', $data, function($message) use ($data) {
			$message->from($data['email']);
			$message->to('hello@fortwebtech.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Message Sent Successfully!!! We will get back to you soon.');

		return redirect('/');
	}
}

?>