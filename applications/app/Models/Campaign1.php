<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign1 extends Model
{
    protected $table = 'amd_campaign_1';

    protected $fillable = ['nama', 'hp', 'email', 'kota', 'pertanyaan_1', 'pertanyaan_2', 'pertanyaan_3', 'pertanyaan_4', 'kupon_id'];
}
