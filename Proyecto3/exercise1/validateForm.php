<?php

/**
 * Validate form
 * 
 * @param array $form definition
 * @param array $datafiltered filtered
 * @return boolean | array ('fildname'=>'error message') $validatedata
 */
function validateForm($form, $dataFiltered)
{
    $validateData = null;
    echo "<pre>";
    echo print_r($validateData);
    echo "</pre>";
    die;
    /*
    foreach ($form as $field => $valueForm) {
        if (array_key_exists('validation', $valueForm)) {
            $validations = $valueForm['validation'];
            if ($validations) {
                $errorMessage = array_key_exists('error_message', $validations) ? $validations['error_message'] : 'Es necesario introducir un valor.';
                foreach ($validations as $keyValidation => $valueValidation) {
                    switch ($keyValidation) {
                        case 'required':
                            $validateData = required($valueValidation, $field, $dataFiltered, $errorMessage);
                            break;
                        case 'minsize':
                            //minSize();
                            break;
                        case 'maxsize':
                            //maxSize();
                            break;
                    }
                }
            }
        }
    }
    
    $validateData = !($validateData == null) ? $validateData : true;
    echo "<pre>";
    echo print_r($validateData);
    echo "</pre>";
    */
    return $validateData;
}


function required($isRequired, $field, $data, $errorMessage){
    $result = null;
    if ($isRequired) {
        $result = strlen($data[$field])>0 ? null : array($field, $errorMessage);
    }
    return $result;
}

function minSize(){
    $result = true;
    
    return $result;
}

function maxSize() {
    $result = true;
    
    return $result;
}