<?php

namespace App\Http\Controllers;

use App\Scenario;
use Illuminate\Http\Request;
use stdClass;

class ScenarioController extends Controller
{

    public function init(){
        return view('init');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color = $this->createScenario();

        $order = json_decode($color);

        $rgb = $order->order;

        return view('home', compact('rgb'));

        //return view('home', compact('rgb'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createScenario()
    {
        $orderArray = [];
        $scenario = Scenario::orderBy('created_at', 'DESC')->first();

        if(!empty($scenario) && !$scenario->is_valid)
        {
            $orderArray = explode ( ',', $scenario->order);

            $payload = new stdClass();
            $payload->id = $scenario->id;
            $payload->order = $orderArray;

            return json_encode($payload);
        }

        $value = rand ( 1 , 25 );

        if($value == 1)
            $orderArray = ['R','G','B','R'];

        if($value == 2)
            $orderArray = ['G','G','B','R'];

        if($value == 3)
            $orderArray = ['B','B','R','G'];

        if($value == 4)
            $orderArray = ['G','R','B','R'];

        if($value == 5)
            $orderArray = ['R','B','R','G'];

        if($value == 6)
            $orderArray = ['R','B','R','B'];

      if($value == 7)
          $orderArray = ['R','B','R','R'];

        if($value == 8)
            $orderArray = ['R','B','G','R'];

        if($value == 9)
            $orderArray = ['R','B','G','G'];

        if($value == 10)
            $orderArray = ['R','B','G','B'];

        if($value == 11)
            $orderArray = ['R','R','R','R'];





        if($value == 12)
            $orderArray = ['G','B','R','G'];

        if($value == 13)
            $orderArray = ['G','B','R','B'];

      if($value == 14)
          $orderArray = ['G','B','R','R'];

        if($value == 15)
            $orderArray = ['G','B','G','R'];

        if($value == 16)
            $orderArray = ['G','B','G','G'];

        if($value == 17)
            $orderArray = ['G','B','G','B'];

        if($value == 18)
            $orderArray = ['G','R','R','R'];


        if($value == 19)
            $orderArray = ['G','G','R','G'];

        if($value == 20)
            $orderArray = ['G','G','R','B'];

      if($value == 21)
          $orderArray = ['G','G','R','R'];

        if($value == 22)
            $orderArray = ['G','G','G','R'];

        if($value == 23)
            $orderArray = ['G','G','G','G'];

        if($value == 24)
            $orderArray = ['G','G','G','B'];

        if($value == 25)
            $orderArray = ['G','G','R','R'];




        $orderStr = implode (",", $orderArray);

        $scenario = new Scenario;
        $scenario->order = $orderStr;
        $scenario->save();

        $payload = new stdClass();
        $payload->id = $scenario->id;
        $payload->order = $orderArray;

        return json_encode($payload);
    }

    public function handleScenarioValidation(Request $request)
    {
        $payload = $request->input('validation');

        $payload = explode ( ',', $payload);

        $scenarioId = $payload[0];

        unset($payload[0]);
        $validation = implode (",", $payload);

        $scenario = Scenario::find($scenarioId);
        $scenario->validation = $validation;
        $scenario->save();

        return 1;
    }

    public function checkScenario()
    {
        $scenario = Scenario::orderBy('created_at', 'DESC')->first();

        if(($scenario->validation == NULL && $scenario->is_valid == null)
            || ($scenario->validation == "1,1,1,1" && $scenario->is_valid == 1))
            return 0;
        else
            return $scenario->validation;
    }

    public function setScenarioStatus(Request $request)
    {
        $status = $request->input('status');

        $scenario = Scenario::orderBy('created_at', 'DESC')->first();

        if($status == 0)
        {
            $scenario->validation = null;
        }

        $scenario->is_valid = $status;
        $scenario->save();

        return response()->json(1) ;
    }


}
