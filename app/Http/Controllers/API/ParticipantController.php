<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Participant;
use Validator;
use App\Http\Resources\Participant as ParticipantResource;

class ParticipantController extends BaseController
{
	public function index()
    {
        $participants = Participant::all();
    
        return $this->sendResponse(ParticipantResource::collection($participants), 'Products retrieved successfully.');
    }
	
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
	
}