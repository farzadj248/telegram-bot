<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question as QuestionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Question extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = QuestionModel::with(['user' => function ($query) {
            $query->select('id','email','name');
        }])
        ->with(['category' => function ($query) {
            $query->select('id','name');
        }])
        ->select('id','question','answer','category_id','user_id','mis1','mis2','mis3','mis4','mis5','mis6','score')
        ->paginate(20);

        return view('pages.questions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::select("name","id")->get();

        return view('pages.questions.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required|numeric',
            'mis1' => 'nullable',
            'mis2' => 'nullable',
            'mis3' => 'nullable',
            'mis4' => 'nullable',
            'mis5' => 'nullable',
            'mis6' => 'nullable',
            'score' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        QuestionModel::create([
            'user_id' => Auth()->user()->id,
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $request->category_id,
            'mis1' => $request->mis1,
            'mis2' => $request->mis2,
            'mis3' => $request->mis3,
            'mis4' => $request->mis4,
            'mis5' => $request->mis5,
            'mis6' => $request->mis6,
            'score' => $request->score
        ]);

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionModel $question)
    {
        $category = Category::select("name","id")->get();
        return view('pages.questions.edit', ['question' => $question ,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionModel $question)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required|numeric',
            'mis1' => 'nullable',
            'mis2' => 'nullable',
            'mis3' => 'nullable',
            'mis4' => 'nullable',
            'mis5' => 'nullable',
            'mis6' => 'nullable',
            'score' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $question->update([
            'user_id' => Auth()->user()->id,
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $request->category_id,
            'mis1' => $request->mis1,
            'mis2' => $request->mis2,
            'mis3' => $request->mis3,
            'mis4' => $request->mis4,
            'mis5' => $request->mis5,
            'mis6' => $request->mis6,
            'score' => $request->score
        ]);

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionModel $question)
    {
        $question->delete();
        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }
}
