<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTablesSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [
    'Employee',
    'Archive',
    'EmployeeDismissal',
    'permissions',
    'editEmployee',
    'deleteEmployee',
    'ArchiveEmployee',
    'showRoles',
    'AddRoles',
    'EidtRoles',
    'DeleteRoles',
    'addEmployee',
    'Add Attendance',
    'Edit',
    'Delete',
];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}
