<?php

use Models\Department;

$departmentDetailsModel = new Department();
$result = $departmentDetailsModel->getDepartment($id);

print_r($result);

