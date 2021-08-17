<?php
return[
    'rules' => [
                'name'=> 'required|min:1|max:50',
                'email'=> 'required|email:rfc,dns|min:1|max:50',
                'phone'=> 'required',
               'message'=> 'required|min:1|max:500',
    ],
    'messages' => [
        'name' => [
            'required'=>'Name is required field.',
            'min'=>'Name is required field.',
            'max'=>'Name is too long.',
        ],
        'email' => [
            'required'=>'Email is required',
            'min'=>'Email is required',
            'max'=>'Email is too long.',
            'email'=>'Email is not valid',
        ],
        'phone' => [
            'required'=>'Phone is required',
        ],
        'message' => [
            'required'=>'Message is required',
            'min'=>'Message is required',
            'max'=>'Message is too long',
        ],


    ]
];
