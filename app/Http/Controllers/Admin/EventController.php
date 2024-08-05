<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use DB;

class EventController extends Controller
{
   public function index(){
    abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            $events = Event::get();
    return view('admin.event.index', compact('events'));
   }
    public function create()
    {
        abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.event.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'event_title' => 'required',
            'hero_image' => 'required',
            'status' => 'required',
            'slug' => 'required',
            'event_description' => 'required',
        ]);
    
        $file = $request->file('hero_image');

        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $path = $destinationPath.'/'.$file->getClientOriginalName();

        $user = Event::create([
            'title' =>  $request->event_title,
            'image' => $path,
            'status' => $request->status,
            'slug' => $request->slug,
            'description' => $request->event_description,
        ]);
        return redirect::back()->with('message','Event Added Successful !');

    }
    public function show($id)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $events = Event::find($id);
        //dd($events);
        return view('admin.event.show', compact('events'));
    }
    public function edit($id)
    {
        abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $events = Event::find($id);
        return view('admin.event.edit', compact('events'));
    }
    public function update(Request $request, $id)
    {
        $updateEvent = Event::find($id);

        $file = $request->file('hero_image');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $path = $destinationPath.'/'.$file->getClientOriginalName();

        $updateEvent->title=$request->input('title');
        $updateEvent->image=$path;
        $updateEvent->status=$request->input('status');
        $updateEvent->slug=$request->input('slug');
        $updateEvent->description=$request->input('event_description');
        $updateEvent->save();
        return redirect::back()->with('message','Event Edit Successful !');
    }
    public function delete($id){
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $deleteEvent=Event::find($id);
         $deleteEvent->delete();

        return back();
    }

    public function view_frontend($slug){
        $event = Event::where('slug', $slug)->first();
        abort_if(!$event, Response::HTTP_NOT_FOUND, '404 Not Found');

        return view('registeruser', compact('event'));
    }
}
