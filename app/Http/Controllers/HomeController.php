<?php

namespace App\Http\Controllers;

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
        $contacts = Contact::get();
        $socials = Social::where('active',1)->get();
        $skills = Skill::where('active',1)->get();

        return view('front.about',compact('socials','contacts','skills'));
    }

    public function resume()
    {
        $contacts = Contact::get();
        $educations = Education::get();
        $experiences = Experience::get();
        $services = Service::get();
        return view('front.resume',compact('experiences','contacts','educations','services'));
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
        $services = Service::get();
        $projects = Project::get();
        return view('front.blog',compact('projects','services'));
    }

}
