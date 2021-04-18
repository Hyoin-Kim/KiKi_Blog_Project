<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Str;
use App\Helpers\UploadHelper;
use App\Models\Asset;

use Illuminate\Http\Request;

class UploadController extends Controller
{
   public function uploadPhoto(Request $request)
   {    
   		\Log::info("Request".json_encode($request->input()));
        \Log::info("uploadController".($request->file("file")));
        \Log::info("uploadControlle2r".($request->get("type")));
        $type = $request->get("type");

        // $validation = Validator::make($request->all(), [
        //     'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',    
        //     'status' => 'required',
        //     ]);
        // if ($validation->fails())
        // {	
        // 	\Log::info("ifinner");
        //     foreach ($validation->messages()->getMessages() as $field_name => $messages)
        //     {
        //     }
        // }
        // else
        // {
            // if($request->get('button_action') == 'insert')
            // {   
                
            // }
            // \Log::info(1);
            if($request->hasFile('file') && $request->file('file')->isValid()){
                $file = $request->file('file');
                $tmp_file_name = Str::random(30);
                $tmp_file_extension = $file->getClientOriginalExtension();
                $file_name = $tmp_file_name . '.' . $tmp_file_extension;

                if($type == "album")
                {
                    $file->move(public_path() . '/assets/img/album', $file_name);
                }
                else if($type == "user")
                {
                    $file->move(public_path() . '/assets/img/profile', $file_name);   
                }else  if($type == "comment")
                {
                    $file->move(public_path() . '/assets/img/comment', $file_name); 
                }else if($type == "editphoto")
                {
                    $file->move(public_path() . '/assets/img/editphoto', $file_name);
                }
            }
            $asset = new Asset;
            $asset->type = $type;
            $asset->user_id = Auth::user()->id;
            $asset->file_name = $tmp_file_name;
            $asset->file_extension = $tmp_file_extension;
            $asset->save();

            \Log::info("Asset_id".$asset->id);

            return $asset->id;
        // }
        // UploadHelper::uploadPhoto($request->file("file"), $request->get("type"));
   }

   public function uploadProfile(Request $request)
   {
        \Log::info("Request".json_encode($request->input()));
        \Log::info("uploadController".($request->file("file")));
        \Log::info("uploadControlle2r".($request->get("type")));

            if($request->hasFile('file') && $request->file('file')->isValid()){
                $file = $request->file('file');
                $tmp_file_name = Str::random(30);
                $tmp_file_extension = $file->getClientOriginalExtension();
                $file_name = $tmp_file_name . '.' . $tmp_file_extension;
                $file->move(public_path() . '/assets/img/album', $file_name);
            }
            $asset = new Asset;
            $asset->user_id = Auth::user()->id;
            $asset->file_name = $tmp_file_name;
            $asset->file_extension = $tmp_file_extension;
            $asset->save();

            \Log::info("Asset_id".$asset->id);

            return $asset->id;
   }
}
