<?php

namespace App\Helpers;

use Auth;
use App\Models\Asset;

class UploadHelper
{
    public function uploadPhoto($file, $type)
    {   
        \Log::info("uploadHelper");
        $validation = Validator::make($request->all(), [
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',    
            'status' => 'required',
            ]);
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {   
                \Log::info(1);
                // if($request->hasFile('file') && $request->file('file')->isValid()){
                //     $file = $request->file('file');
                //     $file_name = str_random(30) . '.' . $file->getClientOriginalExtension();
                //     $file->move(base_path() . '/assets/img', $file_name);
                // }
                // $asset = new Asset($request->input());
                // $asset->save();
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
}