<?php

use App\Models\Company;
use App\Models\ProductCategory;

if (!function_exists('get_locations')) {
    function get_locations()
    {
        $company = Company::where('key', 'address')->first();
        return @$company->value ?? '';
    }
}

if (!function_exists('get_contacts')) {
    function get_contacts()
    {
        $company = Company::where('key', 'contact')->first();
        return @$company->value ?? '';
    }
}

if (!function_exists('get_company_name')) {
    function get_company_name()
    {
        $company = Company::where('key', 'name')->first();
        return @$company->value ?? '';
    }
}

if (!function_exists('get_company_description')) {
    function get_company_description()
    {
        $company = Company::where('key', 'about')->first();
        $desc = @strip_tags(@$company->value ?? '');
        return @$desc;
    }
}


if (!function_exists('get_logo')) {
    function get_logo()
    {
        $company = Company::where('key', 'logo')->first();
        if (@$company) {
            return asset('storage/' . @$company->media[0]->url);
        }
        return '';
    }
}

if (!function_exists('get_mini_logo')) {
    function get_mini_logo()
    {
        $company = Company::where('key', 'mini_logo')->first();
        if (@$company) {
            return asset('storage/' . @$company->media[0]->url);
        }
        return '';
    }
}

if (!function_exists('get_product_categories')) {
    function get_product_categories()
    {
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();

        return @$product_categories ?? [];
    }
}

if (!function_exists('telp_format')) {
    function telp_format($text = '')
    {
        $replacements = [
            "+" => "",
            " " => "",
            "-" => "",
            "_" => "",
        ];
        return strtr($text, $replacements);
    }
}
