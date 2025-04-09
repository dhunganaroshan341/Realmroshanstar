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
use Illuminate\Support\Facades\Log;

class UserFrontendController extends Controller
{

    public function home()
    {
        $frontend = Setting::first();
        $homeslides = HomeSlide::where('status', 'Active')->get();
        // dd($homeslides);
        $testimonials = Testimonial::where('status', 'Active')->get();
        $notice = Notice::where('status', 'Active')->first();
        // dd($notice);
        $content_title="Home";

        return view('frontend.home', compact(['frontend', 'homeslides', 'testimonials', 'notice','content_title']));

    }
    public function aboutUs()
    {
        $users = User::where('role', 'Admin')->get();
        $frontend = Setting::first();
        $content_title="About Us";

        return view('frontend.about', compact('users', 'frontend','content_title'));
    }

    public function service()
    {
        $services = Service::where('status', 1)->get();
        $content_title="Services";

        return view('frontend.services', compact('services','content_title'));
    }

    public function servicedetail($id)
    {
        $serviceDetail = Service::find($id);
        $posts = Post::with('category', 'postImages')
            ->latest()
            ->get();
            $content_title="Service Detail";

        if (!$serviceDetail || !$posts) {
            abort('404');
        }

        return view('frontend.service-detail', compact('serviceDetail', 'posts','content_title'));
    }

    public function blog(){
        $content_title="Blogs";

        $posts=Post::with('postImages')->where('status','Active')->get();
        return view('frontend.blog',compact('posts','content_title'));
    }

    public function blogDetail($id)
    {
        $content_title="Blog Detail";

        $images = Post::with(['postImages' => function ($query) use ($id) {
            $query->where('post_id', $id);
        }])->findOrFail($id);
        $post = Post::with(['createdBy', 'category', 'postImages', 'comments'])->find($id);
        $comments = Comment::with('user')->where('commentable_id', $id)->get();

        $detail = Post::with('category', 'postImages', 'comments', 'createdBy', 'updatedBy', 'category')->find($id);
        return view('frontend.post-template', compact('detail','images','post','comments','detail','content_title'));
    }
    public function contactUs()
    {
        $content_title="Home";

        return view('frontend.contact',compact('content_title'));
    }

    public function storeContactUs(ContactRequest $request)
    {
        try {
            Contact::create($request->validated());
            return response()->json(['status'=>true,'message' => 'Message has been Submited']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['status'=>false,'message' => 'Something went wrong']);
        }
    }

}
