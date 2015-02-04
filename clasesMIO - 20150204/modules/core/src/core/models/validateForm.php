<?php
/**
* Validate form
*
* @param array $form definition
* @param array $datafiltered filtered
* @return boolean | array ('fieldname'=>'error message') $validatedata
*/
function validateForm($form, $dataFiltered)
{
    
//     echo '<pre>';
//     echo("->>>>> dentro de validateForm!!!\n");
//     print_r($dataFiltered);
//     echo '</pre>';
    
    $validateData = 2;
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
    return $validateData;
}

function required($isRequired, $field, $data, $errorMessage)
{
    $result = null;
    if ($isRequired) {
        $result = strlen($data[$field])>0 ? null : array($field, $errorMessage);
    }
    return $result;
}

function minSize()
{
    $result = true;
    return $result;
}

function maxSize() 
{
    $result = true;
    return $result;
}