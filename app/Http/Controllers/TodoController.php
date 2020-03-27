<?php

namespace App\Http\Controllers;

use App\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::all();
        return view('todos\index')->with('todos',$todo);
    }

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDays()
    {
        $dates =Array('$');
         $todos = Todo::all();
        foreach ($todos as $key => $todo) {
            $array = explode(' ', (String)$todo->created_at);
            $status = (array_search($array[0],$dates));
                if($status>0){

                }else{
                    array_push($dates,$array[0]);
                }

        }

        unset($dates[0]);
        foreach ($dates as $key => $date) {
            $dt = Carbon::parse($dates[$key]);
            // echo ($dt->englishDayOfWeek).' ';
            // echo ($dt->englishMonth).' ';
            // echo ($dt->day).' ';
            // echo ($dt->year).' ';
            $dates[$key]=Array(
                'dayofweek'=>$dt->englishDayOfWeek,
                'month'=>$dt->englishMonth,
                'intmonth'=>$dt->month,
                'day'=>$dt->day,
                'year'=>$dt->year
            );

        }

        return view('todos\daysTodo')
        ->with('dates',$dates)
            ;
    }


    private function contains($needle, $haystack)
    {
        return strpos($haystack, $needle) !== false;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function day($date)
    {

         $dt = Carbon::parse($date);
         $dt->subday();
         $todo = Todo::Where('created_at','>',(string)$dt->addDay())
                    ->Where('created_at','<',(string)$dt->addDays(1))
                    ->get();
        return view('todos\day')->with('todos',$todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos\newTodo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=>'required|min:5|max:40',
            'description'=>'required|min:12|max:120',
            'created_at'=>'required'
        ]);

        $todo = Todo::create([
            'title' =>$request->title,
            'description'=>$request->description,
            'is_complete'=>0,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->created_at,
        ]);
        if($todo->title==$request->title){
            session()->flash('success','your todo was successfully created');
            return redirect('/');
        }else{
            session()->flash('danger','your todo does not created');
            return redirect('todo/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos\todo')->with('todo',$todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:15|max:130'
        ]);
        $todo = Todo::find($request->id);
            $todo->title = $request->title;
            $todo->description = $request->description;
            $todo->updated_at = now();
        $result =($todo->save());

        if($result){
            session()->flash('success','your todo was successfully edited');
            return redirect(route('day', explode(' ', (String)$todo->created_at)[0]));
        }else{
            session()->flash('danger','your todo does not edited');
            return redirect(route('day',explode(' ', (String)$todo->created_at)[0]));
        }

    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function complete(Todo $todo)
    {
        $todo->is_complete =1;
        $result =$todo->save();
        if($result){
            session()->flash('success','your todo was successfully completed');
            return redirect(route('day', explode(' ', (String)$todo->created_at)[0]));
        }else{
            session()->flash('danger','your todo does not completed');
            return redirect(route('day',explode(' ', (String)$todo->created_at)[0]));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function showEdit(Todo $todo)
    {
        return view('todos\edit')->with('todo',$todo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if($todo->delete()){
            session()->flash('success','your todo was successfully deleted');
            return redirect('/');
        }else{
            session()->flash('danger','your todo does not deleted');
            return redirect('todo-delete');
        }
    }
}
