<?php

namespace site\Http\Requests;

use site\Http\Requests\Request;

class UserEditFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
          'sur_name' => 'required|max:255',
          'first_name' => 'required|max:255',
          'other_name' => 'required|max:255',
          'day' => 'required',
          'month' => 'required',
          'year' => 'required|numeric|min:4',
          'state_of_origin' => 'required|max:15',
          'lga' => 'required|max:255',
          'sex' => 'required',
          'marital_status' => 'required',
          'religion' => 'required',
          'nature_of_business' => 'required',
          'residential_address' => 'required|max:255',
          'office_address' => 'required|max:255',
          'payment_option' => 'required',
          'next_kin_name' => 'required|max:255',
          'next_kin_day' => 'required',
          'next_kin_month' => 'required',
          'next_kin_year' => 'required|numeric|min:4',
          'next_kin_relationship' => 'required|max:255',
          'next_kin_phone' => 'required|min:11|max:11',
          'phone' => 'required|min:11|max:11',
          'email' => 'required|email|max:255',
          'password' => 'confirmed|min:10',
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
