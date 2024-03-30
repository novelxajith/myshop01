<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Main_category;
use App\Models\Sub_category;
use App\Models\Product;

use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    

    public function store (Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
      
        $Product_id="PRO".mt_rand(0000,9999);
        $data = new User();
    
        // Assign values to the model attributes
        $data->random_id = $Product_id;
        $data->name = $request->input('name');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->type = "Dd";
        
    
        // Save the model to the database
        $data->save();
    
    
        return redirect()->route('doctor_login')->with('success', 'Doctor registration successful.');
    }

    public function main_category_post(Request $request)
    {
        try {

            Log::info('main_category_post function is being executed.');
            Log::info('Form data:', ['data' => $request->all()]);
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            
            $imageName = mt_rand(0000,9999).time().'.'.$request->image->extension();  
             
            $request->image->move(public_path('administrator/category_image/'), $imageName);

            
            $user =  new Main_category();

            $user->name = $request->input('name');
            $user->image = $imageName;

            $user->save();

            return response()->json(['message' => 'Main Category Added successful.'], 200);
        } catch (\Exception $e) {
            // Log the detailed error message
            Log::error('Error saving doctor registration: ' . $e->getMessage());

            // Return an error response with the detailed error message
            return response()->json(['error' => 'Internal Server Error', 'details' => $e->getMessage()], 500);
        }
    }

    public function sub_category_post(Request $request)
    {
        try {
           
            Log::info('sub_category_post function is being executed.');
            Log::info('Form data:', ['data' => $request->all()]);

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                
             ]);

            
            $imageName = mt_rand(0000,9999).time().'.'.$request->image->extension();  
             
            $request->image->move(public_path('administrator/category_image/'), $imageName);
            //$request->file('image2')->move(public_path('administrator/category_image/'), $imageName);
            
            $user =  new Sub_category();

            $user->name = $request->input('name2');
            $user->main_category = $request->input('main_category');
            $user->image = $imageName;

            $user->save();

            return response()->json(['message' => 'Sub Category Added successful.'], 200);
        } catch (\Exception $e) {
            // Log the detailed error message
            Log::error('Error saving doctor registration: ' . $e->getMessage());

            // Return an error response with the detailed error message
            return response()->json(['error' => 'Internal Server Error', 'details' => $e->getMessage()], 500);
        }
    }

    public function create_product_post(Request $request)
    {
        try {
           
            Log::info('create_product_post function is being executed.');
            Log::info('Form data:', ['data' => $request->all()]);

            $request->validate([
                'content' => 'required',
                'name' =>'required',
                'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);

            
            $imageName = mt_rand(0000,9999).time().'.'.$request->main_image->extension();  
            $request->main_image->move(public_path('administrator/product_image/'), $imageName);
             //$request->file('main_image')->move(public_path('administrator/product_image/'), $imageName);
            if($request->file('gallery_images')){
                    $uploaded=array();
                    foreach ($request->file('gallery_images') as $image) {
                        $imageName2 = mt_rand(0000,9999).time().'.'.$image->extension();  
                        $image->move(public_path('administrator/product_image/'), $imageName2);
                        $uploaded[]=$imageName2;
                    }
                    $string = implode(', ', $uploaded);
                }else{
                    $string="";
                }
            
            $user =  new Product();

            $user->content = $request->input('content');
            $user->name = $request->input('name');
            $user->main_image = $imageName;
            $user->gallery = $string;

            $user->save();

            return response()->json(['message' => 'Product Added successful.'], 200);
        } catch (\Exception $e) {
            // Log the detailed error message
            Log::error('Error saving Product: ' . $e->getMessage());

            // Return an error response with the detailed error message
            return response()->json(['error' => 'Internal Server Error', 'details' => $e->getMessage()], 500);
        }
    }

    public function gallery_upload_post(Request $request)
    {
        Log::info('gallery_upload_post function is being executed.');
        Log::info('Form data:', ['data' => $request->all()]);
        $file = $request->file('file');
    
        // Validate the uploaded file
        $validatedData = $request->validate([
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);
    
        $imageName = $file->getClientOriginalName();
        $destinationPath = public_path('administrator/product_image/');
    
        // Create the directory if it doesn't exist
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
    
        $file->move($destinationPath, $imageName);
    
        return response()->json(['message' => 'File uploaded successfully','images' => $imageName]);
    }
    

}
