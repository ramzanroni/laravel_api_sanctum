<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Validator;
class DamiApiController extends Controller
{
    public function getData()
    {
        return [ 
            "name"=>"Ramzan",
            "id"=>"191015111",
            "university"=>"GUB"
    ];
    }
    public function getDataDB($id=null)
    {
        return $id?Employee::find($id):Employee::all();
    }
    public function AddData(Request $req)
    {
        $data_input=new Employee;
        $data_input->name=$req->name;
        $data_input->email=$req->email;
        $result=$data_input->save();
        if($result)
        {
            return ["result"=>"Insert Successfully done"];
        }
        else{
            return ["result"=>"Operation failed"];
        }

    }
    public function updateData(Request $req)
    {
        $update_data=Employee::find($req->id);
        $update_data->name=$req->name;
        $update_data->email=$req->email;
        $result=$update_data->save();
        if($result)
        {
            return ["status"=>"Update Successfully"];
        }
        else{
            return ["status"=>"Something is wrong"];
        }
       
    }
    public function deleteData($id)
    {
        $updata=Employee::find($id);
        $result=$updata->delete();
        if($result)
        {
            return ["status"=>"delete successfully"];
        }
        else{
            return ["status"=>"Something is worng"];
        }
        
    }
    public function searchData($name)
    {
        $data= Employee::where('name', 'like', "%".$name."%")->get();
        $count=sizeof($data);
        if($count>0)
        {
            return $data;
        }
        else{
            return ["Status"=>"No record found"];
        }
    }
    public function validationData(Request $req)
    {
        $rules=array(
            "name"=>"required | max:4",
            "email"=>"required"
        );
        $validation=Validator::make($req->all(), $rules);
        if($validation->fails())
        {
            return $validation->errors();
        }
        else{
        $add_data=new Employee;
        $add_data->name=$req->name;
        $add_data->email=$req->email;
        $result=$add_data->save();
        if($result)
        {
            return ["Status"=>"Insert Successfully"];
        }
        else
        {
            return ["Status"=>"Something is wrong"];
        }
        }
    }
}
