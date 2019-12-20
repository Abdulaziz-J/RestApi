<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use App\Util\Quote;

class LessonController extends Controller
{
    protected $quote;


    public function __construct(Quote $quote){
        $this->quote = $quote;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::with('user')->get();
        return view('lessons.index', ['lessons' => $lessons, 'quote'=> $this->quote->fetchQuote()]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'required|max:15',
            'description' => 'required|max:50',
            'day' => 'required',
            'date' => 'required'
        ]);
        
        $lesson = Lesson::create($request->all());
        $lesson->user_id = auth()->user()->id;
        $lesson->save();
        
        $image_name = "";
        if(request('image')){
            $image_name = time() . '.'  .request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $image_name);
            $lesson->image = $image_name;
            $lesson->save();
        }
        return redirect()->route('lessons.index')->with('message', 'Lesson has been created');
    }

    public function enroll($id){
        $lesson = Lesson::findOrFail($id);
        $trainee_id = auth()->user()->id;

        if(!$lesson->trainees->contains($trainee_id))
            $lesson->trainees()->attach($trainee_id);

        return redirect()->route('lessons.index');

    }

    public function unenroll($id){
        $lesson = Lesson::findOrFail($id);
        $trainee_id = auth()->user()->id;

        if($lesson->trainees->contains($trainee_id))
            $lesson->trainees()->detach($trainee_id);

        return redirect()->route('lessons.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lessons = Lesson::findOrFail($id);
        return view('lessons.show', ['lessons' => $lessons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'required|max:15',
            'description' => 'required|max:50',
            'day'=> 'required|max:19',
            'date'=> 'required',
        ]);

        $post = $request->all(); //new comment
        
        $lesson = Lesson::findOrFail($post['id']); //it's the current comment
        $lesson->name = $post['name'];
        $lesson->description = $post['description'];
        $lesson->day = $post['day'];
        $lesson->date = $post['date'];
        if (!$lesson->user_id) {
            $lesson->user_id = auth()->user()->id;
        }

        if(request('image')){
            $image_name = time() . '.'  .request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $image_name);
            $lesson->image = $image_name;
        }

        $lesson->save();

        return redirect()->to("/lessons");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lessos = Lesson::findOrFail($id);
        $lessos->delete();
        return redirect()->route('lessons.index')->with('message', 'Lesson has deleted');
    }

}
