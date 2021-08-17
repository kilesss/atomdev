<?php

namespace App\Http\Controllers;

use App\Http\Lib\Helpers\GeneralHelpers;
use App\Models\Inquiries;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class Contacts
 * @package App\Http\Controllers
 */
class Contacts extends Controller
{
    /**
     * Contacts constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm()
    {
        return view('welcome');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function submitForm(Request $request)
    {

        //eloquent way
        $inquiries = new Inquiries();
        //it`t can be used $request->get(name) or request(name) , but because we validate the data before came to
        // controller and because all fields is mandatory we can use each of the ways.
        $inquiries->name = $request->name;
        $inquiries->email = strtolower($request->email);
        $inquiries->phone = $request->phone;
        $inquiries->message = $request->msg;
        $status = $inquiries->save();

        //the query builder way
//        $status = $inquiries->createNewRecord();

        if ($status === true) {
            GeneralHelpers::sendMail($request->name, $request->email, $request->phone, $request->message);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Thanks for the message'
            ]
        );

    }
}
