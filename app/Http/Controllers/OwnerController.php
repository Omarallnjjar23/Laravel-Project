<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\System;
use App\Models\Request as RequestModel;

class OwnerController extends Controller
{

    public function index()
    {
        $loggedInUserId = auth()->user()->user_id;

        $owner = Owner::where('id', $loggedInUserId)->first();

        $systems = System::where('owner_id', $loggedInUserId)->get();

        return view('owner.index',compact('systems','owner'));
    }


    public function showProfile()
    {
        $user = auth()->user();
        $role = 'Owner';
        return view('auth.profile',compact('user','role'));
    }


    public function systemDetails($id)
    {
        $loggedInUserId = auth()->user()->user_id;
        $system = System::where('id', $id)->where('owner_id', $loggedInUserId)->first(); 

        if (!$system)
            abort(404); 

        return view('owner.system-details',compact('system'));
    }

    public function showRequests()
    {
        $loggedInUserId = auth()->user()->user_id;

        $requests = RequestModel::where('owner_id', $loggedInUserId)->get();

        return view('owner.show-requests',compact('requests'));
    }


    public function createRequest()
    {
        return view('owner.create-request');
    }


    public function storeRequest(Request $request)
    {
        $loggedInUserId = auth()->user()->user_id;

        $newRequest = RequestModel::create([
            'system_name' => $request->system_name,
            'description' => $request->system_description,
            'development_methodology' => $request->development_methodology,
            'system_platform' => $request->system_platform,
            'deployment_type' => $request->deployment_type,
            'type' => 'new',
            'status' => 'pending',
            'owner_id' => $loggedInUserId,
        ]);

        return redirect('owner/show-requests');
    }

    public function enhanceRequest($id) 
    {
        $loggedInUserId = auth()->user()->user_id;
        $system = System::where('id', $id)->where('owner_id', $loggedInUserId)->first(); 
        
        if($system)
            return view('owner.enhance-request',compact('id', 'system'));
        else
            return redirect('owner');
    }

    public function storeEnhanceRequest(Request $request, $id)
    {
        $loggedInUserId = auth()->user()->user_id;

        $newRequest = RequestModel::create([
            'system_name' => $request->system_name,
            'description' => $request->system_description,
            'type' => 'enhancement',
            'status' => 'pending',
            'development_methodology' => $request->development_methodology,
            'system_platform' => $request->system_platform,
            'deployment_type' => $request->deployment_type,
            'system_id' => $id,
            'owner_id' => $loggedInUserId,
        ]);

        return redirect('owner/show-requests');
    }


    public function deleteRequest($id)
    {
        $loggedInUserId = auth()->user()->user_id;
        $request = RequestModel::where('id', $id)->where('owner_id', $loggedInUserId)->first();

        if($request->status == 'pending')
            $request->delete();
        
        return redirect('owner/show-requests');
    }

    public function searchSystems(Request $request)
    {
        $query = $request->query('query');
        $loggedInUserId = auth()->user()->user_id;

        $systems = System::where('system_name', 'like', "%$query%")->where('owner_id', $loggedInUserId)->get();

        return view('owner.index',compact('systems'));
    }

}
