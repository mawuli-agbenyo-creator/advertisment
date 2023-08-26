<?php

namespace App\Http\Controllers;

use DateTime;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\advertisments;

class advertisment extends Controller
{
    function Dashboard()
    {
        return view('user');
    }

    function DashboardData(Request $request)
    {
        $check = $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            'Projectname' => ['required', 'string', 'max:255'],
            'project_description' => ['required', 'string', 'max:255'],
            'project_type' => ['required', 'string', 'max:255'],
            'Ad_Company' => ['required', 'string', 'max:255'],
            'project_budget' => ['required', 'string', 'max:255'],
            'file' => ['optional', 'string', 'max:255'],
            'start' => ['required', 'Date', 'max:255'],
            'end' => ['required', 'Date', 'max:255'],


        ]);
        $uuid = Uuid::uuid4()->toString();

        // print_r($uuid);

        $ads = advertisments::create([
            'ad_name' => $request->Projectname,
            'user_id' => auth()->user()->id,
            'ad_uuid' => $uuid,
            'Description' => $request->project_description,
            'ad_type' => $request->project_type,
            'ad_company' => $request->Ad_Company,
            'Estimated_budget' => $request->project_budget,
            'File' => $request->file,
            'Project_Start' => $request->start,
            'Project_End' => $request->end,

            // 'roles' => '0',
        ]);

        if ($ads) {
            return redirect()->route('project');
        } else {
            return redirect()->route('dashboard');
        }
    }

    function project()
    {
        $ads = advertisments::all();
        return view('userproject', ['ads' => $ads]);
    }

    function view(string $id)
    {
        $ads = advertisments::where('ad_uuid', $id)->get(); // or first()
        // dd($ads);
        if (!empty( $ads[0])) {
            $startDate = new DateTime($ads[0]->Project_Start);
        $endDate = new DateTime($ads[0]->Project_End);

        $interval = $startDate->diff($endDate);

        $interval =  $interval->format('%R%a days'); // Output: Difference: +4 days
        return view('userview', ['info' => $ads[0], 'date' => $interval]);
        } else {
        
            return redirect()->route('project');
        }
        
        
    }

    function del(string $id)
    {
        $ads = advertisments::where('ad_uuid', $id)->delete();

        if ($ads) {
            return redirect()->back()->with(['success' => 'Successfully Deleted!']);
        } else {
            return redirect()->back()->with(['error' => 'Failed to Delete!']);
        }
        

    }
}
