<?php
namespace App\CustomClasses;


class ReturnMessage
{

    public static function alreadyApprove(){
        return redirect()->back()->with('error','Already approved it.');
    }
    public static function prApprovalMessage(){
        return redirect()->back()->with('error','You can not approved now.');
    }

    public static function approveSuccess(){
        return redirect()->back()->with('success','PR successfully approved.');
    }

    public static function addSuccess(){
        return redirect()->back()->with('info','item add successfully!');
    }
    public static function cartDelete(){
        return redirect()->back()->with('info','item deleted successfully!');
    }
    public static function cartUpdate(){
        return redirect()->back()->with('info','quentity update successfully!');
    }

    public static function cartDestory(){
        return redirect()->back()->with('info','cart empty successfully!');
    }

    public static function insertSuccess(){
        return redirect()->back()->with('success','Data saved successfully!');
    }
    public static function prInsertSuccess(){
        return redirect()->back()->with('success','Purchase request  successfully!');
    }
    public static function updateSuccess(){
        return redirect()->back()->with('success','Data updated successfully!');
    }
    public static function deleteSuccess(){
        return redirect()->back()->with('success','Data deleted successfully!');
    }
    public static function duplicate(){
        return redirect()->back()->with('error','Duplicate records found!');
    }
    public static function tokenExpire(){
        return redirect()->back()->with('error','Duplicate token found!');
    }
    public static function somethingWrong(){
        return redirect()->back()->with('error','Something wrong!');
    }
    public static function customMessage($data){
        return redirect()->back()->with('error',$data);
    }
    public static function customMessageSuccess($data){
        return redirect()->back()->with('success',$data);
    }
    public static function jsonInsertSuccess(){
        return response()->json(['status'=>'success','message'=>'Data saved successfully !']);
    }
    public static function jsonUpdateSuccess(){
        return response()->json(['status'=>'success','message'=>'Data updated successfully !']);
    }
    public static function jsonDeleteSuccess(){
        return response()->json(['status'=>'success','message'=>'Data deleted successfully !']);
    }
    public static function jsonDuplicate(){
        return response()->json(['status'=>'error','message'=>'Duplicate records found !']);
    }
    public static function jsonDeleteException(){
        return response()->json(['status'=>'error','message'=>'Already used. can\'t delete it.']);
    }

    public static function jsonsomethingWrong(){
        return response()->json(['status'=>'error','message'=>'Something wrong!']);
    }

    public static function statusCheck($id = '', $status)
    {
        if ($status == 0) {
            $html = '<a href="javascript()" class="btn btn-outline-warning btn-sm">Pending</a>';
        }
        else if  ($status == 1) {
            $html = '<a href="#" class="btn btn-outline-success btn-sm">Active</a>';
        }
        else {
            $html = '<a href="#" class="btn btn-outline-danger btn-sm">Cancel</a>';
        }
        return $html;
    }
}
