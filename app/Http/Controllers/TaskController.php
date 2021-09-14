<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tag;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::orderBy('due_date')->get();
        return view('tasks.index', ['tasks' => $task]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                Rule::unique('Tasks')
            ]
        ])->validate();

        $task = new Task();
        $task->title = $request->input('title');
        $task->detail = $request->input('detail');
        $task->due_date = Carbon::create($request->input('due_date'));
        $task->save();
        $tags = trim($request->input('tags'));
        $this->updateTaskTag($task, $tags);
        return redirect()->route('tasks.index');
    }

    private function updateTaskTag($task, $tagsWithComma)
    {
        if ($tagsWithComma) {
            $tag_array = [];
            $tags = explode(",", $tagsWithComma);
            foreach ($tags as $tag_name) {
                $tag_name = trim($tag_name);
                if ($tag_name) {
                    $tag = Tag::firstOrCreate(['name' => $tag_name]);
                    array_push($tag_array, $tag->id);
                }
            }
            $task->tags()->sync($tag_array);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                Rule::unique('Tasks')->ignore($id)
            ]
        ])->validate();

        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->detail = $request->input('detail');
        $task->due_date = $request->input('due_date');
        $task->save();
        $tags = trim($request->input('tags'));
        $this->updateTaskTag($task, $tags);
        return redirect()->route('tasks.show', ['task' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
