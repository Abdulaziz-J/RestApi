<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Lesson;
use App\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lessonID)
    {
        $comments = Comment::where("lesson_id",$lessonID)->get();
        $trainees = \App\Trainee::all();

        return view('comments.index', ['trainees'=> $trainees, 'comments' => $comments, 'lesson' => \App\Lesson::findOrFail($lessonID)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CommentRequest $request, $lessonId)
    {
        //return view('comments.create');

        $lesson = \App\Lesson::findOrFail($lessonId);
        $user_id = auth()->user()->id;
        $content = request('content');

        $image_name = "";
        if(request('image')){
        $image_name = time() . '.'  .request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $image_name);

        }

        \App\Comment::create([
            'lesson_id' => $lessonId,
            'user_id' => $user_id,
            'content' => $content,
            'iamge_name' => $image_name
        ]);

       return ["data" => "Comment Added."];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$lessonID,$name=null,$description=null)
    {

        //if name and description are set through the route it means the call comes from the AJAX request otherwise it comes from the regular form
        if(!isset($name) && !isset($description)){
            $post = $request->all();
            $comment =new Comment();
            $comment->name = $post['name'];
            $comment->description = $post['description'];
            $comment->lesson_id = $lessonID;
            $comment->trainee_id = Auth::user()->user_type_id;
            $comment->save();

            //$path = $request->file('fileUploadElement')->store('lessons-'.$lessonID."/comments-".$comment->id);
            $file = request()->file('fileUploadElement');

            if(isset($file) && !empty($file)) {
                Storage::disk('public_uploads')->put('lessons-' . $lessonID . "/comments-" . $comment->id . "/", $file);
            }

            return redirect()->route('lessons.index')->with('message', 'Comments has created');
        }else{
            $comment =new Comment();
            $comment->name = $name;
            $comment->description = $description;
            $comment->lesson_id = $lessonID;
            $comment->trainee_id = Auth::user()->user_type_id;
            $comment->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::findOrFail($id);

        $files = null;

        //check if this comment has an image
        if(isset($comments) and !empty($comments)){
            $files = Storage::disk('public_uploads')->allFiles('lessons-'.$comments->lesson_id."/comments-".$comments->id."/");
        }

        return view('comments.show', ['comments' => $comments, 'files'=>$files]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = \App\Comment::findOrFail($id);

       // dd($comment);

        return view('comments.edit', ['comment' => $comment]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedDate = $request->validate([
         //   'image' => 'required|max:15',

            'content' => 'required|max:30'
        ]);

        $post = $request->all();


        $image_name = "";
        if(request('image')){


        $image_name = time() . '.'  .request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $image_name);

        }


        $comment = Comment::find($id); //it's the current comment
        $comment->content = $post['content'];
        $comment->iamge_name = $image_name;
     //   $comment->description = $post['description'];
        $comment->save();

       // $file = request()->file('fileUploadElement');
       // Storage::disk('public_uploads')->put('lessons-'.$comment->lesson_id."/comments-".$comment->id."/", $file);

       $lessonId = $comment->lesson_id;
       return redirect()->to("/lessons/$lessonId/comments");

//        return redirect()->route('lessons.index')->with('message', 'Comment has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $comments = Comment::findOrFail($id);

        if(  auth()->user()->type !=='trainer' &&  auth()->user()->id !== $comments->user_id ){
            return redirect()->to("/lessons/$comments->lesson_id/comments");
        }

        $comments->delete();

        return redirect()->to("/lessons/$comments->lesson_id/comments");
    }
}
