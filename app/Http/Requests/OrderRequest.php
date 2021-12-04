<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

        $rules = [
            'admin_name' => '|string',
            'customer_name' => '|string',
            'alamat' => '|string',
            'phone' => '',
            'kecamatan' => '|string',
            'city' => '|string',
            'province' => '|string',

        ];
        $shipTo = $this->get('ship_to');

        if ($shipTo) {
            $rules = array_merge(
                $rules,
                [
                    'shipping_admin_name' => '|string',
                    'shipping_customer_name' => '|string',
                    'shipping_alamat' => '|string',
                    'shipping_phone' => '',
                    'shipping_kecamatan' => '|string',
                    'shipping_city' => '|string',
                    'shipping_province' => '|string',
                ]
            );
        }

        return $rules;
    }
}
