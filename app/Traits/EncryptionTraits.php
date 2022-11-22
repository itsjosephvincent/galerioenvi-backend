<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait EncryptionTraits
{
    public function encrypt($string)
    {
        return Crypt::encryptString($string);
    }

    public function decrypt($encryptedValue)
    {
        return Crypt::decryptString($encryptedValue);
    }
}
