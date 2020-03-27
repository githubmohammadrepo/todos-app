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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Todo $todo)
    {
        //
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
        //
    }
}
