<?php

namespace App\CustomClasses;

use App\Models\FrontSubMenu;
use App\Models\FrontSubMenuDetails;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\SubMenuDetails;
use App\Models\FrontMenu;
use App\Models\FrontMenuDetails;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductSpecification;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\Crypt;
use Image;
use DB;
use  Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\ChallanReturn;
use Modules\Admin\Entities\Notification;
use DateTime;
use Modules\Supplier\Entities\Bill;

class Helper
{

    public static function equals($knownString, $userInput)
    {
        return hash_equals($knownString, $userInput);
    }

    public static function imageUpload($file, $customName, $path)
    {
        $imageName = $customName . "." . $file->getClientOriginalExtension();
        if ($file->isValid()) {
            $file->move($path, $imageName);
            return $imageName;
        }
        return false;
    }


    //only time
    public static function onlyTime($date)
    {
        return date("H:i A", strtotime($date));
    }

    public static function dateTime()
    {
        return date('Y-m-d H:i:s');
    }
    public static function onlyDMY($date)
    {
        return date("d-m-Y", strtotime($date));
    }
    public static function invoice($invoice){
        return sprintf('%06d',$invoice);
    }
    public static function numtowords($num)
    {
        $decones = array(
            '01' => "One",
            '02' => "Two",
            '03' => "Three",
            '04' => "Four",
            '05' => "Five",
            '06' => "Six",
            '07' => "Seven",
            '08' => "Eight",
            '09' => "Nine",
            10 => "Ten",
            11 => "Eleven",
            12 => "Twelve",
            13 => "Thirteen",
            14 => "Fourteen",
            15 => "Fifteen",
            16 => "Sixteen",
            17 => "Seventeen",
            18 => "Eighteen",
            19 => "Nineteen"
        );
        $ones = array(
            0 => " ",
            1 => "One",
            2 => "Two",
            3 => "Three",
            4 => "Four",
            5 => "Five",
            6 => "Six",
            7 => "Seven",
            8 => "Eight",
            9 => "Nine",
            10 => "Ten",
            11 => "Eleven",
            12 => "Twelve",
            13 => "Thirteen",
            14 => "Fourteen",
            15 => "Fifteen",
            16 => "Sixteen",
            17 => "Seventeen",
            18 => "Eighteen",
            19 => "Nineteen"
        );
        $tens = array(
            0 => "",
            2 => "Twenty",
            3 => "Thirty",
            4 => "Forty",
            5 => "Fifty",
            6 => "Sixty",
            7 => "Seventy",
            8 => "Eighty",
            9 => "Ninety"
        );
        $hundreds = array(
            "Hundred",
            "Thousand",
            "Million",
            "Billion",
            "Trillion",
            "Quadrillion"
        ); //limit t quadrillion
        $num = number_format($num, 2, ".", ",");
        $num_arr = explode(".", $num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",", $wholenum));
        krsort($whole_arr);
        $rettxt = "";
        foreach ($whole_arr as $key => $i) {
            if ($i < 20) {
                $rettxt .= $ones[$i];
            } elseif ($i < 100) {
                $rettxt .= $tens[substr($i, 0, 1)];
                $rettxt .= " " . $ones[substr($i, 1, 1)];
            } else {
                $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
                $rettxt .= " " . $tens[substr($i, 1, 1)];
                $rettxt .= " " . $ones[substr($i, 2, 1)];
            }
            if ($key > 0) {
                $rettxt .= " " . $hundreds[$key] . " ";
            }

        }
        $rettxt = $rettxt . " dollars";

        if ($decnum > 0) {
            $rettxt .= " and ";
            if ($decnum < 20) {
                $rettxt .= $decones[$decnum];
            } elseif ($decnum < 100) {
                $rettxt .= $tens[substr($decnum, 0, 1)];
                $rettxt .= " " . $ones[substr($decnum, 1, 1)];
            }
            $rettxt = $rettxt . " cent";
        }
        return $rettxt;
    }


    public static function convertNumberToWord($num = false)
    {
        $num = str_replace(array(',', ' '), '', trim($num));
        if (!$num) {
            return false;
        }
        $num = (int)$num;
        $words = array();
        $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
            'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );
        $num_length = strlen($num);
        $levels = (int)(($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int)($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ($hundreds == 1 ? '' : 's') . ' ' : '');
            $tens = (int)($num_levels[$i] % 100);
            $singles = '';
            if ($tens < 20) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
            } else {
                $tens = (int)($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int)($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . (($levels && ( int )($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : 'TAKA');
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        return implode(' ', $words);
    }

    public static function destory($route, $id)
    {
        $html = "";
        $html .= "<form action='" . route($route, $id) . "' style='display:inline;' method='post'>
                             <input name='_token' type='hidden' value='" . csrf_token() . "'>
                             <input name='_method' type='hidden' value='delete'>
                            <button type='submit' class='btn btn-danger btn-xs' rel='tooltip' title=''>&nbsp;<i class='fa fa-trash' aria-hidden='true'></i>&nbsp;
                            </button>
                            </form>&nbsp;";
        return $html;
    }

    public static function edit($route, $id)
    {
        $html = "<a href='#' data-toggle='modal'  data-target='#modal' onclick=loadModalEdit('" . $route . "','" . $id . "','edit') class='btn btn-primary btn-xs' rel='tooltip' title=''><i class='fa fa-paste'></i></a> &nbsp;";
        return $html;
    }

    public static function prStatus($data)
    {
        if ($data->status == 0) {
            $html = '<label class="badge badge-warning">Pending</label>';
        }
        else if  ($data->status == 1) {
            if ($data->getPoCartItems->count()>0){
                $html = '<label class="badge badge-info">PO Created</label>';
            }else{
                $html = '<label class="badge badge-success">Approved</label>';
            }
        }
        else if  ($data->status == 2) {
            $html = '<a class="badge badge-danger" title="" title="Click for view" href="'.route("pr.rejectedList",Crypt::encryptString($data->id)).'">PR Rejected</a>';
        }
        else if  ($data->status == 4) {
            $html = '<span class="badge badge-warning">PR Pending</span>';
        }
        else if  ($data->status == 5) {
            $html = '<span class="badge badge-success">PR Approved</span>';
        }else if  ($data->status == 6) {
            $html = '<span class="badge badge-danger">PR Canceled</span>';
        }else{
            $html = '<span class="badge badge-warning">PR Pending</span>';
        }
        return $html;
    }

    public static function status($id = '', $status)
    {
        if ($status == 0) {
            $html = '<label class="badge badge-warning">Pending</label>';
        }
        else if  ($status == 1) {
            $html = '<label class="badge badge-success">Approved</label>';
        }
        else if  ($status == 4) {
             $html = '<span class="badge badge-warning">PR Pending</span>';
        }
        else if  ($status == 5) {
            $html = '<span class="badge badge-success">PR Approved</span>';
        }
        else if  ($status == 10) {
            $html = '<span class="badge badge-success">Rfq Floated</span>';
        }
        else if  ($status == 11) {
            $html = '<span class="badge badge-dark" title="Initial Price Submitted">Initial Price Quoted</span>';
        }
        else if  ($status == 12) {
            $html = '<span class="badge badge-dark" title="Technical Evaluation Completed">Technical Evaluation Completed</span>';
        }
        else if  ($status == 13) {
            $html = '<span class="badge badge-dark" title="Final Price Done">Final Price Quoted</span>';
        }
        else if  ($status == 14) {
            $html = '<span class="badge badge-success" title="">Procurement Approval Approved</span>';
        }
        else if  ($status == 15) {
            $html = '<a class="badge badge-danger" title="" title="Click for view" href="'.route("pmToApprovalReject.reject",$id).'">Procurement Approval Rejected</a>';
        }
        else if  ($status == 16) {
            $html = '<span class="badge badge-success" title="">Procurement Approval Approved</span>';
        }
        else if  ($status == 17) {
            $html = '<span class="badge badge-success" title="">Pending Approval</span>';
        }
        else if  ($status == 18) {
                $html = '<a class="badge badge-danger" title="" href="'.route("rfq.rejectedList",$id).'">RFQ Approval Rejected</a>';
            }
        else if  ($status ==2) {
            $html = '<a class="btn btn-outline-danger btn-sm" title="Click for view" href="'.route("pr.rejectedList",Crypt::encrypt($id)).'">PR Rejected</a>';
        }
        else {
            $html = '<span class="badge badge-danger">Cancel</span>';
        }
        return $html;
    }

    public static function appstatus($status)
    {
        if ($status == 0) {
            $html = 'Pending';
        }
        else if  ($status == 1) {
            $html = 'Approved';
        }
        else if  ($status == 4) {
            $html = 'Pending';
        }
        else if  ($status == 5) {
            $html = 'Approved';
        }
        else if  ($status == 10) {
            $html = 'Rfq Floated';
        }

        return $html;
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

    public static function  itemCode($prefix, $id_length)
    {

        $result = DB::select('select MAX(code) as `id` from `material_setups` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }

    public static function  supplierId($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `supplier_registration`');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }


    public static function  rfqIdGenarate($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `rfq` where company_id="'.Auth::user()->getStaff->company_id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }

    public static function  prGenarate($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `purchase_requisitions` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }

    public static function  poRequestAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `po_requested` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  challanAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_challan_id) as `id` from `challans` where vendor_id="'.Auth::user()->vendorName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
         $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }

    public static function  grnAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `grn` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  barcodeAutoID($item, $prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `grn_meta_item` where company_id="'.Auth::user()->companyName[0]->id.'" AND  item_id="'.$item.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  SiteTransferAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `site_transfer` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  AdvanceAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `advance`');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  BillReAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `bill_requisition`');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }

    public static function  MrAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `metarial_requistion` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  DpAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `product_disburse` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  AIAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `acceptance` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  billAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(custom_id) as `id` from `bills` where vendor_id="'.Auth::user()->vendorName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }
    public static function  billPayableAutoID($prefix, $id_length)
    {

        $result = DB::select('select MAX(payable_approval_custom_id) as `id` from `bill_payable_main_list` where company_id="'.Auth::user()->companyName[0]->id.'"');
        $max_id = $result[0]->id;
        //print $max_id."<br/>";
        $prefix_length = strlen($prefix);
        //print $prefix_length."<br/>";
        $only_id = substr($max_id, $prefix_length);
        //print $only_id;
        $new = (int)($only_id);
        //print $new;
        $new++;
        //print $new;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        //print $zero;
        $made_id = $prefix . $zero . $new;
        //print $made_id;
        return $made_id;

    }

    public static function billNumber()
    {
        $latest = Bill::query()
            ->where('company_id',Auth::user()->companyName[0]->id)
            ->latest()
            ->first();
        if (! $latest) {
            return 'Bil-0001';
        }
        $string = preg_replace("/[^0-9\.]/", '', $latest->auto_id);
        return 'Bil-' . sprintf('%04d', $string+1);
    }

    public static function challanReturnNumber()
    {
        $latest = ChallanReturn::query()
            ->where('company_id',Auth::user()->companyName[0]->id)
            ->latest()
            ->first();
        if (! $latest) {
            return 'CH-'.Auth::user()->companyName[0]->id.'0001';
        }
        $string = preg_replace("/[^0-9\.]/", '', $latest->auto_id);
        return 'CH-'.Auth::user()->companyName[0]->id.'' . sprintf('%04d', $string+1);
    }

    public static function companyInfo()
    {
        $data=CompanyInfo::all();
        return $data;
    }

    public  static function monthList(){
        return [
          [
              'id'=>'01',
              'sort_name'=>'JAN',
              'full_name'=>'January',
          ],
            [
                'id'=>'02',
                'sort_name'=>'FEB',
                'full_name'=>'February',
            ],
            [
                'id'=>'03',
                'sort_name'=>'MAR',
                'full_name'=>'March',
            ],
            [
                'id'=>'04',
                'sort_name'=>'APR',
                'full_name'=>'April',
            ],
            [
                'id'=>'05',
                'sort_name'=>'MAY',
                'full_name'=>'May',
            ],
            [
                'id'=>'06',
                'sort_name'=>'JUN',
                'full_name'=>'Jun',
            ],
            [
                'id'=>'07',
                'sort_name'=>'JULY',
                'full_name'=>'July',
            ],
            [
                'id'=>'08',
                'sort_name'=>'AUG',
                'full_name'=>'August',
            ],
            [
                'id'=>'09',
                'sort_name'=>'SEP',
                'full_name'=>'September',
            ],
            [
                'id'=>'10',
                'sort_name'=>'OCT',
                'full_name'=>'October',
            ],
            [
                'id'=>'11',
                'sort_name'=>'NOV',
                'full_name'=>'November',
            ],
            [
                'id'=>'12',
                'sort_name'=>'DEC',
                'full_name'=>'December',
            ],
        ];
    }

    public static function notification(){
        return $notify=Notification::where('user_id',Auth::user()->id)->where('sync_status',0)->get();
    }

    public static function notificationVendor(){
        return $notify=Notification::where('company_id',Auth::user()->VendorName[0]->id)
            ->where('sync_status',0)
            ->where('type',2)
            ->get();
    }

    public static function notificationSeen(){
        return $notify=Notification::where('user_id',Auth::user()->id)
            ->orderBy('id','DESC')
            ->limit(7)
            ->get();
    }

    public static function notificationVendorSeen(){
        return $notify=Notification::where('company_id',Auth::user()->VendorName[0]->id)
            ->where('type',2)
            ->orderBy('id','DESC')
            ->limit(7)
            ->get();
    }

    public static function  time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function number_format_short( $n ) {
        if ($n > 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }

        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }
}
