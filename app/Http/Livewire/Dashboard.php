<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Controller;
use App\Models\Service;
use App\Models\Work;
use App\Models\About;
use App\Models\Experience;
use App\Models\Educations;
use App\Models\Social;
use App\Models\User;
use Livewire\WithFileUploads;

class Dashboard extends Component
{ 
    
    use WithFileUploads;
    
    public $current,$services,$portfolios,$counter,$about,$experiences,$socials,$educations;
    public $title,$description,$icon;
    public $url,$client,$photos=[],$service_id;
    public $button,$update_id;
    public $name,$email,$old_pass,$new_pass,$confirm_pass;
    public $phone,$city,$address;
    public $degree,$institution,$started,$graduated;
    public $organization,$location,$start_year,$end_year;
    public $level;
     

    public function render()
    {
        $updated = Controller::where(['id'=>1])->first();
        $this->current = $updated->section;
        $this->counter = 1;
        $this->services = Service::all();
        $this->portfolios = Work::all();
        $this->socials = Social::all();
        $this->about = About::all();
        $this->experiences = Experience::all();
        $this->educations = Educations::all();
        return view('livewire.dashboard');
    }

    public function mount()
    {
       $id = session()->get('id');
       $user = User::where(['id'=>$id])->first();
       $this->name = $user->name;
       $this->email = $user->email;
    }

    public function dashboard()
    {
         
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>1]);
        }
        else
        {
            Controller::create(['section'=>1]);
        }

        session()->flash('section','1');
        $this->button = 0;

     }
    public function services()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>2]);
        }
        else
        {
            Controller::create(['section'=>2]);
        }
        session()->flash('section','2');
        $this->button = 0;
        
    }

    public function portfolio()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>3]);
        }
        else
        {
            Controller::create(['section'=>3]);
        }
        session()->flash('section','3');
        $this->button = 0;
    }

    
    public function about()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>5]);
        }
        else
        {
            Controller::create(['section'=>5]);
        }
        session()->flash('section','5');
        $this->button = 0;
    }

        
    public function skills()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>9]);
        }
        else
        {
            Controller::create(['section'=>9]);
        }
        session()->flash('section','5');
        $this->button = 0;
    }

    
    public function education()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>6]);
        }
        else
        {
            Controller::create(['section'=>6]);
        }
        session()->flash('section','6');
        $this->button = 0;
    }

    
    public function experience()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>7]);
        }
        else
        {
            Controller::create(['section'=>7]);
        }
        session()->flash('section','7');
        $this->button = 0;
    }

    
    public function social()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>8]);
        }
        else
        {
            Controller::create(['section'=>8]);
        }
        session()->flash('section','8');
        $this->button = 0;
    }

    public function settings()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>4]);
        }
        else
        {
            Controller::create(['section'=>4]);
        }
        session()->flash('section','4');
        $this->button = 0;
    }

    public function add_button()
    {
        $this->button = 1;
    }

    public function update_button($id)
    {
        if($this->current ==2)
        {
            // for services
            $category = service::where(['id'=>$id])->first();
            $this->title = $category->title;
            $this->description = $category->description;
            $this->icon = $category->icon;
        }

        if($this->current ==3)
        {
            // for portfolio
            $works = Work::where(['id'=>$id])->first();
            $this->service_id = $works->service_id;
            $this->description = $works->description;
            $this->client = $works->client;
            $this->url = $works->url;
        }

        if($this->current == 5)
        {
            $about = About::where(['id'=>$id])->first();
            $trim_string=  str_replace(['["','"]','"','"'],"",$about->phone);
            $this->phone = $trim_string;
            $this->city = $about->city;
            $this->address = $about->address;
            $this->title = $about->title;
             
        }

        if($this->current == 6)
        {
            $education = Educations::where(['id'=>$id])->first();
            $this->title = $education->title;
            $this->institution = $education->institution;
            $this->degree = $education->degree;
            $this->description = $education->description;
            $this->started = $education->started;
            $this->graduated = $education->graduated;
             
        }

        if($this->current == 7)
        {
            $experience = Experience::where(['id'=>$id])->first();
            $trim_string=  str_replace(['["','"]','"','"'],"",$experience->description);
            $this->service_id = $experience->service_id;
            $this->title = $experience->title;
            $this->organization = $experience->organization;
            $this->city = $experience->city;
            $this->description = $trim_string;
            $this->location = $experience->location;
            $this->start_year = $experience->start_year;
            $this->end_year = $experience->end_year;
        }

        
        if($this->current == 8)
        {
            $social = Social::where(['id'=>$id])->first();
            $this->title = $social->title;
            $this->url = $social->url;
            $this->icon = $social->icon;
         }
         
        $this->update_id = $id;
        $this->button = 2;
    }

    public function remove_button()
    {
        $this->button = 0;
        $this->reset();
    }

    // services query starts

    public function add_service()
    { 
        
        $validation = $this->validate(['title'=>'required',
                                       'description'=>'required',
                                       'icon'=>'required'
                                      ]);

        Service::create(['title'=>$this->title,
                         'description'=>$this->description,
                         'icon'=>$this->icon
                        ]);

        session()->flash('message','added successfully!');
        $this->button = 0;
        $this->reset();
    }

    
    public function update_services($id)
    {
        $validation = $this->validate(['title'=>'required',
                                        'description'=>'required',
                                        'icon'=>'required'
                                    ]);

        Service::where(['id'=>$id])->update(['title'=>$this->title,
                                            'description'=>$this->description,
                                            'icon'=>$this->icon
                                           ]);
       session()->flash('message','Updated successfully!');
       $this->button = 0;
    
    }

    public function delete_services($id)
    {
        Service::where(['id'=>$id])->delete();
        session()->flash('message','Deleted successfully!');
        $this->emit('alert_remove');
    }
    // services query ends

    //   work query starts
    public function add_portfolio()
    {
       
        $validation = $this->validate(['url'=>'required',
                                        'client'=>'required',
                                        'description'=>'required',
                                        'photos.*'=>'required',
                                        'service_id'=>'required'
                                      ]);
                                     
            $photo_array=[];
            foreach ($this->photos as $photo) 
            {
              $portfolio_photo = $photo->storeAs('portfolios', substr(rand(0,time()),0,5).'.png');
              $photo_array[]= 'storage/app/'.$portfolio_photo;
            }
            

         Work::create([
                       'url'=>'https://'.$this->url,
                       'photo'=>json_encode($photo_array),
                       'description'=>$this->description,
                       'client'=>$this->client,
                       'service_id'=>$this->service_id,
                      ]);

        session()->flash('message','Added successfully!');
        $this->button = 0;

    }

    public function update_portifolio($id)
    {

        $validation = $this->validate(['url'=>'required',
                                        'client'=>'required',
                                        'description'=>'required',
                                        'service_id'=>'required'
                                      ]);

        if(empty($this->photos))
        {
            // dd('yes');
            Work::where(['id'=>$id])->update([ 'url'=>$this->title,
                                           'description'=>$this->description,
                                           'client'=>$this->client,
                                           ]);

            session()->flash('message','Updated successfully!');
            $this->button = 0;
          
        }
        else
        {

            // dd('no');
            $photo_array=[];
            foreach ($this->photos as $photo) 
            {

              $portfolio_photo = $photo->storeAs('portfolios', substr(rand(0,time()),0,5).'.png');
              $photo_array[]= 'storage/app/'.$portfolio_photo;
              session()->flash('message','Updated successfully!');
              $this->button = 0;

            }
    
            Work::where(['id'=>$id])->update([ 'url'=>$this->title,
                                               'description'=>$this->description,
                                               'client'=>$this->client,
                                                'photo'=>$photo_array
                                               ]);

            session()->flash('message','Updated successfully!');
            $this->button = 0;
        }

       
    }

    public function delete_portfolio($id)
    {
        Work::where('id',$id)->delete(); 
        session()->flash('message','Deleted successfully!');
    }

    //   work query end


    // about starts

    public function add_about()
    {
        $validation = $this->validate(['phone'=>'required',
                                       'city'=>'required',
                                       'address'=>'required',
                                       'title'=>'required'
                                     ]);

           $phone_array = explode(',',$this->phone);
           
            About::create(['city'=>$this->city,
                            'address'=>$this->address,
                            'title'=>$this->title,
                            'phone'=>json_encode($phone_array)
                         ]);

            session()->flash('message','added successfully!');
            $this->button = 0;
            $this->reset();
    }

    public function update_about($id)
    {

        $validation = $this->validate(['phone'=>'required',
                                       'city'=>'required',
                                       'address'=>'required',
                                       'title'=>'required'
                                     ]);

        $phone_array = explode(',',$this->phone);

        About::where(['id'=>$id])->update(['city'=>$this->city,
                                            'address'=>$this->address,
                                            'title'=>$this->title,
                                            'phone'=>json_encode($phone_array)
                                         ]);

        session()->flash('message','added successfully!');
        $this->button = 0;
         
    }

    public function delete_about($id)
    {
        About::where(['id'=>$id])->delete();
        session()->flash('message','Deleted successfully!');
        $this->emit('alert_remove');
    }

    // about ends



        // education starts

        public function add_education()
        {
            $validation = $this->validate(['title'=>'required',
                                           'institution'=>'required',
                                           'description'=>'required',
                                           'degree'=>'required',
                                           'started'=>'required',
                                           'graduated'=>'required'
                                         ]);
    
               Educations::create(['title'=>$this->title,
                                'institution'=>$this->institution,
                                'description'=>$this->description,
                                'degree'=>$this->degree,
                                'started'=>$this->started,
                                'graduated'=>$this->graduated
                             ]);
    
                session()->flash('message','added successfully!');
                $this->button = 0;
                $this->reset();
        }
    
        public function update_education($id)
        {
                $validation = $this->validate(['title'=>'required',
                                                'institution'=>'required',
                                                'description'=>'required',
                                                'degree'=>'required',
                                                'started'=>'required',
                                                'graduated'=>'required'
                                            ]);

            Educations::where(['id'=>$id])->update(['title'=>$this->title,
                                                    'institution'=>$this->institution,
                                                    'description'=>$this->description,
                                                    'degree'=>$this->degree,
                                                    'started'=>$this->started,
                                                    'graduated'=>$this->graduated
                                                ]);
    
            session()->flash('message','Updated successfully!');
            $this->button = 0;
             
        }
    
        public function delete_education($id)
        {
            Educations::where(['id'=>$id])->delete();
            session()->flash('message','Deleted successfully!');
            $this->emit('alert_remove');
        }
    
        // education ends


        // experience starts

        public function add_experience()
        {
            $validation = $this->validate(['title'=>'required',
                                           'organization'=>'required',
                                           'description'=>'required',
                                           'location'=>'required',
                                           'city'=>'required',
                                           'start_year'=>'required',
                                           'end_year'=>'required',
                                           'service_id'=>'required'
                                         ]);
             $description_array = explode('.',$this->description);

             Experience::create(['title'=>$this->title,
                                 'organization'=>$this->organization,
                                 'description'=>json_encode($description_array),
                                 'location'=>$this->location,
                                 'city'=>$this->city,
                                 'start_year'=>$this->start_year,
                                 'end_year'=>$this->end_year,
                                 'service_id'=>$this->service_id
                                ]);
    
                session()->flash('message','added successfully!');
                $this->button = 0;
                $this->reset();
        }
    
        public function update_experience($id)
        {
              
            $validation = $this->validate(['title'=>'required',
                                            'organization'=>'required',
                                            'description'=>'required',
                                            'location'=>'required',
                                            'city'=>'required',
                                            'start_year'=>'required',
                                            'end_year'=>'required',
                                            'service_id'=>'required'
                                            ]);

            $description_array = explode('.',$this->description);
            // dd(json_encode($description_array));

            Experience::where(['id'=>$id])->update(['title'=>$this->title,
                                                    'organization'=>$this->organization,
                                                    'description'=>json_encode($description_array),
                                                    'location'=>$this->location,
                                                    'city'=>$this->city,
                                                    'start_year'=>$this->start_year,
                                                    'end_year'=>$this->end_year,
                                                    'service_id'=>$this->service_id
                                                ]);
    
            session()->flash('message','Updated successfully!');
            $this->button = 0;
                
        }
    
        public function delete_experience($id)
        {
            Experience::where(['id'=>$id])->delete();
            session()->flash('message','Deleted successfully!');
            $this->emit('alert_remove');
        }
    
        // experience ends


        // social starts

        public function add_social()
        {
            $validation = $this->validate(['url'=>'required',
                                            'icon'=>'required',
                                            'title'=>'required'
                                          ]);
    
                Social::create(['url'=>$this->url,
                                'icon'=>$this->icon,
                                'title'=>$this->title
                               ]);
    
                session()->flash('message','added successfully!');
                $this->button = 0;
                $this->reset();
        }
    
        public function update_social($id)
        {

            $validation = $this->validate(['url'=>'required',
                                           'icon'=>'required',
                                           'title'=>'required'
                                          ]);
    
            Social::where(['id'=>$id])->update(['url'=>$this->url,
                                                     'icon'=>$this->icon,
                                                     'title'=>$this->title
                                                   ]);
    
            session()->flash('message','Updated successfully!');
            $this->button = 0;
                
        }
    
        public function delete_social($id)
        {
            Social::where(['id'=>$id])->delete();
            session()->flash('message','Deleted successfully!');
            $this->emit('alert_remove');
        }
    
    // social ends

    // profile

    public function personal_info()
    {
        $this->validate(['name'=>'required',
                        'email'=>'required',
                       ]);

        $id = session()->get('id');
        User::where(['id'=>$id])->update(['name'=>$this->name,
                                           'email'=>$this->email
                                         ]);

        session()->flash('message','Updated successfully!');
    }
    public function password()
    {
        $this->validate(['old_pass'=>'required',
                        'new_pass'=>'required',
                        'confirm_pass'=>'required|same:new_pass'
                        ]);
         $id = session()->get('id');
        $user = User::where(['id'=>$id])->first();
        if(\Hash::check($this->old_pass,$user->password))
        {
            User::where(['id'=>$id])->update(['password'=>$this->confirm]);
            session()->flash('message','Updated successfully!');
        }
        else
        {
            $this->reset('old_pass');
            $this->reset('new_pass');
            $this->reset('confirm_pass');
            session()->flash('error','Old password mismatch try again!');
        }

    }
    
   // profile ends


}
