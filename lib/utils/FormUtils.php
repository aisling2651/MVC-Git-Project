<?php

class FormUtils {

    public static function getValue($index, $sanitize_func, $validate_func) {

        #Checking if a value was entered and not empty
        $was_posted = isset($index);
        if (!$was_posted) {
            return [
                'value' => '',
                'is_valid' => false
            ];
        }

        #Sanitize if value entered
        $value = $index;
        if ($sanitize_func !== NULL) {
            $value = filter_var($value, $sanitize_func);
        }

        #Now validate (if requested)
        $is_valid = true;
        if ($validate_func !== NULL) {
            $is_valid = filter_var($value, $validate_func);
        }

        # Return sanitized value, and boolean to
        # indicate valid or not.
        return [
            'value' => $value,
            'is_valid' => $is_valid
        ];
    }

    /**
     * Get a required post integer in an allowed range
     */
    public static function getPostInt($index) {

        # Use the generic method to get the raw value
        $raw_value = FormUtils::getValue($index, FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);

        # If the generic check was valid, apply further checks
        if ($raw_value['is_valid']) {

            # The value is still a string (all post values start as string)
            # Since we're asking for a number, we should convert it to
            # a number type (by type casting)
            $raw_value['value'] = (int) $raw_value['value'];
            }
        

        return $raw_value;
    }

    /**
     * Get a posted string, which can be empty or not
     */
    public static function getPostString($index, $allow_empty = false) {
        $raw_value = FormUtils::getValue($index, FILTER_SANITIZE_STRING, NULL);

        if ($raw_value['is_valid']) {

            # Trim white space
            $raw_value['value'] = trim($raw_value['value']);

            if (!$allow_empty && empty($raw_value['value'])) {
                $raw_value['is_valid'] = false;
            }
        }
        return $raw_value;
    }

    #Checks the date input is before todays
    public static function getPostDate($index, $allow_empty = false) {
        $raw_value = FormUtils::getValue($index, FILTER_SANITIZE_STRING, NULL);

        if ($raw_value['is_valid']) 
        {
            $date_now = date("Y-m-d");
            $enteredDate = $raw_value['value'];
            
            if($enteredDate > $date_now)
            {
                $raw_value['is_valid'] = false;
            }

            
        }
        return $raw_value;
    }



    //built in method to check  that the email is of correct format and sanitize the email
    public static function getPostEmail($index, $allow_empty = false) 
    {
        return FormUtils::getValue($index, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
    }

    //built in method to check float format and sanitize the input
    public static function getPostFloat($index, $allow_empty = false) 
    {
        return FormUtils::getValue($index,FILTER_VALIDATE_FLOAT, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    

}
?>