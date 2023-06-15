<?php
namespace App\Helper;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ValidatorHelper {
    protected $validator;
    protected $array;
    protected $name;
    protected $request;

    public function __construct($request, $array, $name = ''){
        $this->validator = Validator::make($request->all(), $array);
        $this->name = $name;
        $this->array = $array;
        $this->request = $request;
    }
    public function isValid(): bool {
        try {
            if ($this->validator->fails()) {
                foreach ($this->validator->errors()->messages() as $value => $message) {
                    Alert::inputAlert($value, implode(' ', $message), 'danger');
                    unset($this->array[$value]);
                }
                foreach ($this->array as $value => $array) {
                    Alert::inputValue($value, $this->request->all()[$value]);
                }
                Alert::simple('danger', 'Harap isi semua kolom dengan benar');
                return true;
            }
            return false;
        } catch (\Exception $err) {
            Alert::simple('danger', json_encode($err));
            return true;
        }
    }
    public function validated() {
        return $this->validator->validated();
    }
}
