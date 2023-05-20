<?php

namespace App\Repositories\Admin;


use App\Models\Font;
use App\Repositories\Interfaces\Admin\FontInterface;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FontRepository implements FontInterface {


    use ImageTrait;

    public function paginate()
    {
        return Font::first();
    }

    public function get($id)
    {
        return Font::find($id);
    }

    public function store($request)
    {
            $font                  = new  Font();
            $font->title = $request->title;
            $font->local = $request->local;
            if($request->regular_ttf_file){
                $result = $this->saveFont($request->regular_ttf_file);
                $font->regular = $result['file'];
            }if($request->medium_ttf_file){
                $result = $this->saveFont($request->medium_ttf_file);
                $font->medium = $result['file'];
            }if($request->bold_ttf_file){
                $result = $this->saveFont($request->bold_ttf_file);
                $font->bold = $result['file'];
            }
            $font->save();
            return true;
    }

    public function update($request)
    {
            $font                  = Font::where('id',$request->id)->first();
            if($font){
                $font->title = $request->title;
                $font->local = $request->local;
                if($request->regular_ttf_file){
                    $this->deleteFile($font->regular);
                    $result = $this->saveFont($request->regular_ttf_file);
                    $font->regular = $result['file'];
                }if($request->medium_ttf_file){
                    $this->deleteFile($font->medium);
                    $result = $this->saveFont($request->medium_ttf_file);
                    $font->medium = $result['file'];
                }if($request->bold_ttf_file){
                    $this->deleteFile($font->bold);
                    $result = $this->saveFont($request->bold_ttf_file);
                    $font->bold = $result['file'];
                }
                $font->save();
            }else{
                $this->store($request);
            }
            return true;
    }
    public function statusChange($request)
    {
            $active_font = Font::where('status',1)->first();
            if($active_font){
                $active_font->status = 0;
                $active_font->save();
            }
            $font            = $this->get($request['id']);
            $font->status    = $request['status'];
            $font->save();

            DB::commit();
            return true;
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {

            $font = Font::where('lang_id',$id)->first();
            if($font){
                $font            = $this->get($font->id);
                if($font->regular){
                    $this->deleteFile($font->regular);
                }
                if($font->medium){
                    $this->deleteFile($font->medium);
                }
                if($font->bold){
                    $this->deleteFile($font->bold);
                }
                $font->delete();
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function deleteFile($file, $storage = 'local')
    {
        try {
            if ($storage == 'aws_s3'):
                Storage::disk('s3')->delete($file);
            elseif ($storage == 'wasabi'):
                Storage::disk('wasabi')->delete($file);
            else:
                File::delete('resources/fonts/'.$file);
            endif;

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function checkEmptyCredentials($status)
    {
        if($status == 1){
            $data = Font::where('status',0)->first();
            if($data == null){
                return false;
            }
            return true;
        }
    }
}
