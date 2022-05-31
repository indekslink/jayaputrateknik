<?php

use App\Models\Contact;
use App\Models\SEO;

function getPhone()
{
    $contact = Contact::first();
    if ($contact) {

        $phones = str_replace(array("\r", "\n"), '', $contact->phone);
        $phones = collect(explode('<br />', $phones))->filter(function ($val) {
            return $val != '';
        })->toArray();

        return $phones;
    }
    return [];
}
function convertWa($phone)
{
    if ($phone) {

        $result = implode("", explode('-', $phone));
        $result = '62' . substr($result, 1);
        return $result;
    }

    return null;
}

function seoKeywords()
{
    $result = SEO::all();
    $result = $result->map(function ($key) {
        return $key->name;
    })->toArray();
    $result = implode(", ", $result);
    return $result;
}
