<?php
 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username'=>[
                'required',
                'regex:/^[a-zA-Z0-9]*$/',
            ],
            'password'=>'required|min:6|max:12',
            'shop_name'=>[
                'required',
                'min:2',
                'max:10',
                'regex:/^[a-zA-Z\x{4e00}-\x{9fa5}]+$/u',
            ],
            'firm'=>[
                'required',
                'min:2',
                'max:10',
                'regex:/^[a-zA-Z\x{4e00}-\x{9fa5}]+$/u', 
            ],
            'office_tel'=>[
                'required',
                'regex:/^(13[0-9]|14[579]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\d{8}$/',
            ],
            'firm_address'=>[
                'required',
            ],
            'contact'=>[
                'required',
                'min:2',
            ],
            'QQ'=>[
                'required',
                'regex:/[1-9][0-9]{4,14}/',
            ],
            'cell_phone'=>[
                'required',
                'regex:/^(13[0-9]|14[579]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\d{8}$/',
            ],
            'contact_email'=>[
                'required',
                'regex:/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/',
            ],
            'bpn'=>[
                'required',
            ],
            "t_r_c_n"=>[
                'required',
            ],
            'oc'=>[
                'required',
            ],
            'lar'=>[
                'required',
                'min:2',
            ],
            'lar_id'=>[
                'required',
                'regex:/^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/',
            ],
            'name_bank'=>[
                'required',
            ],
            'bank_branch'=>[
                'required',
            ],
            'ank_account'=>[
                'required',
                'regex:/^([1-9]{1})(\d{14}|\d{18})$/',
            ],
            'introduce'=>[
                'required',
                'max:300',
            ],
            'm1'=>'accepted'
        ];
    }

    
}
