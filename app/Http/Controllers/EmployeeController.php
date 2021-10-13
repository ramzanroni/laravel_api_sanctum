<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::find(1)->companyData;
    }
    public function oneToMany()
    {
        return Employee::find(1)->companyInfo;
    }
}
