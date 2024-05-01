<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Image;
use Session;
use File;
use App\UploadHandler;

class ImageController extends Controller
{
    
    public function upload()
    {
        $uploader = new UploadHandler();

        // Specify the list of valid extensions, ex. array("jpeg", "xml", "bmp")
        $uploader->allowedExtensions = array(); // all files types allowed by default

        // Specify max file size in bytes.
        $uploader->sizeLimit = null;

        // Specify the input name set in the javascript.
        $uploader->inputName = "qqfile"; // matches Fine Uploader's default inputName value by default

        // If you want to use the chunking/resume feature, specify the folder to temporarily save parts.
        $uploader->chunksFolder = "chunks";

        //$method = get_request_method();
        global $HTTP_RAW_POST_DATA;

        if(isset($HTTP_RAW_POST_DATA)) {
            parse_str($HTTP_RAW_POST_DATA, $_POST);
        }

        if (isset($_POST["_method"]) && $_POST["_method"] != null) {
            return $_POST["_method"];
        }

        $method =  $_SERVER["REQUEST_METHOD"];
        //$method = ismethod();

        // This will retrieve the "intended" request method.  Normally, this is the
        // actual method of the request.  Sometimes, though, the intended request method
        // must be hidden in the parameters of the request.  For example, when attempting to
        // delete a file using a POST request. In that case, "DELETE" will be sent along with
        // the request in a "_method" parameter.


        if ($method == "POST") {
            header("Content-Type: text/plain");

            // Assumes you have a chunking.success.endpoint set to point here with a query parameter of "done".
            // For example: /myserver/handlers/endpoint.php?done
            if (isset($_GET["done"])) {
                $result = $uploader->combineChunks("files");
            }
            // Handles upload requests
            else {
                // Call handleUpload() with the name of the folder, relative to PHP's getcwd()
                $result = $uploader->handleUpload("img/imagetmp/");
                // To return a name used for uploaded file you can use the following line.
                $result["uploadName"] = $uploader->getUploadName();
                $plCount = ($_REQUEST[ 'num' ])-1;
                $imageCount = $plCount+1;
    		    //Session::set('imageName'.($plCount+1),$fileName);
                $divId = ($_REQUEST[ 'divId' ])-1;
    		    $result["imageNo"] = $divId+1;

            }

            echo json_encode($result);
        }
        // for delete file requests
        else if ($method == "DELETE") {
            $result = $uploader->handleDelete("files");
            echo json_encode($result);
        }
        else {
            header("HTTP/1.0 405 Method Not Allowed");
        }
        //$imagePath=$result["uuid"];
        //$imageName=$result["uploadName"];
        ///$imageNo='0';
        //return view('images.upload',compact('imagePath','imageName','imageNo'));

        //return 1;
    }
    public function delete(Request $request)
    {
        if ($request->isMethod('post')){
            $id = $_POST['imageId'];
            $no = $_POST['imageNo'];
            $filename = $_POST['name'];
            $response = array ('status' => 'none');
            if($id == 0){
                $session_id = Session::getId();
                $dirPath = public_path().'/img/imagetmp/'.$session_id.'/';
                File::delete($dirPath.$filename);
                $response = array ('status' => 'success');
            }else{
                $response = array ('status' => 'error');
            }
            return response()->json($response);
        }

    }
    public function edit(Request $request)
    {
        if ($request->isMethod('post')){
            $imgPath = $_POST['imgPath'];
            $imgName = $_POST['imgName'];
            $response = array ('status' => 'none');

            return view('images.edit',compact('imgPath','imgName'));
        }
    }
    public function update_photo_crop(Request $request) {
        if ($request->isMethod('post')){
            $cropped_value = $_POST['cropped_value']; //// Width,height,x,y,rotate for cropping
            $cp_v = explode("," ,$cropped_value); /// Explode width,height,x etc
            $file_name =$_POST['imgName'];
            $dirPath = public_path().'/img/imagetmp/'.$_POST['imgPath'].'/';
            $dirPathNew = public_path().'/img/imagetmp/'.$_POST['imgPath'].'/big/';
            if(!file_exists($dirPathNew))
                File::makeDirectory($dirPathNew, 0777, true);
            $response = array ('status' => 'none');

            if (is_dir($dirPath)) {
                //$response = array ('status' => 'file exits');
                if (File::copy($dirPath.'/'.$file_name,$dirPathNew.'/'.$file_name)){
                    //$path = $file->storeAs("original/path/" , $file_name); // Original Image Path
                   $img = Image::make($dirPath.'/'.$file_name);
                   $path2 = $dirPathNew.'/'.$file_name; ///  Cropped Image Path

                   $img->rotate($cp_v[4] * -1);  /// Rotate Image
                   $img->crop($cp_v[0],$cp_v[1],$cp_v[2],$cp_v[3])->save($path2);// Crop and Save
                   $response = array ('status' => 'success');

                }
            }

            return response()->json($response);
        }
    }

    public function files_upload(Request $request)
    {
        //dd($request->all());
        $session_id = Session::getId();
        $filename = $_FILES['file']['tmp_name'];
        $orginalTarget = public_path().'/files/filetmp/'.$session_id.'/';
        if(!is_dir($orginalTarget)){
            File::makeDirectory($orginalTarget, 0777, true);
        }
        File::move($filename,$orginalTarget.$_FILES['file']['name']);
        $filename = $request->file->getClientOriginalName();
        //$request->file->storeAs('filetmp/'.$session_id, $filename,'file');
        return response()->json([$filename,$orginalTarget],200);
        
    }
    public function file_delete(Request $request)
    {
        $result = 'error';
        if (!empty($request->name)){
            $filename = $request->name;
            $session_id = Session::getId();
            $dirPath = public_path().'/file/filetmp/'.$session_id.'/'.$filename;
            if(File::exists($dirPath)){
                File::delete($dirPath);
            }
            $result = 'success';
        }
        return response()->json(['status'=>$result],200);
    }

}
