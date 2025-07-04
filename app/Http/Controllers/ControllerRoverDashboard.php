<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission as Mission;


class ControllerRoverDashboard extends Controller
{
    //

    public function createMission(Request $request)
    {
        $mission = new Mission();
        $mission->name = $request->mission_name;
        $mission->rover_coor_x = 0;
        $mission->rover_coor_y = 0;
        $mission->rover_z = 'N';
        $mission->save();
        return view('play', ['mission' => $mission]);
    }


    
    public function travel(Request $request)
    {   
        $commands = $request->input('commands');
        $mission = Mission::latest()->first();
        $commands = str_split($commands);
        $message = "";
        $out_of_bounds = false;

        foreach ($commands as $command) {
            if ($command == 'F') {
                
                switch ($mission->rover_z) {
                    case 'N':
                        $mission->rover_coor_y += 1;
                        break;
                    case 'S':
                        $mission->rover_coor_y -= 1;
                        break;
                    case 'E':
                        $mission->rover_coor_x += 1;
                        break;
                    case 'W':
                        $mission->rover_coor_x -= 1;
                        break;
                }
            } elseif ($command == 'L') {

                switch ($mission->rover_z) {
                    case 'N':
                        $mission->rover_z = 'W';
                        break;
                    case 'S':
                        $mission->rover_z = 'W';
                        break;
                    case 'E':
                        $mission->rover_z = 'N';
                        break;
                    case 'W':
                        $mission->rover_z = 'S';
                        break;
                }
            } elseif ($command == 'R') {

                switch ($mission->rover_z) {
                    case 'N':
                        $mission->rover_z = 'E';
                        break;
                    case 'S':
                        $mission->rover_z = 'W';
                        break;
                    case 'E':
                        $mission->rover_z = 'S';
                        break;
                    case 'W':
                        $mission->rover_z = 'N';
                        break;
                }
            }
            
        }

        $axis_out_of_bounds = "";

        if($mission->rover_coor_x < 0) {
            $out_of_bounds = true;
            $axis_out_of_bounds = "x";
            $mission->rover_coor_x = 0;
        }

        if($mission->rover_coor_x > 200) {
            $out_of_bounds = true;
            $axis_out_of_bounds = "x";
            $mission->rover_coor_x = 0;
        }

        if($mission->rover_coor_y < 0) {
            $out_of_bounds = true;
            $axis_out_of_bounds = "y";
            $mission->rover_coor_y = 0;
        }

        if($mission->rover_coor_y > 200) {
            $out_of_bounds = true;
            $axis_out_of_bounds = "y";
            $mission->rover_coor_y = 0;
        }

        if ($out_of_bounds) {
            $data = [
                'mission' => $mission,
                'message' => 'The rover cannot move outside the grid (200x200).',
                'axis_out_of_bounds' => $axis_out_of_bounds,
                'out_of_bounds' => $out_of_bounds
            ];
            return view('play', $data); 
        }
                
        $mission->save();
        return view('play', ['mission' => $mission, 'out_of_bounds' => $out_of_bounds, 'message' => '']);
        
    }
}
