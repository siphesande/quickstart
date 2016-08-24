<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Task;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;
    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
     public function index(Request $request)
 {
     $tasks = $request->user()->tasks()->get();

     Session::flash('message', 'Welcome');
     return view('tasks.index', [
         'tasks' => $tasks,
     ]);
 }
     public function tasksmail(Request $request)
     {
        $tasks = $request->user()->tasks()->get();
       Mail::send('emails.tasksmail', ['tasks' => $tasks], function($message)
         {

          $message->to('sphe.malgas@gmail.com', 'Sphe Malgas')->subject("List of Tasks");
          });
          Session::flash('message', 'Successfully Tasks to Email address!');
          return redirect('/tasks');
     }
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        Session::flash('message', 'Successfully Added a Task!');
        return redirect('/tasks');
    }
    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
 //     public function destroy(Request $request, Task $task)
 // {
 //     $this->authorize('destroy', $task);
 //
 //     $task->delete();
 //     Session::flash('message', 'Successfully created nerd!');
 //     return redirect('/tasks');
 // }
     public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();
        Session::flash('message', 'Successfully Deleted a Task!');
        return redirect('/tasks');
    }

    public function edit(Task $task)
     {
      return view('edit', compact('task'));
    }
    public function update(Request $request, Task $task)
     {
      $task->update($request->all());
      Session::flash('message', 'Successfully Updated a Task!');
      return redirect('/tasks');
}
}
