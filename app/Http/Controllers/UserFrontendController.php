<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\frontend;
use App\Models\User;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\HomeSlide;
use App\Models\Notice;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;

class UserFrontendController extends Controller
{

    public function home(){
        $frontend=Setting::first();
        $homeslides=HomeSlide::where('status','Active')->get();
        // dd($homeslides);
        $testimonials=Testimonial::where('status','Active')->get();
        $notice=Notice::where('status','Active')->first();
        // dd($notice);
        return view('frontend.home',compact(['frontend','homeslides','testimonials','notice']));
    }
    public function aboutUs(){
        $users=User::where('role','Admin')->get();
        $frontend=Setting::first();
        return view('frontend.about',compact('users','frontend'));
    }

    public function service(){
        $services=Service::where('status',1)->get();
        return view('frontend.services',compact('services'));
    }

    public function servicedetail($id){
        $serviceDetail=Service::find($id);
        $posts = Post::with('category', 'postImages')
        ->latest()
        ->take(4)
        ->get();
   if(!$serviceDetail || !$posts){
            abort('404');
        }

        return view('frontend.service-detail',compact('serviceDetail','posts'));
    }
    public function contactUs(){
        return view('User.contact',);
    }

    public function storeContactUs(ContactRequest $request){
        try{
            Contact::create($request->validated());
            return back()->with(['message'=>'Message has been Submited']);
        }catch(\Exception $e){
            return back()->with(['error'=>'Something Went Wrong!']);
        }
    }


    public function post()
    {
        $posts = Post::with(['createdBy', 'category','postImages'])->where('status', 'Active')->orderBy('id','desc')->paginate(5);
        // dd($posts);
        return view('User.Post.post', compact('posts'));
    }

    public function singlePost($id)
    {
        $images = Post::with(['postImages' => function($query) use ($id) {
            $query->where('post_id', $id);
        }])->findOrFail($id);
        $post = Post::with(['createdBy', 'category','postImages','comments'])->find($id);
        $comments = Comment::with('user')->where('commentable_id',$id )->get();
        return view('User.Post.single-post', compact('post','comments','images'));
    }


}
