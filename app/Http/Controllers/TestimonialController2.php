<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = DB::table('testimonials')
                ->leftjoin('testimonial_images', 'testimonials.id', '=', 'testimonial_images.itemid')
                ->select('testimonials.*','testimonial_images.filename','testimonial_images.itemid as imageid','testimonial_images.alt','testimonial_images.caption','testimonial_images.main')
                ->orderBy('testimonials.position', 'asc')
                ->get();
        $arrays=[];
        foreach($testimonials as $object){
            $arrays[] = (array)$object;
        }
        return view('/templates/testimonials', ['testimonials'=>$arrays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($request['id'] > 0) {
            $this->validate($request, [
                'title' => 'required',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            Service::where('id', $request['id'])->update([
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
                $aboutimage = new TestimonialImage();
                $aboutimage->filename = $input['imagename'];
                $aboutimage->itemid = $request['id'];
                $aboutimage->alt = $request['caption'];
                $aboutimage->caption = $request['caption'];
                $aboutimage->main = $request['main'];
                $aboutimage->save();
            }
        } else {
            $this->validate($request, [
                'title' => 'required|unique:testimonials',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //insert testimonials
            $aboutitem = new Testimonial();
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
                $aboutimage = new TestimonialImage();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
//        $testimonial = Testimonial::find($request['id']);
//        $testimonial->delete();
//        return redirect()->back();
    }
}
