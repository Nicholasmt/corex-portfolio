<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Controller;
use App\Models\Service;
use App\Models\Work;
use Livewire\WithFileUploads;

class Dashboard extends Component
{ 
    
    use WithFileUploads;
    
    public $current,$services,$portfolios,$counter;
    public $title,$description,$icon;
    public $url,$client,$photos=[],$service_id;
    public $button,$update_id;

    public function render()
    {
        $updated = Controller::where(['id'=>1])->first();
        $this->current = $updated->section;
        $this->counter = 1;
        $this->services = Service::all();
        $this->portfolios = Work::all();
        // $this->add_button;
        return view('livewire.dashboard');
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
            $this->photos[] = $works->photo;
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

    public function delete_services($id)
    {
        Service::where(['id'=>$id])->delete();
        session()->flash('message','Deleted successfully!');
        $this->emit('alert_remove');
    }

    public function update_services($id)
    {
        // dd($id);
         Service::where(['id'=>$id])->update(['title'=>$this->title,
                                              'description'=>$this->description,
                                              'icon'=>$this->icon
                                            ]);
        session()->flash('message','Updated successfully!');
        $this->button = 0;
        
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

    public function update_portifolio()
    {

    }

    public function delete_portfolio($id)
    {
        Work::where('id',$id)->delete(); 
        session()->flash('message','Deleted successfully!');
    }

    //   work query end


}
