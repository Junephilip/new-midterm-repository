<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\HealthTracker;

class HealthPostController extends Controller
{
    public $successStatus = 200;

    public function getAllPosts(Request $request)
    {
        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();

        // $inventory = DB::table('inventory')
        // ->leftJoin('users','inventory.id', '=','users.id')
        // ->select('covid_api.id','covid_api.country','covid_api.code','covid_api.confirm','covid_api.recovered','covid_api.critical','covid_api.death','covid_api.latitude','covid_api.longitude','users.name','covid_api.created_at','covid_api.updated_at')
        // ->get();
        // return response()->json($covidPost,$this->successStatus);


        if($user != null){
            // $covidPost = CovidAPI::all();
            $healths = DB::table('health_tracker')
                        ->leftJoin('users','health_tracker.id', '=','users.id')
                        ->select('health_tracker.id','health_tracker.name','health_tracker.weight','health_tracker.blood_pressure','health_tracker.diagnosis','users.name','health_tracker.created_at','health_tracker.updated_at')
                        ->get();

            return response()->json($healths,$this->successStatus);
        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }





    public function getPost(Request $request)
    {

        $id = $request['pid']; //old post id

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $healthTracker = HealthTracker::where('id',$id)->first();
            if($user != null){
                return response()->json($healthTracker,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }


    // this method searches the country
    public function searchPost(Request $request)
    {

        $params = $request['p']; //p = params

        $token = $request['t']; //t = token
        $userid = $request['u'];// u-userid

        $user = User::where('id',$userid)->where('remember_token',$token)->first();


        if($user != null){

            $healthTracker = HealthTracker::where('name','LIKE','%' .$params . '%')->GET();
            if($user != null){
                return response()->json($healthTracker,$this->successStatus);
            }else{
                return response()->json(['response'=>'Posts not found'],404);
            }

        }else{
            return response()->json(['response'=>'Bad call'],501);
        }
    }
}
