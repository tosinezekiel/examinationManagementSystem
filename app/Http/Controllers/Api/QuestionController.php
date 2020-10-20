<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    
    public function index()
    {
        $questions = Question::with('options')->get();
        return response(['data' => $questions, "status" => true], 200);
    }

    
    public function store(QuestionRequest $request)
    {
        $question = Question::create([
            "title" => request()->question,
            "category_id" => request()->category
        ]);
        $question->options()->create([
            "a" => request()->option_a,
            "b" => request()->option_b,
            "c" => request()->option_c,
            "d" => request()->option_d,
            "correct_answer" => request()->correct_option,
        ]);

        return response(['message' => "Question saved successfully.", "status" => true], 201);
    }

    public function show($id){
        $question = Question::with('category')->whereId($id)->first();
        if(!$question){
            return response(['message' => "Question could not be found.", "status" => false], 404);
        }

        return response(['data' => $question, "status" => true], 200);
    }




    public function update(QuestionUpdateRequest $request, $id)
    {
        
        $question = Question::whereId($id)->first();
        if(!$question){
            return response(['message' => "Question could not be found.", "status" => false], 404);
        }
        $data = request()->all();
        $question->update($data);
        $question->options->update($data);

        return response(['message' => "Question updated successfully.", "status" => true], 200);
    }

   



    public function destroy($id)
    {
        $question = Question::whereId($id)->first();
        if(!$question){
            return response(['message' => "Question could not be found.", "status" => false], 404);
        }
        $question->delete();
        return response(['message' => "Question deleted successfully.", "status" => true], 200);
    }
}
