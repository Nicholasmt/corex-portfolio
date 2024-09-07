<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $socials = Social::where('active',1)->get();
        return view('front.home',compact('socials'));
    }

    public function about()
    {
        $contact = Contact::first();
        $qualifications = Education::get();
        $socials = Social::where('active',1)->get();
        $skills = Skill::where('active',1)->get();
        return view('front.about',compact('socials','contact','skills','qualifications'));

    }

    public function resume()
    {
        $contact = Contact::first();
        $educations = Education::get();
        $experiences = Experience::get();
        $services = Service::get();
        return view('front.resume',compact('experiences','contact','educations','services'));

    }

    public function services()
    {
         $services = Service::get();
        return view('front.services',compact('services'));
    }

    public function projects()
    {
        $services = Service::get();
        $projects = Project::get();
        return view('front.projects',compact('projects','services'));
    }

    public function blog()
    {
       $blogs = Blog::get();
        return view('front.blog',compact('blogs'));
    }

    public function contact_me()
    {
        $contact = Contact::first();
        $socials = Social::where('active',1)->get();
        return view('front.hire-me',compact('contact','socials'));
    }

}
