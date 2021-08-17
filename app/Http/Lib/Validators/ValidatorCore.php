<?php

namespace App\Http\Lib\Validators;


use Illuminate\Support\Facades\Config;

/**
 * Class ValidatorCore
 * @package App\Http\Lib\Validators
 */
class ValidatorCore
{

    /**
     * @var array|mixed
     */
    protected array $messages = [];
    /**
     * @var array|mixed
     */
    protected array $rules = [];


    /**
     * ValidatorCore constructor.
     */
    public function __construct()
    {
        $this->messages = Config::get('validatorCodes.messages');
        $this->rules = Config::get('validatorCodes.rules');
    }

    /**
     * @param $data
     * @param $rules
     * @param false $extraRule
     * @return array|bool
     */
    protected function validate($data, $rules, $extraRule = false)
    {
        $message = [];
        foreach ($rules as $keyRule => $rule) {
            if (isset($this->messages[$keyRule])) {
                $messages = $this->messages[$keyRule];
                foreach ($messages as $keyMess => $mess) {
                    $message[$keyRule . '.' . $keyMess] = $mess;
                }
            }
        }
        $validator = \Illuminate\Support\Facades\Validator::make($data, $rules, $message);
        if ($validator->fails()) {
            return $validator->errors()->getMessages();
        }
        return true;
    }
}
