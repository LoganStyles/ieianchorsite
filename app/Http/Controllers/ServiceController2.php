<?php

namespace App\Http\Controllers;

use App\Service;
use App\Serviceimages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('services')
                ->leftjoin('servicesimages', 'services.id', '=', 'servicesimages.itemid')
                ->select('services.*','servicesimages.filename','servicesimages.itemid as imageid','servicesimages.alt','servicesimages.caption','servicesimages.main')
                ->orderBy('services.position', 'asc')
                ->get();
        $arrays=[];
        foreach($services as $object){
            $arrays[] = (array)$object;
        }
        return view('/templates/services', ['services'=>$arrays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        print_r($request->all());exit;
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
                $aboutimage = new Servicesimages();
                $aboutimage->filename = $input['imagename'];
                $aboutimage->itemid = $request['id'];
                $aboutimage->alt = $request['caption'];
                $aboutimage->caption = $request['caption'];
                $aboutimage->main = $request['main'];
                $aboutimage->save();
            }
        } else {
            $this->validate($request, [
                'title' => 'required|unique:services',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //insert services
            $aboutitem = new Service();
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
                $aboutimage = new Servicesimages();
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
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service = Service::find($request['id']);
        $service->delete();
        return redirect()->back();
    }
    
    public function showModule($item) {

        $itemimages = $item . 'images';
        $items = $item . 's';
        $moduleitems = DB::table($items)
                ->leftjoin($itemimages, $items . '.id', '=', $itemimages . '.itemid')
                ->select($items . '.*', $itemimages . '.filename', $itemimages . '.itemid as imageid', $itemimages . '.alt', $itemimages . '.caption', $itemimages . '.main')
                ->get();

        $arrays = [];
        foreach ($moduleitems as $object) {
            $arrays[] = (array) $object;
        }

        if (count($arrays) <= 0) {//provide defaults
            $sub_array = [];
            $sub_array['id'] = 0;
            $sub_array['title'] = "";
            $sub_array['details'] = "";
            $sub_array['link_label'] = "";
            $sub_array['position'] = 1;
            $sub_array['display'] = 1;
            $sub_array['keywords'] = "";
            $sub_array['description'] = "";
            $sub_array['excerpt'] = "";
            $sub_array['type'] = $item;
            $sub_array['filename'] = "";
            $sub_array['imageid'] = "";
            $sub_array['alt'] = "";
            $sub_array['caption'] = "";
            $sub_array['main'] = "";
            $arrays[] = $sub_array;
        }

//        print_r($arrays);exit;
        $view = "/templates/" . $item;
        return view($view, ['moduleitems' => $arrays, 'page_name' => $item]);
    }

    /* process modules create & edit */

    public function processModule(Request $request) {

        if ($request['id'] > 0) {//validate and already existing module item
            $this->validate($request, [
                'title' => 'required',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //chk for module type
            switch ($request['type']) {//chk for module type
                case'about':
                    About::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display']
                    ]);
                    $moduleimage = new Aboutimages();
                    break;
                
                case'service':
                    Service::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display']
                    ]);
                    $moduleimage = new Aboutimages();
                    break;
            }

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //insert the image                
                $moduleimage->filename = $input['imagename'];
                $moduleimage->itemid = $request['id'];
                $moduleimage->alt = $request['caption'];
                $moduleimage->caption = $request['caption'];
                $moduleimage->main = $request['main'];
                $moduleimage->save();
            }
        } else {
            //validate and already existing module item
            $this->validate($request, [
                'title' => 'required|unique:abouts',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //chk for module type
            switch ($request['type']) {
                case'about':
                    $moduleitem = new About();
                    $moduleimage = new Aboutimages();
                    break;

                case'service':
                    $moduleitem = new Service();
                    $moduleimage = new Serviceimages();
                    break;
            }

            //insert modules            
            $moduleitem->title = $request['title'];
            $moduleitem->details = trim($request['details']);
            $moduleitem->position = $request['position'];
            $moduleitem->display = $request['display'];
            $moduleitem->save();

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //save the image                
                $moduleimage->filename = $input['imagename'];
                $moduleimage->itemid = $moduleitem->id;
                $moduleimage->alt = $request['caption'];
                $moduleimage->caption = $request['caption'];
                $moduleimage->main = $request['main'];
                $moduleimage->save();
            }
        }

        //    return redirect()->route('view');
        return redirect()->back();
    }

}
