<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Response;

class TaskController extends Controller
{

    public function index($id = null)
    {
        $task = null;
        $tasks = Task::all();
        // $tasks = Task::get();
        // $tasks = Task::where('photo', '!=', 'null')->get();
        // $tasks = Task::whereNotNull('photo')->get();
        // $tasks = Task::whereNull('photo')->get();
        // dd($tasks);

        if($id){
            $task = Task::find($id);
        }
        return view('hello' , compact('tasks', 'task'));
    }

    public function store(Request $request)
    {
        // dd($_GET);
        // dd($_POST);
        // dd($request->all()); //get the post and request fields from the form
        // dd($request->getMethod());
        // dd($request->content);

        $newContent = $request->content;

        $newTask = new Task;
        $newTask->content = $newContent;
        $newTask->save();

        return redirect('/');
    }

    public function update(Request $request)
    {
        $updated_content = $request->content;
        $selected_task = Task::find($request->id);
        $selected_task->content = $updated_content;

        
        $selected_task->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('/');
    }
}
