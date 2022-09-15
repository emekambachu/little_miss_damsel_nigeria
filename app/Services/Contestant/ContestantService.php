<?php

namespace App\Services\Contestant;

use App\Contestant;
use App\Vote;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Class ContestantService.
 */
class ContestantService
{
    public function contestant(): Contestant
    {
        return new Contestant();
    }

    public function vote(): Vote
    {
        return new Vote();
    }

    public function contestantWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->contestant()->with('votes', 'payments');
    }

    public function contestantById($id){
        return $this->contestantWithRelations()->findOrFail($id);
    }

    public function contestantBySlug($slug){
        return $this->contestantWithRelations()->where('slug', $slug)->first();
    }

    public function storeContestant($request){

        $input = $request->all();
        $input['slug'] = Str::slug($input['name']);
        $image = $this->uploadImage($request);
        if($image){
            $input['image'] = $image;
        }
        return $this->contestant()->create($input);
    }

    public function uploadImage($request){

        if($file = $request->file('image')){
            // path for converted image
            $path = 'photos';
            // Add current time in seconds to file name
            $name = time() . $file->getClientOriginalName();
            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(700, 905);
            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());
            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(700, 905, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($path.'/'.$name);
            //assign image name to $input array
            return $name;
        }
        return false;
    }

    public function searchContestant($request): array
    {
        $input = $request->all();
        $request->session()->forget(['search_inputs']);

        // Create empty array for search values session
        // Add all input to search inputs session, can be easily passed to export functionality
        $request->session()->put('search_inputs', $input);
        $searchValues = [];

        if(!empty($input['term'])) {
            $searchValues['term'] = $input['term'];
        }

        $contestants = $this->contestant()->where(function($query) use ($input){
                $query->when(!empty($input['term']), static function($q) use($input){
                    $q->where('name', 'like' , '%'. $input['term'] .'%');
                });
            })->paginate(15);

        // if result exists return results, else return empty array
        if($contestants->total() > 0){
            return [
                'contestants' => $contestants,
                'total' => $contestants->total(),
                'search_values' => $searchValues
            ];
        }

        return [
            'contestants' => [],
            'total' => 0,
            'search_values' => $searchValues
        ];
    }

    public function updateContestant($request, $id)
    {
        $contestant = $this->contestantById($id);
        $input = $request->all();

        Session::put('image', $contestant->image); // store image name in session

        $image = $this->uploadImage($request);
        if($image){
            $input['image'] = $contestant->image;
        }
        $contestant->update($input);

        // After update, check if temporary file is current file, else delete
        if(Session::get('image') !== $contestant->image && File::exists(public_path() . '/photos/' . Session::get('image'))) {
            FILE::delete(public_path() . '/photos/' . Session::get('image'));
            Session::forget('image');
        }

        return $contestant;
    }

    public function deleteContestant($id): void
    {
        $contestant = $this->contestantById($id);
        if(!empty($contestant->image) && File::exists(public_path() . '/photos/' . $contestant->image)) {
            FILE::delete(public_path() . '/photos/' . $contestant->image);
        }
        $contestant->delete();
    }

}
