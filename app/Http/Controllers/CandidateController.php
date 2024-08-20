<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class CandidateController extends Controller
{
    function account(){
        // $user = Auth::user();
        $user = 2;

        // $candidate = Candidate::where('user_id', $user->id)->first();
        $candidate = Candidate::where('user_id', $user)->first();
        return view('candidates.account', ['candidate' => $candidate]);
    }
    function downloadCV($id){
        $candidate = Candidate::findOrFail($id);
        $filePath = public_path('uploads/cvs') . '/' . $candidate->resume;

        if (file_exists($filePath)) {
            // Download the file
            return response()->download($filePath, $candidate->resume);
        } else {
            return "not";
        }
    }
    public function profile_edit($id){
        $candidate = Candidate::findOrFail($id);
        return view('candidates.profile_edit', compact('candidate'));
    }
    public function profile_update(Request $request){

        $obj = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();

        $request->validate([
            'name'=>'required',
            'username'=>["required",'alpha_dash'],
            'email'=>['required','email']
        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,gif,png',
            ]);

            if(Auth::guard('candidate')->user()->photo != "" || Auth::guard('candidate')->user()->photo != null ){
                unlink(public_path('uploads/'.$obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'candidate_photo_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->biography = $request->biography;
        $obj->address = $request->address;
        $obj->country = $request->country;
        $obj->state = $request->state;
        $obj->city = $request->city;
        $obj->zip_code = $request->zip_code;
        $obj->gender = $request->gender;
        $obj->marital_status = $request->marital_status;
        $obj->date_of_birth = $request->date_of_birth;
        $obj->website = $request->website;

        $obj->update();

        return redirect()->back()->with('success','profile updated successfully');
    }

}
