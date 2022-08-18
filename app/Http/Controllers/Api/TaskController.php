<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //showing all values present in the database
        return Task::orderBy('created_at', 'asc')->get();
        // returns values in ascending order
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //not required in APIs
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //storing new values in the database
        $this->validate($request,[
        // inputs are not empty or null
            'title'=>'required',
            'description'=>'required',
        ]);
        $task=new Task;
        $task->title = $request->input('title');
        // retrieving user inputs
        $task->description = $request->input('description');
        // retrieving user inputs
        $task->save();
        // storing values as an object
        return $task; 
        // returns the tored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //viewing a particular task from a database
        return Task::findorFail($id);
        //searches for the object in the database using its id and returns it.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //editing data
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
        //updating data in the database
        $this->validate($request, [
        // the new values should not be null
            'title'=>'required',
            'description'=>'required',
        ]);
        $task = Task::findorFail($id);
        // uses the id to search values that need to be updated.
        $task->title = $request->input('description');
        // retrieves user input
        $task->description = $require->input('description');
        // retrieves user input
        $task->save();
        // saves the values in the database. The existing data is overwritten.
        return $task;
        // retrieves the updated object from the database
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    // receives an object's id
    {
        //deleting data
        $task=Task::findorFail($id);
        // searching for object in database using ID
        if($task->delete()){
            // deletes the object
            return 'deleted successfully';
            // shows a message when the delete operation was successful.
        }
    }
} 
