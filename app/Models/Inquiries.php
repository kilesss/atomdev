<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inquiries extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','message'
    ];

    protected $table  = 'inquiries';


    public function createNewRecord(): bool
    {
        return DB::table($this->table)
            ->insert([
                'name' => request('name'),
                'email' => request('email'),
                'phone' => request('phone'),
                'message' => request('msg'),
            ]);
    }
}
