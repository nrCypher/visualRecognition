<?php

namespace App\Http\Controllers;

use App\Sequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class SequenceController extends Controller
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

        $sequenceNumber = rand ( 1 , 4);

        $sequence = Sequence::where('sequence', $sequenceNumber)->where('step', 1)->first();
        $finalSequence = Sequence::where('sequence', $sequenceNumber)->where('step', 0)->first();

        $totalSteps = Sequence::where('sequence', $sequenceNumber)->where('step', '!=', 0)->count();

        DB::table('sequence_history')->truncate();

        DB::table('sequence_history')->insert(
            ['sequence' => $sequenceNumber, 'status' => 0]
        );

        return view('sequence.home', compact("sequence", "finalSequence", 'totalSteps'));
    }

    public function getSequence()
    {
        $sequence = DB::table('sequence_history')->select('*')->first();

        return $sequence->sequence;
    }


    public function handleSequenceValidation(Request $request)
    {
        $payload = $request->input('validation');

        DB::table('sequence_history')
            ->where('id', 1)
            ->update(['sequence' => $payload, 'status' => 1]);

        return 1;
    }

    public function checkSequence()
    {
        $error = 0;
        $step = 0;

        $sequence = $sequence = DB::table('sequence_history')->select('*')->first();

        $payload = explode ( ',', $sequence->sequence);

        if(sizeof($payload) > 1 && $sequence->status == 1)
        {
            $sequence = $payload[0]; // Indice 0 é sempre a sequencia: 3,1,1,1

            for($i = 1; $i < sizeof($payload); $i++)
            {
                if($payload[$i] == 0)
                    $error = 1;
                else
                    $step = $i + 1;
            }

            DB::table('sequence_history')
                ->where('id', 1)
                ->update(['status' => 0]);

            if($error)
            {
                return json_encode($error);
            }
            else
            {
                $data = 2;

                $sequence = Sequence::where('sequence', $sequence)->where('step', $step)->first();

                if($sequence)
                {
                    $data = new stdClass();
                    $data->img = $sequence->image;
                    $data->step = $step;
                }

                return json_encode($data);
            }
        }

        return 0;

    }


}
