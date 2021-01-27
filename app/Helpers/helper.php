<?php

function translate($file, $word)
{
    return trans($file . '.' . $word);
}

function getShortDescription($product_description)
{
    $description = getDefaultValueKey($product_description);
    if (App::isLocale('en')) {
        $pos = strpos($description, '<div><br></div>');
    } else {
        $no_style_pos = strpos($description, '<div><br></div>');
        $no_space_pos = strpos($description, '<div style="text-align: right;"><br></div>');
        $pos_with_space = strpos($description, '<div style="text-align: right; "><br></div>');

        if ($no_style_pos != false) {
            $pos = $no_style_pos;
        } elseif ($no_space_pos != false) {
            $pos = $no_space_pos;
        } elseif ($pos_with_space != false) {
            $pos = $pos_with_space;
        } else {
            $pos = strlen($description);
        }
    }

    return substr($description, 0, $pos);
}

function slug($string)
{
    $string_lower = strtolower(str_replace(" ", "-", $string));

    if ($string_lower[strlen($string_lower) - 1] == '?') {
        return substr($string_lower, 0, strlen($string_lower) - 1);
    } else {
        return $string_lower;
    }

}

function langSting($first_string, $second_string)
{
    return json_encode([
        'ar' => isset($first_string) && $first_string != null ? $first_string : '',
        'en' => isset($second_string) && $second_string != null ? $second_string : ''
    ]);
}

function getLangValue($string, $lang)
{
    if (isset($string) && $string != null) {
        return json_decode($string)->$lang;
    } else {
        return $string;
    }
}

function deleteImage($image)
{
    if (isset($image) && $image != null) {
        $image_path = 'files/' . $image;
        if (File::isFile($image_path)) {
            \File::delete($image_path);
        }
    }
}

function getCurrentLang()
{
    return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
}

function getDefaultValueKey($value)
{
    $deflan = getCurrentLang();
    return isset(json_decode($value)->$deflan) ? json_decode($value)->$deflan : null;
}

function getPrice($db_price)
{
    return '$' . $db_price;
}

function getOldPrice($db_price)
{
    $old_price = $db_price + ($db_price * (10 / 100));
    return '$' . $old_price;
}
