<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use File;
use Storage;
class TodoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
       
    public function index(Request $request)
    {
        if($request->keyword){
            $user = auth()->user();
            $todos = $user->todos()
                        ->where('title', 'LIKE', '%'.$request->keyword.'%')
                        ->paginate(3);
        }else{
        //query list of todos from db
            $user = auth()->user();
            $todos = $user->todos()->paginate(3);
        }

        

        //return to view resources/views/todos
        return view('todos.index',compact('todos'));
    } 

    public function create()
    {
        //show create form
        return view ('todos.create');
        
    }
    public function  store(Request $request)
    {
    //store todos table usiong model
    $todo = new todo();
    $todo->title = $request->title;
    $todo->description = $request->description;
    $todo->user_id = auth()->user()->id;
    $todo->save();

    //store todos table usiong model
    $todo->title = $request->title;
    $todo->description = $request->description;
    $todo->save();

    if($request->hasFile('attachment')){
        $filename = $todo->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();

        Storage::disk('public')->put($filename, File::get($request->attachment));

        $todo->attachment = $filename;
        $todo->save();
    }
    
    //return todos index
    return redirect()->to('/todos')->with([
     'type' =>'alert-primary',
     'message' => 'Succesfully store your tools',   
    ]);
    }
    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }
    public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }
    public function update(Todo $todo,Request $request)
    {
        
            
            
            //return todos index
            return redirect()->to('/todos');
            
    }
    public function delete(Todo $todo)
    {
        if($todo->attachment){
            Storage::disk('public')->delete($schedule->attachment);
        }
    
        //delete from table using model
        $todo->delete();

        //return to todos index
        return redirect()->to('/todos')->with([
            'type' => 'alert-danger',
            'mesage' => 'Successfully delete your todo!'
        ]);
    }
    
}