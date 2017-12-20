<?php

namespace App\Http\Controllers;

use App\About;
use App\Aboutimages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AboutitemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        $abouts = About::orderBy('position', 'asc')->get();
        $abouts = DB::table('abouts')
                ->leftjoin('aboutimages', 'abouts.id', '=', 'aboutimages.itemid')
                ->select('abouts.*', 'aboutimages.filename', 'aboutimages.itemid as imageid', 'aboutimages.alt', 'aboutimages.caption', 'aboutimages.main')
                ->orderBy('abouts.position', 'asc')
                ->get();
        $arrays = [];
        foreach ($abouts as $object) {
            $arrays[] = (array) $object;
        }
        
        if (count($arrays) <= 0) {//provide defaults
            $sub_array=[];
            $sub_array['id'] = 0;
            $sub_array['url'] = "";
            $sub_array['email'] = "";
            $sub_array['phone1'] = "";
            $sub_array['phone2'] = "";
            $sub_array['facebook'] = "";
            $sub_array['twitter'] = "";
            $sub_array['instagram'] = "";
            $sub_array['youtube'] = "";
            $sub_array['linkedin'] = "";
            $sub_array['client_url'] = "";
            $sub_array['opening'] = "";
            $sub_array['office'] = "";
            $sub_array['filename'] = "";
            $sub_array['imageid'] = "";
            $sub_array['alt'] = "";
            $sub_array['caption'] = "";
            $sub_array['main'] = "";
            $arrays[]=$sub_array;
        }
        return view('/templates/about', ['abouts' => $arrays, 'page_name' => 'about']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        if ($request['id'] > 0) {
            $this->validate($request, [
                'title' => 'required',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            About::where('id', $request['id'])->update([
                'title' => $request['title'],
                'details' => trim($request['details']),
                'position' => $request['position'],
                'display' => $request['display']
            ]);

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //insert the image
                $aboutimage = new Aboutimages();
                $aboutimage->filename = $input['imagename'];
                $aboutimage->itemid = $request['id'];
                $aboutimage->alt = $request['caption'];
                $aboutimage->caption = $request['caption'];
                $aboutimage->main = $request['main'];
                $aboutimage->save();
            }
        } else {
            $this->validate($request, [
                'title' => 'required|unique:abouts',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //insert abouts
            $aboutitem = new About();
            $aboutitem->title = $request['title'];
            $aboutitem->details = trim($request['details']);
            $aboutitem->position = $request['position'];
            $aboutitem->display = $request['display'];
            $aboutitem->save();

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //save the image
                $aboutimage = new Aboutimages();
                $aboutimage->filename = $input['imagename'];
                $aboutimage->itemid = $aboutitem->id;
                $aboutimage->alt = $request['caption'];
                $aboutimage->caption = $request['caption'];
                $aboutimage->main = $request['main'];
                $aboutimage->save();
            }
        }

        //    return redirect()->route('view');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $aboutitem
     * @return \Illuminate\Http\Response
     */
    public function show(About $aboutitem) {
        $siteitems = DB::table('siteinfos')
                ->leftjoin('siteimages', 'siteinfos.id', '=', 'siteimages.itemid')
                ->select('siteinfos.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();

        $abouts = DB::table('abouts')
                ->leftjoin('aboutimages', 'abouts.id', '=', 'aboutimages.itemid')
                ->select('abouts.*', 'aboutimages.filename', 'aboutimages.itemid as imageid', 'aboutimages.alt', 'aboutimages.caption', 'aboutimages.main')
                ->orderBy('abouts.position', 'asc')
                ->get();
        $arrays = [];
        foreach ($abouts as $object) {
            $arrays[] = (array) $object;
//            $temp_details=substr($arrays[0]['details'],3,-4);
//            $temp_details=substr($temp_details,-3);
//            echo $temp_details;
//            echo substr($arrays[0]['details'],3);
//            echo ($arrays[0]['details']);
        }
        
//        exit;
        
        return view('/site/about', ['abouts' => $arrays, 'siteitems' => $siteitems]);
    }

    /**
     * Display all items
     */
//    public function showAll(){
//        $abouts=  App\Aboutitems::orderBy('position','asc');
//        print_r($abouts);exit;
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $aboutitem
     * @return \Illuminate\Http\Response
     */
    public function edit(About $aboutitem) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $aboutitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $aboutitem) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $aboutitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $aboutitem = About::find($request['id']);
        $aboutitem->delete();
        return redirect()->back();
    }

}
