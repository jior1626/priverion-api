<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Form::all();

        return response()->json($forms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            'questions' => 'array:description,type',
            'questions.*.answers' => 'array:description,type'
        ]);

        $newForm = new Form();
        $newForm->title = $request->title;
        $newForm->description = $request->description;
        $newForm->save();

        foreach ($request->questions as $question) {
            
            $questionSave = $newForm->questions()->fill($question);

            foreach ($question as $answer) {
                $questionSave->answers()->fill($answer);
            }
        }


        return response()->json(["message" => "Form created sucessfully!", "data" => $newForm]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        return response()->json($form);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return response()->json(["message" => "Form deleted sucessfull!"]);
    }
}
