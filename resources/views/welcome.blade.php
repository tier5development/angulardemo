@extends('layouts.master')
@section('page_wise_style')
	<style type="text/css">
		.Inputspacex {
			float: right; margin-bottom: 2%;
		}
		.spacex {
			margin-bottom: 3% !important;
		}
	</style>
@endsection
@section('content')
<div class="container" ng-controller="indexController" ng-init="init();">
  <h2>Tier5 Employees</h2>

  <p>Employee List of Tier5 Technologies Pvt. Ltd.</p> 
  <div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">
		<!-- <button type="button" class="btn btn-primary btn-sm spacex"><i class="fa fa-plus" aria-hidden=true></i> Add Employee</button> -->
		<a href="#/add-employee">Add Employee</a>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">
		<input type="text" ng-model="emp_name" class="Inputspacex">     
	</div>
  </div>
                   
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
      	<th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Role</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat = "each_employee in total_body| filter : emp_name | orderBy : created_at ">
      	<td>[[$index +1]]</td>
        <td>[[each_employee.employee_name]]</td>
        <td>[[each_employee.employee_email]]</td>
        <td>[[each_employee.phone_number]]</td>
        <td>[[each_employee.role | uppercase]]</td>
        <td>[[each_employee.address]]</td>
        <td>
        	<div class="row">
        		<div class="col-md-4 col-sm-4 col-xs-4">
        			<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden=true></i> Edit</button>
        		</div>
        		<div class="col-md-4 col-sm-4 col-xs-4">
        			<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden=true></i> Delete</button>
        		</div>
        	</div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection