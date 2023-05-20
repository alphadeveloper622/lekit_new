<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Admin\MediaInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use File;
use Sentinel;
use App\Models\Media;

class MediaController extends Controller
{
    protected $medias;

    public function __construct(MediaInterface $medias)
    {
        $this->medias       = $medias;
    }

    public function index(Request $request)
    {
        $medias     = $this->medias->paginate($request, get_pagination('media_paginate'));

        return view('admin.medias.index', compact('medias'));
    }

    public function getMedia(Request $request)
    {
        if ($request->get_data_for == 'all'):
            $medias         = $this->medias->getAll();
        else:
            $type = explode(',',$request->get_data_for);
            $medias         = $this->medias->getAll()->whereIn('type', $type);
        endif;
        if ($request->has('q')):
            $medias         = $medias->where('name', 'like', '%' . $request->q . '%');
        endif;
        $front_type=$request->front_type;
        $store_code= $request->store_code;
        //return response()->json($data);
        if ($front_type == 'gallery'):
            $medias         = Media::query()->where('front_type', '=', 'gallery')->where('store_code', '=',$store_code)->orderBy('order');
        else:
            $medias         = $this->medias->getAll();//bkh
        endif;

        $selection          = $request->selection;
        $data['total']      = $medias->count();
        $medias             = $medias->limit(18)->get();
        $store_code         =$request->store_code;

        $data['showing']    = $medias->count();
        if ($front_type == 'gallery'):
            $data['contents']   = view('admin.common.media-gallery-modal', compact('medias','selection','store_code'))->render();
        else:
            $data['contents']   = view('admin.common.media-modal', compact('medias','selection'))->render();
        endif;

        return response()->json($data);
    }

    public function getNewFiles(Request $request)
    {
        if ($request->get_data_for == 'all'):
            $medias         = $this->medias->getAll();
        else:
            $type = explode(',',$request->get_data_for);
            $medias         = $this->medias->getAll()->whereIn('type', $type);
        endif;

        $front_type=$request->front_type;
        $store_code= $request->front_store_code;
        if ($front_type == 'gallery'):
            $medias         = Media::query()->where('front_type', '=', 'gallery')->where('store_code', '=',$store_code)->orderBy('order');;
        else:
            $medias         = $this->medias->getAll();//bkh
        endif;

        //$medias         = $this->medias->getAll();
        $selection  = $request->selection;

        $data['total']      = $medias->count();
        $medias             = $medias->limit(18)->get();

        $data['showing']    = $medias->count();
        if ($front_type == 'gallery'):
        $data['contents']   = view('admin.common.new-gallery-medias', compact('medias','selection'))->render();
        else:    
        $data['contents']   = view('admin.common.new-medias', compact('medias','selection'))->render();
        endif;

        return response()->json($data);
    }

    public function getMoreMedia(Request $request)
    {
        //$medias     = $this->medias->getAll()->where('type', $request->get_data_for);
        $selection  = $request->selection;
        $showing    = $request->showing;

        $front_type=$request->front_type;
        $store_code= $request->front_store_code;
        if ($front_type == 'gallery'):
            $medias         = Media::query()->where('front_type', '=', 'gallery')->where('store_code', '=',$store_code)->orderBy('order');;
        else:
            $medias         = $this->medias->getAll();//bkh
        endif;

        $data['total']      = $medias->count();
        $medias             = $medias->skip($showing)->limit(18)->get();

        $data['showing']    = $showing + $medias->count();

        if ($front_type == 'gallery'):
        $data['contents']   = view('admin.common.new-gallery-medias', compact('medias','selection'))->render();
        else:
        $data['contents']   = view('admin.common.new-medias', compact('medias','selection'))->render();
        endif;

        return response()->json($data);
    }

    public function ordering(Request $request){
        $arr=$request->data;
        foreach($arr as $item){
            try{
                DB::beginTransaction();
                Media::where('id', $item['id'])->update(['order' => $item['idx']]);
                DB::commit();
            }catch (\Exception $e) {
                DB::rollBack();
                return response()->json(__($e->getMessage()),500);
            }
        }
        return true;
    }

    public function getSelectedMedia(Request $request)
    {
        $medias     = $request->selected_medias ? $this->medias->getAll()->whereIn('id', $request->selected_medias)->get() : [];
        $selection  = $request->selection;
        $type       = $request->data_for;
        return view('admin.common.selected-medias', compact('medias','selection','type'))->render();
    }
    public function deleteSelectedMedia(Request $request)
    {
        $medias     = $request->selected_medias ? $this->medias->getAll()->whereIn('id', $request->selected_medias)->get() : [];
        foreach($medias as $media){
            try {
                if (File::exists(public_path($media->storage.'/'.$media->name))) {
                    File::delete(public_path($media->storage.'/'.$media->name));
                }
                DB::beginTransaction();
                $this->medias->delete($media->id);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(__($e->getMessage()),500);
            }
        }
        return true;
    }

    public function create()
    {
        return view('admin.medias.create');
    }

    public function store(Request $request)
    {
        if (isDemoServer()):
            return response()->json(__('This function is disabled in demo server.'), 500);
        endif;
        $store_code='tmp';
        $front_type='';
        $type = get_yrsetting('supported_mimes');
        $front_type=$request->front_type;
        if($front_type=='gallery')
            $store_code=$request->front_store_code;
        
        if($request->hasFile('file')){
            $extension = strtolower($request->file('file')->getClientOriginalExtension());   // coming file's extension
            $name = strtolower($request->file('file')->getClientOriginalName());    
            $size=$request->file('file')->getSize();
                     // coming file's name 
            //bkh
            $destinationPath = 'uploads/images';                                      // leki/public/uploads/images image save
            if($front_type=='gallery')
            {
                $destinationPath = 'uploads/images/stores/'.$store_code.'/gallery';                                      // leki/public/uploads/images image save
            }
            //$path = $request->file('file')->move('public/'.$destinationPath,$name);
            
            Image::make($request->file('file'))->resize(1280, null,
            function ($constraint) {
                $constraint->aspectRatio();
                //$constraint->upsize();
            })->resize(null,720,
            function ($constraint) {
                $constraint->aspectRatio();
                //$constraint->upsize();
            })->save('public/'.$destinationPath.'/'.$name);

            if(isset($type[$extension])):
                //$response = $this->medias->store($request->file('file'), ($type[$extension]));
                
                if($front_type=='gallery'):
                    $rec=Media::query()->where('front_type', '=', 'gallery')->where('store_code', '=',$store_code)->orderBy('order','desc')->first();
                    $order = 0;
                    if(isset($rec))
                        $order=$rec->order+1;
                    $id = DB::table('media')->insertGetId(
                        ['name' => $name,'extension'=>$extension,'storage'=>$destinationPath,'front_type'=>'gallery','store_code'=>$store_code,'size'=>$size,'order'=>$order]
                        );  
                else:
                    $id = DB::table('media')->insertGetId(
                        ['name' => $name,'extension'=>$extension,'storage'=>$destinationPath]
                        );  
                endif;        
                
                
                if ($id>0):
                    $response=true;
                else:
                    $response=false;
                endif;
                if ($response === false):
                    return response()->json(__('Unable to upload'.' '.$name), 500);
                elseif($response === 's3_error'):
                    if (Sentinel::getUser()->user_type == 'seller'):
                        return response()->json(__('Unable to upload, please contact with system owner'), 500);
                    else:
                        return response()->json(__('Unable to upload to S3, check your configuration'), 500);
                    endif;
                endif;
                return true;
            endif;
            //bkh end
        }
    }

    public function delete($id)
    {
        if (isDemoServer()):
            $response['message']    = __('This function is disabled in demo server.');
            $response['title']      = __('Ops..!');
            $response['status']     = 'error';
            return response()->json($response);
        endif;
        if (blank($this->medias->get($id))):
            $success['message'] = __('Not Found');
            $success['status']  = 'error';
            $success['title']   = __('404');
            return response()->json($success);
        endif;
        DB::beginTransaction();
        try {
            $this->medias->delete($id);
            $success['message'] = __('Deleted Successfully!');
            $success['status']  = 'success';
            $success['title']   = __('Deleted');
            DB::commit();
            return response()->json($success);
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function details(Request $request)
    {
        $media = $this->medias->get($request->id);
        if (!blank($media)):
            $title = 'file_info';
            return view('admin.common.modal', compact('media','title'))->render();
        else:
             Toastr::error(__('Something went wrong, please try again'));
            return back();
        endif;
    }

    public function sellerBannerstore($file,$token_id)
    {
        if (isDemoServer()):
            return response()->json(__('This function is disabled in demo server.'), 500);
        endif;

        $type = get_yrsetting('supported_mimes');
        if($file){
            $extension = strtolower($file->getClientOriginalExtension());
            $name = strtolower($file->getClientOriginalName());

            if(isset($type[$extension])):
                $response = $this->medias->store($file, ($type[$extension]),$token_id);
                if ($response === false):
                    return response()->json(__('Unable to upload'.' '.$name), 500);
                elseif($response === 's3_error'):
                    if (Sentinel::getUser()->user_type == 'seller'):
                        return response()->json(__('Unable to upload, please contact with system owner'), 500);
                    else:
                        return response()->json(__('Unable to upload to S3, check your configuration'), 500);
                    endif;
                endif;
                return $response;
            endif;
        }
    }
}
