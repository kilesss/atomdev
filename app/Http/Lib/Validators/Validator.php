<?php


namespace App\Http\Lib\Validators;


/**
 * Class Validator
 * @package App\Http\Lib\Validators
 */
class Validator extends ValidatorCore
{

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $request
     * @return array|bool
     */
    public function submitForm($request)
    {
        return $this->validate($request,
            [
                'name' => $this->rules['name'],
                'email' => $this->rules['email'],
                'phone' => $this->rules['phone'],
                'msg' => $this->rules['message'],
            ]);
    }

}
