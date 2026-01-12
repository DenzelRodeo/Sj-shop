<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\cloudFile;




class ArticleController extends Controller
{
    public function index(){
    
            $articles = Product::where('vendor_id',auth('vendor')->user()->id)->latest()
            ->with('image')->get();
           return view('dashboard.vendors.articles.index',compact('articles'));


    }

    public function create(){

        return view('dashboard.vendors.articles.create');

    }

    public function handleCreate(Request $request){

         $request->validate([

        'name'=>'required',
        'price'=>'required | integer',
        'description'=> 'required',
       
       ],[ 

        'name.required'=>'le nom du produit est requis',
        'price.required'=>'le prix du produit est requis',
        'description.required'=>'la description du produit est requis',
   

       ]);


        try {
        //code...
        DB::beginTransaction();
        $vendor_id = Auth::guard('vendor')->id();
         if ($vendor_id) {
             $productData = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'vendor_id'=> $vendor_id,
            ];
                 
        $product = Product::create($productData);

        $this->handleImageUpload($product,$request,'image','cloud_file_id','cloud_file_id');

        //gerer ici l'upload des images 
        

        DB::commit();

         return redirect()->route('articles.index')->with('success','produit enregistré');

            }else{
                return redirect()->route('vendors.login')->with('error','Veuillez vous connecter');
            }
    
       } catch (Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error',$e->getmessage());
       }
    }

    public function handleImageUpload($data, $request,$inputKey,$attributeName)
    {
      if($request->hasFile($inputKey)){
        
        // chmin vers le fichier
        $filePath = $request->file($inputKey)->store("cloud_files/articles", 'public');

        $cloudFile = cloudFile::create([
            'path' => $filePath,
        ]);

        $data->{$attributeName} = $cloudFile->id;

        $data->update();

      }
       
    }
    public function destroy($id){

        $articles = product::findOrFail($id);
        $articles->delete();

        return redirect()->back()->with('success','article supprimer avec success.');
    }

   

    
};
