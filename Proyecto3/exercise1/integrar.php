<?php


include('userForm.php');
//include('filterForm.php');
include('validateForm.php');
//include('renderForm.php');

//$filterdata = filterForm($userForm, $_POST);
$filterdata = $_POST;
//$validatedata = validateForm($userForm, $filterdata);
validateForm($userForm, $filterdata);
