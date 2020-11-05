<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Participant;
use Validator;
use App\Http\Resources\Participant as ParticipantResource;

class ParticipantController extends BaseController
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function listParticipant(Request $request)
    {
		$par_page = $request->query('par_page');
		$page = $request->query('page');
		
        $participantList = Participant::paginate($par_page);
		$participants[] = $participantList;
        return $this->sendResponse(ParticipantResource::collection($participants), 'Participants retrieved successfully.');
    }
	 /**
     * addParticipant a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function addParticipant(Request $request)
	{
		$input = $request->all();
		 $validator = Validator::make($input, [
            'name' => 'required',
            'age' => 'required|numeric',
			'dob' => 'required|date|before:tomorrow',
			'profession' => 'required',
			'locality'=>'required',
			'number_of_guests' => 'required|numeric|min:0|max:2',
			'address' => 'required|max:50',
        ]);
		
		if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
		
		$participant = Participant::create($input);
		
		return $this->sendResponse(new ParticipantResource($participant), 'Participant created successfully.');
	}
	/**
     * updateParticipant the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function updateParticipant(Request $request,$id)
	{
		$input = $request->all();
		$validator = Validator::make($input, [
            'name' => 'required',
            'age' => 'required|numeric',
			'dob' => 'required|date|before:tomorrow',
			'profession' => 'required',
			'locality'=>'required',
			'number_of_guests' => 'required|numeric|min:0|max:2',
			'address' => 'required|max:50',
        ]);
		
		if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
		
		$participant = Participant::find($id);
		$participant->name = $input['name'];
        $participant->age = $input['age'];
		$participant->dob = $input['dob'];
		$participant->profession = $input['profession'];
		$participant->locality = $input['locality'];
		$participant->number_of_guests = $input['number_of_guests'];
		$participant->address = $input['address'];
        $participant->save();
   
        return $this->sendResponse(new ParticipantResource($participant), 'participant updated successfully.');
		
	}
	
}