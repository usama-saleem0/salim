<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ugccampaign;
use App\Models\Objective;
use App\Models\Actiontype;
class UgcControllere extends Controller
{


    public function campaigns(Request $request){
        // dd($request->all());
       
       

            $object = new  Ugccampaign;
            $object->campaign = $request->campaign;
            $object->auth_id = auth()->user()->id;
            $object->save();
        

        return response()->json(['saved' => true ,'id' => $object->id]);
    }
    
    public function objective(Request $request){
        
        $exist = Ugccampaign::where('id' , $request->id)->first();
        if($exist){
            // dd($request->title);
            $obj = Objective::where('campaign_id' , $request->id)->delete();
            // $obj->delete();

                    foreach($request->title as $title){
                        $object = new Objective;
                        $object->objective_id = $title;
                        $object->campaign_id = $request->id;
                        $object->save();
                    }
            // $exist->marketing_objective = $request->title;
            // $exist->save();

        }
        else{

            $object = new  Ugccampaign;
            // $object->marketing_objective = $request->title;
            $object->auth_id = auth()->user()->id;
          
            $object->save();
            foreach($request->title as $title){
                $objects = new Objective;
                $objects->objective_id = $title;
                $objects->campaign_id = $object->id;
                $objects->save();
            }
            
        }

        return response()->json(['saved' => true , 'id' => $request->id]);
    }

    public function flages(Request $request){
        // dd($request->all());
        $exist = Ugccampaign::where('id' , $request->id)->first();
        if($exist){
            $exist->country = $request->country;
            $exist->min_age = $request->min_age;
            $exist->max_age = $request->max_age;
            $exist->campaign_type = $request->campaign_type;
            $exist->gender = $request->gender;




            $exist->save();

        }
        else{

            $object = new  Ugccampaign;
          
            $object->country = $request->country;
            $object->min_age = $request->min_age;
            $object->max_age = $request->max_age;
            $object->campaign_type = $request->campaign_type;
            $object->gender = $request->gender;
            $object->auth_id = auth()->user()->id;
            $object->save();
        }

        return response()->json(['saved' => true , 'id' =>$request->id]);
    }


    public function platefrom(Request $request){
        // dd($request->all());
        $exist = Ugccampaign::where('id' , $request->id)->first();
        if($exist){
            $exist->plateform = $request->plateform;
            $exist->plateform_type = $request->plateform_type;
          




            $exist->save();

        }
        else{

            $object = new  Ugccampaign;
          
            $object->plateform = $request->plateform;
            $object->plateform_type = $request->plateform_type;
           
            $object->auth_id = auth()->user()->id;
            $object->save();
        }

        return response()->json(['saved' => true , 'id'=>$request->id]);
    }


    public function action_type(Request $request){
        // dd($request->id);
        $exist = Ugccampaign::where('id' , $request->id)->first();
        if($exist){
            // $exist->action_type = $request->action_type;
            $exist->action_instruction = $request->instruction;
            $exist->action_avoid = $request->avoid;
            $exist->action_specific_caption = $request->specific_caption;

          




            $exist->save();
            foreach($request->action_type as $actions){

                $action = new Actiontype;
                $action->action_type_title = $actions;
                $action->campiagn_id = $request->id;
                $action->save();
            }
            

        }
        else{

            $object = new  Ugccampaign;
          
           

            // $object->action_type = $request->action_type;
            $object->action_instruction = $request->instruction;
            $object->action_avoid = $request->avoid;
            $object->action_specific_caption = $request->specific_caption;
           
            $object->auth_id = auth()->user()->id;
            $object->save();

            foreach($request->action_type as $actions){

                $action = new Actiontype;
                $action->action_type_title = $actions;
                $action->campiagn_id = $object->id;
                $action->save();
            }
        }

        return response()->json(['saved' => true , 'id' => $request->id]);
    }


    public function hire(Request $request){
        // dd($request->all());
        $exist = Ugccampaign::where('id' , $request->id)->first();
        if($exist){
            $exist->hire = $request->hire;
            $exist->hire_date = $request->hire_date;
            $exist->hire_offer = $request->hire_offer;
            $exist->followers = $request->followers;
            $exist->hire_budget = $request->hire_budget;


          




            $exist->save();

        }
        else{

            $object = new  Ugccampaign;
          
            $object->hire = $request->hire;
            $object->hire_date = $request->hire_date;
            $object->hire_offer = $request->hire_offer;
            $object->followers = $request->followers;
            $object->hire_budget = $request->hire_budget;

            
            $object->auth_id = auth()->user()->id;
            $object->save();
        }

        return response()->json(['saved' => true , 'id' => $request->id]);
    }



    public function getcampaign(){
        // dd(request('q'));
        $data = Ugccampaign::where('auth_id' , auth()->user()->id)
        ->when(request('q'), function($query) {
            $query->where('campaign', request('q'))
                ;
        })->get();

        return response()->json(['data' =>$data]);
    }


    public function post_influencer(Request $request){

        // dd($request->all());
        $data = $request->all();
        $influencer = $data[0];
        $id = $data[1];
        // dd($id);

        $influencerString = implode(',', $influencer);

        // dd($influencerString);

        $put = Ugccampaign::where('id', $id)->first();
        $put->suggest_influencer = $influencerString;
        $put->save();

        return response()->json(['saved' => true]);

    }
}
