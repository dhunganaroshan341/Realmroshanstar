<?php

use App\Models\FeaturedService;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Cta;
use App\Models\Post;

function getSettings(){
    return Setting::first();
}

function getServices(){
    return FeaturedService::leftJoin('services','services.id','featured_services.service_id')
    ->orderBy('sort_order','ASC')
    ->get();
}

function getLatestBlog(){
    $blogs = Post::where('status',1)->orderBy('created_at','DESC')->take(6)->get();
    return $blogs;
}



?>
