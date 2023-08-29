<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function task1()
    {
        $distinctJobIds = Employee::distinct()->pluck('job_id');
        //SELECT DISTINCT job_id FROM employees;
        foreach($distinctJobIds as $job) {
            echo $job.'<br>';
        }

    }

    public function task2()
    {
        $maxSalary = Employee::where('job_id', 'IT_PROG')->max('salary');
        //SELECT MAX(salary) AS max_salary
        //FROM employees
        //WHERE job_id = 'IT_PROG';

        echo $maxSalary;
    }

    public function task3()
    {
        $departmentStats = Employee::where('department_id', 90)
            ->select(DB::raw('AVG(salary) as average_salary'), DB::raw('COUNT(*) as employee_count'))
            ->first();
//        SELECT AVG(salary) AS average_salary, COUNT(*) AS employee_count
//FROM employees
//WHERE department_id = 90;
        echo 'salary: '.$departmentStats->average_salary.'<br>';
        echo 'employee count: '.$departmentStats->employee_count;
    }

    public function task4()
    {
        $employeesByJob = Employee::select('job_id', DB::raw('COUNT(*) as employee_count'))
            ->groupBy('job_id')
            ->get();
//        SELECT job_id, COUNT(*) AS employee_count
//FROM employees
//GROUP BY job_id;
        foreach($employeesByJob as $job) {
            echo $job->job_id.' : ';
            echo $job->employee_count.'<br>';
        }
    }
    public function task5(){
        $salaryDifference = Employee::max('salary') - Employee::min('salary');

//        SELECT MAX(salary) - MIN(salary) AS salary_difference
//FROM employees;
        return $salaryDifference;
    }
    public function task6(){
        $lowestSalaries = Employee::select('manager_id', DB::raw('MIN(salary) as lowest_salary'))
            ->groupBy('manager_id')
            ->get();
//        SELECT manager_id, MIN(salary) AS lowest_salary
//FROM employees
//GROUP BY manager_id;
        foreach($lowestSalaries as $salary){
            echo $salary->manager_id.' : ';
            echo $salary->lowest_salary.'<br>';
        }
    }
    public function task7(){
        $totalSalaries = Employee::select('department_id', DB::raw('SUM(salary) as total_salary'))
            ->groupBy('department_id')
            ->get();
//        SELECT department_id, SUM(salary) AS total_salary
//FROM employees
//GROUP BY department_id;
        foreach($totalSalaries as $salary){
            echo $salary->department_id.' : ';
            echo $salary->total_salary.'<br>';
        }
    }
    public function task8(){
//        SELECT job_id, AVG(salary) AS average_salary
//FROM employees
//WHERE job_id <> 'Programmer'
//GROUP BY job_id;
        $averageSalaries = Employee::where('job_id', '<>', 'Programmer')
            ->select('job_id', DB::raw('AVG(salary) as average_salary'))
            ->groupBy('job_id')
            ->get();

        foreach($averageSalaries as $salary){
            echo $salary->job_id.' : ';
            echo $salary->average_salary.'<br>';
        }
    }
}
