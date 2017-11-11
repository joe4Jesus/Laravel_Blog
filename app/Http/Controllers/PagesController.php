<?php 

namespace App\Http\Controllers;
use App\Post;

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

	public function postContact() {
		
	}
}

?>