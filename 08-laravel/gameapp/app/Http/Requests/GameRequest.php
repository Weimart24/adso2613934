<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // return [
        //     'title' => 'required',
        //     'developer' => 'required',
        //     'releasedate' => 'required'
        // ];

        if ($this->method() == 'PUT') {
            return [
                'title' => 'required|unique:game,title,' . $this->id,
                'developer' => 'required|string',
                'releasedate' => 'required|date',
                'category_id' => 'required',
                'price' => 'required|decimal:2',
                'genre' => 'required',
                'slider' => 'required',
                'description' => 'required'
            ];
        } else {
            return [
                'title' => 'required|unique:games',
                'image' => 'required|image',
                'developer' => 'required|string',
                'releasedate' => 'required|date',
                'category_id' => 'required',
                'price' => 'required|decimal:2',
                'genre' => 'required',
                'slider' => 'required',
                'description' => 'required'
            ];
            // $game = new Game;
            // $game -> title = $request -> title;
            // $game -> developer = $request -> developer;
            // $game -> releasedate = $request -> releasedate;
            // $game -> category_id = $request -> category_id;
            // $game -> price = $request -> price;
            // $game -> genre = $request -> genre;
            // $game -> description = $request -> description;
            // $game -> slider = $request -> slider;
        }
    }
}