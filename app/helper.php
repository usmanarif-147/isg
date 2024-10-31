<?php

use Carbon\Carbon;

if (!function_exists('getTemplateFrontSide')) {
    function getTemplateFrontSide()
    {
        return
            [
                [
                    'enabled' => 0,
                    'label' => 'First Name',
                    'input_type' => 'text',
                    'placeholder' => 'Enter First Name',
                    'model' => 'first_name',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Last Name',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Last Name',
                    'model' => 'last_name',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Full Name',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Full Name',
                    'model' => 'full_name',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Email',
                    'input_type' => 'email',
                    'placeholder' => 'Enter Email',
                    'model' => 'email',
                    'validation_rules' => 'required|email'
                ],
                [
                    'enabled' => 0,
                    'label' => 'CNIC',
                    'input_type' => 'text',
                    'placeholder' => 'Enter CNIC',
                    'model' => 'cnic',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Phone Number',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Phone Number',
                    'model' => 'phone_number',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Photo',
                    'input_type' => 'file',
                    'placeholder' => '',
                    'model' => 'photo',
                    'validation_rules' => 'nullable|image|mimes:jpeg,jpg,png,webp'

                ],
                [
                    'enabled' => 0,
                    'label' => 'Student ID',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Student ID',
                    'model' => 'student_id',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Address',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Address',
                    'model' => 'address',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Date of Birth',
                    'input_type' => 'date',
                    'placeholder' => '',
                    'model' => 'dob',
                    'validation_rules' => 'required|date|before:today'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Gender',
                    'input_type' => 'select',
                    'placeholder' => '',
                    'options' => ['Male', 'Female'],
                    'model' => 'gender',
                    'validation_rules' => 'required|not_in:-1'
                ]
            ];
    }
}

if (!function_exists('getTemplateBackSide')) {
    function getTemplateBackSide()
    {
        return
            [
                [
                    'enabled' => 0,
                    'label' => 'First Name',
                    'input_type' => 'text',
                    'placeholder' => 'Enter First Name',
                    'model' => 'first_name',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Last Name',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Last Name',
                    'model' => 'last_name',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Full Name',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Full Name',
                    'model' => 'full_name',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Email',
                    'input_type' => 'email',
                    'placeholder' => 'Enter Email',
                    'model' => 'email',
                    'validation_rules' => 'required|email'
                ],
                [
                    'enabled' => 0,
                    'label' => 'CNIC',
                    'input_type' => 'text',
                    'placeholder' => 'Enter CNIC',
                    'model' => 'cnic',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Phone Number',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Phone Number',
                    'model' => 'phone_number',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Photo',
                    'input_type' => 'file',
                    'placeholder' => '',
                    'model' => 'photo',
                    'validation_rules' => 'nullable|image|mimes:jpeg,jpg,png,webp'

                ],
                [
                    'enabled' => 0,
                    'label' => 'Student ID',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Student ID',
                    'model' => 'student_id',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Address',
                    'input_type' => 'text',
                    'placeholder' => 'Enter Address',
                    'model' => 'address',
                    'validation_rules' => 'required|string'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Date of Birth',
                    'input_type' => 'date',
                    'placeholder' => '',
                    'model' => 'dob',
                    'validation_rules' => 'required|date|before:today'
                ],
                [
                    'enabled' => 0,
                    'label' => 'Gender',
                    'input_type' => 'select',
                    'placeholder' => '',
                    'options' => ['Male', 'Female'],
                    'model' => 'gender',
                    'validation_rules' => 'required|not_in:-1'
                ]
            ];
    }
}


if (!function_exists('defaultDateFormat')) {
    function defaultDateFormat($date)
    {
        return Carbon::parse($date)->format('Y-M-d');
    }
}

if (!function_exists('default_time_format')) {
    function default_time_format($date)
    {
        return Carbon::parse($date)->format('g:i:s a');
    }
}

if (!function_exists('generate_string')) {
    function generate_string($input, $strength = 16)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
}

if (!function_exists('userTimeOnApp')) {
    function userTimeOnApp($createdAt)
    {

        $registrationDate = $createdAt;
        $currentDate = Carbon::now();

        // Calculate the difference in seconds
        $diffInSeconds = $currentDate->diffInSeconds($registrationDate);

        // Calculate the difference in minutes
        $diffInMinutes = $currentDate->diffInMinutes($registrationDate);

        // Calculate the difference in hours
        $diffInHours = $currentDate->diffInHours($registrationDate);

        // Calculate the difference in days
        $diffInDays = $currentDate->diffInDays($registrationDate);

        // Calculate the difference in weeks
        $diffInWeeks = $currentDate->diffInWeeks($registrationDate);

        // Calculate the difference in months
        $diffInMonths = $currentDate->diffInMonths($registrationDate);

        // Calculate the difference in years
        $diffInYears = $currentDate->diffInYears($registrationDate);

        // Perform the formatting based on your requirements
        if ($diffInSeconds < 60) {
            return "Less than a minute";
        } elseif ($diffInMinutes < 60) {
            return "$diffInMinutes minutes";
        } elseif ($diffInHours < 24) {
            return "$diffInHours hours";
        } elseif ($diffInDays < 7) {
            return "$diffInDays days";
        } elseif ($diffInWeeks == 1) {
            return "1 week";
        } elseif ($diffInWeeks > 1 && $diffInWeeks < 5 && $diffInDays % 7 != 0) {
            return "$diffInWeeks weeks";
        } elseif ($diffInMonths == 1) {
            return "1 month";
        } elseif ($diffInMonths < 12) {
            return "$diffInMonths months";
        } elseif ($diffInYears == 1) {
            return "1 year";
        } else {
            return "$diffInYears years";
        }
    }

    if (!function_exists('productPriceAfterDiscount')) {
        function productPriceAfterDiscount($price, $discount)
        {
            $discount_amount = ($price * $discount) / 100;
            return floor($price - $discount_amount);
        }
    }
}

if (!function_exists('generate_string')) {
    function generate_string($input, $strength = 16)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
}

if (!function_exists('get_nationalities')) {
    function get_nationalities()
    {
        return [
            'German' => 'German',
            'French' => 'French',
            'British' => 'British',
            'Spanish' => 'Spanish'
        ];
    }
}

if (!function_exists('get_blood_groups')) {
    function get_blood_groups()
    {
        return [

            "A-" => "A-",
            "A+" => "A+",
            "B-" => "B-",
            "B+" => "B+",
            "O-" => "O-",
            "O+" => "O+",
            "AB-" => "AB-",
            "AB+" => "AB+",
        ];
    }
}
