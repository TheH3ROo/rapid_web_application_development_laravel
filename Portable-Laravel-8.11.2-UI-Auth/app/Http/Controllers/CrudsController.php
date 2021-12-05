<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Crud;

class CrudsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return IlluminateHttpResponse
    */
    public function index()
    {
        $images = Crud::latest()->paginate(6);
        return view('crudindex', compact('images'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return IlluminateHttpResponse
    */
    public function create()
    {
        return view('create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param IlluminateHttpRequest $request
    * @return IlluminateHttpResponse
    */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|image|max:2048'
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'title' => $request->title,
            'image' => $new_name,
            'creator' => $request->creator
        );
        Crud::create($form_data);
        return redirect('crud')->with('success', 'Data Added successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return IlluminateHttpResponse
    */
    public function show($id)
    {
        $data = Crud::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return IlluminateHttpResponse
    */
    public function edit($id)
    {
        $data = Crud::findOrFail($id);
        return view('edit', compact('data'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param IlluminateHttpRequest $request
    * @param int $id
    * @return IlluminateHttpResponse
    */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $this->validate($request,[
                'title' => 'required',
                'image' => 'image|max:2048'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $this->validate($request,[
                'title' => 'required',
            ]);
        }
        $form_data = array(
            'title' => $request->title,
            'image' => $image_name,
            'creator' => $request->creator
        );
        Crud::whereId($id)->update($form_data);
        return redirect('crud')->with('success', 'Data is successfully updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return IlluminateHttpResponse
    */
    public function destroy($id)
    {
        $data = Crud::findOrFail($id);
        $data->delete();
        return redirect('crud')->with('success', 'Data is successfully deleted');
    }
}