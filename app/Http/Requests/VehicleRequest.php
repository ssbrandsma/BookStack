<?php

// app/Http/Requests/VehicleRequest.php

namespace Bookstack\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can customize the authorization logic if needed.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vin' => 'required|string|max:255',
            'modelyear' => 'required|integer',
            'manufactoryear' => 'nullable|integer',
            'factory' => 'nullable|string|max:255',
            'body' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'trim' => 'nullable|string|max:255',
            'dso' => 'nullable|string|max:255',
            'axle' => 'nullable|string|max:255',
            'engine' => 'nullable|string|max:255',
            'trans' => 'nullable|string|max:255',
            'serial' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'source' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for an image file
        ];
    }
}