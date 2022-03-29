<?php

use App\Models\Contact;

function getPhone()
{
    $contact = Contact::first();
    $phones = str_replace(array("\r", "\n"), '', $contact->phone);
    $phones = collect(explode('<br />', $phones))->filter(function ($val) {
        return $val != '';
    })->toArray();

    return $phones;
}
function convertWa($phone)
{

    $result = implode("", explode('-', $phone));
    $result = '62' . substr($result, 1);
    return $result;
}
