<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;
use Config;
use Session;

class Calls extends Model {

    protected $table = 'calls';

    public function addCalls($postData) {
        //print_r($postData);exit;
        $objCalls = new Calls();
        $objCalls->event = (isset($postData['event'])) ? $postData['event'] : '';
        $objCalls->uuid = (isset($postData['uuid'])) ? $postData['uuid'] : '';
        $objCalls->kid = (isset($postData['kid'])) ? $postData['kid'] : '';
        $objCalls->cdr_id = (isset($postData['cdr_id'])) ? $postData['cdr_id'] : '';
        $objCalls->routing_id = (isset($postData['routing_id'])) ? $postData['routing_id'] : '';
        $objCalls->service = (isset($postData['service'])) ? $postData['service'] : '';
        $objCalls->ddi = (isset($postData['ddi'])) ? $postData['ddi'] : '';
        $objCalls->system_genrate_no  = (isset($postData['service'])) ? $postData['service'].'-'.$postData['ddi'] : '';
        $objCalls->caller = (isset($postData['caller'])) ? $postData['caller'] : '';
        $objCalls->destination_number = (isset($postData['destination_number'])) ? $postData['destination_number'] : '';
        $objCalls->duration_in = (isset($postData['duration_in'])) ? $postData['duration_in'] : '';
        $objCalls->duration_out = (isset($postData['duration_out'])) ? $postData['duration_out'] : '';
        $objCalls->successfully = (isset($postData['successfully'])) ? $postData['successfully'] : '';
        $objCalls->date_time = (isset($postData['date_time'])) ? date('Y-m-d H:i:s', strtotime($postData['date_time'])) : '';
        $objCalls->timestamp = (isset($postData['timestamp'])) ? date('Y-m-d H:i:s', strtotime($postData['timestamp'])) : '';
        $objCalls->created_at = date('Y-m-d H:i:s');
        $objCalls->updated_at = date('Y-m-d H:i:s');
        $objCalls->save();
        return $objCalls->id;
    }

    public function getCallListing() {
        $sql = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.system_genrate_no')
                ->groupBy('calls.id');
        $result = $sql->get(['calls.*',
            'u1.name as agentName',
            'u2.name as customerName',
            'u1.inopla_username'
        ]);
        return $result;
    }

    public function getCallListingV2($customerNo) {
        // $sql = Calls::leftjoin('users', 'users.inopla_username', '=', 'calls.destination_number');
        $sql = Calls::leftjoin('users', 'users.system_genrate_no', '=', 'calls.system_genrate_no');
        $sql->where('users.id', $customerNo);
        $sql->where('users.type', 'CUSTOMER');
        $result = $sql->get(['calls.*',
            'users.name as agentName',
            'users.inopla_username'
        ]);
        return $result;
    }

    public function updateCalles($request) {

        $objInfoEdit = Calls::find($request->input('editId'));
        $objInfoEdit->gender = $request->input('gender');
        $objInfoEdit->first_and_last_name = $request->input('first_last_name');
        $objInfoEdit->caller_email = $request->input('caller_email');
        $objInfoEdit->telephone_number = $request->input('telephone_number');
        $objInfoEdit->caller_note = $request->input('caller_note');
        $objInfoEdit->sent_mail = 1;

       
        $mailData['subject'] = 'Calls - Sent Email';
        $mailData['attachment'] = array();
//        $mailData['mailto'] = 'shaileshvanaliya91@gmail.com';
        $mailData['mailto'] = $request->input('caller_email');
        $sendMail = new Sendmail;
        $mailData['data']['caller_note'] = $request->input('caller_note');
        $mailData['data']['first_last_name'] = $request->input('first_last_name');
        $mailData['data']['caller_email'] = $request->input('caller_email');
        $mailData['data']['telephone_number'] = $request->input('telephone_number');
        $mailData['data']['gender'] = $request->input('gender');
        $mailData['template'] = 'emails.sent-email';
        $sendMail->sendSMTPMail($mailData);

        if ($objInfoEdit->save()) {
            return TRUE;
        }
    }
    public function updateCallesInbigPopup($request) {
//        print_r($request->input());
//        die();
        $objInfoEdit = Calls::find($request->input('editId'));
        $objInfoEdit->gender = $request->input('gender');
        $objInfoEdit->first_and_last_name = $request->input('first_last_name');
        $objInfoEdit->caller_email = $request->input('caller_email');
        $objInfoEdit->telephone_number = $request->input('telephone_number');
        $objInfoEdit->caller_note = $request->input('caller_note');
        $objInfoEdit->sent_mail = 1;

       
        $mailData['subject'] = 'Calls - Sent Email';
        $mailData['attachment'] = array();
//        $mailData['mailto'] = 'shaileshvanaliya91@gmail.com';
        $mailData['mailto'] = $request->input('employe');
        $sendMail = new Sendmail;
        $mailData['data']['caller_note'] = $request->input('caller_note');
        $mailData['data']['first_last_name'] = $request->input('first_last_name');
        $mailData['data']['caller_email'] = $request->input('caller_email');
        $mailData['data']['telephone_number'] = $request->input('telephone_number');
        $mailData['data']['gender'] = $request->input('gender');
        $mailData['template'] = 'emails.sent-email';
        $sendMail->sendSMTPMail($mailData);

        if ($objInfoEdit->save()) {
            return TRUE;
        }
    }

    public function getDatatable($request) {
        
        $requestData = $_REQUEST;

        $columns = array(
            // datatable column index  => database column name
            0 => 'calls.id',
            1 => 'calls.date_time',
            2 => 'calls.caller',
            3 => 'u1.name',
            4 => 'calls.caller_note',
//            5 => 'calls.sent_mail',
            5 => 'u2.name',
        );

        $query = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.system_genrate_no')
                ->groupBy('calls.id');

        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                        $flag = 0;
                        foreach ($columns as $key => $value) {
                            $searchVal = $requestData['search']['value'];
                            if ($key == 3 && ($searchVal == 'Not Sent' || $searchVal == 'not sent')) {
                                $searchVal = 0;
                            } else if ($key == 3 && ($searchVal == 'sent' || $searchVal == 'Sent')) {
                                $searchVal = 1;
                            }
                            if ($key == 1) {
                                $searchVal = date('Y-m-d', strtotime($searchVal));
                            }
                            if ($requestData['columns'][$key]['searchable'] == 'true') {
                                if ($flag == 0) {
                                    $flag = $flag + 1;
                                    $query->where($value, 'like', '%' . $searchVal . '%');
                                } else {
//                                    $query->orWhere($value, 'like',"%$searchVal%");
                                    $query->orWhere($value, 'like', '%' . $searchVal . '%');
                                }
                            }
                        }
                    });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());
        $resultArr = $query->skip($requestData['start'])
                        ->take($requestData['length'])
                        ->select(
                                'u1.name as agentName', 'u2.name as customerName','calls.caller', 'u1.inopla_username', 'calls.event', 'calls.uuid', 'calls.kid', 'calls.cdr_id', 'calls.date_time', 'calls.sent_mail', 'calls.id', 'calls.routing_id', 'calls.service', 'calls.ddi', 'calls.caller_note'
                        )->get();

        $data = array();

        foreach ($resultArr as $row) {
            $nestedData = array();
            //$msgStatus = ($row['sent_mail'] == 1 ? 'Sent' : 'Not Sent');
            if($row['sent_mail']==1)
            {
                $actionHtml3='<span class="c-badge c-badge--success">Confirm</span>';
                        
            }else{
                $actionHtml3='<span class="c-badge c-badge--danger">Not Confirm</span>';
            }
            
            $actionHtml2='<a  title="Call Popup" class="bigpopup"  data-id="'.$row["id"].'" data-toggle="modal" data-target="#myModal2">
                            <i class="fa fa-eye customerpopupdetail" data-id="'.$row["id"].'"></i>
                          </a>';
            
//            if ($row['sent_mail'] == 1) {
//                $actionHtml = '<a class="sentEmailBtn" title="Send Mail Again" data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '"  href="javascript:;">
//                    <i class="fa fa-refresh"></i>
//                                 
//                              </a>';
//            } else {
//                $actionHtml = '<a class="sentEmailBtn" title="Send Mail"  data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '"  href="javascript:;">
//                                        <i class="fa fa-envelope-o"></i>
//                                    </a>';
//            }

//            $nestedData[] = '<input class="changeStatus" type="checkbox">';
            $nestedData[] = $row["id"];
            $nestedData[] = date('d-m-Y h:i:s', strtotime($row['date_time']));
            $nestedData[] = (empty($row['caller']) ? 'N/A' : $row['caller']) . "<a href='". route('address-book-add',array('phoneNumber'=>$row["caller"])) ."'><span class='c-tooltip c-tooltip--top'  aria-label='Add Addressbook'>
                                        <i class='fa fa-plus-circle' ></i></span></a>";
            $nestedData[] = (empty($row['agentName']) ? 'N/A' : $row['agentName']);
            $nestedData[] = (empty($row['customerName']) ? 'N/A' : $row['customerName']);
            $nestedData[] = $row['caller_note'];
            $nestedData[] = $actionHtml3;
//            $nestedData[] = $actionHtml;
            $nestedData[] = $actionHtml2;
             
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

     public function getDatatableV2($request,$cnumber) {
        $requestData = $_REQUEST;

        $columns = array(
            // datatable column index  => database column name
            0 => 'calls.id',
            1 => 'calls.date_time',
            2 => 'calls.caller',
            3 => 'u1.name',
            4 => 'calls.caller_note',
//            5 => 'calls.sent_mail',
            5 => 'u2.name',
        );

        $query = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.system_genrate_no')
                ->where('calls.system_genrate_no','=',$cnumber)
                ->groupBy('calls.id');

        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                        $flag = 0;
                        foreach ($columns as $key => $value) {
                            $searchVal = $requestData['search']['value'];
                            if ($key == 3 && ($searchVal == 'Not Sent' || $searchVal == 'not sent')) {
                                $searchVal = 0;
                            } else if ($key == 3 && ($searchVal == 'sent' || $searchVal == 'Sent')) {
                                $searchVal = 1;
                            }
                            if ($key == 1) {
                                $searchVal = date('Y-m-d', strtotime($searchVal));
                            }
                            if ($requestData['columns'][$key]['searchable'] == 'true') {
                                if ($flag == 0) {
                                    $flag = $flag + 1;
                                    $query->where($value, 'like', '%' . $searchVal . '%');
                                } else {
//                                    $query->orWhere($value, 'like',"%$searchVal%");
                                    $query->orWhere($value, 'like', '%' . $searchVal . '%');
                                }
                            }
                        }
                    });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());
        $resultArr = $query->skip($requestData['start'])
                        ->take($requestData['length'])
                        ->select(
                                'u1.name as agentName', 'u2.name as customerName','calls.caller', 'u1.inopla_username', 'calls.event', 'calls.uuid', 'calls.kid', 'calls.cdr_id', 'calls.date_time', 'calls.sent_mail', 'calls.id', 'calls.routing_id', 'calls.service', 'calls.ddi', 'calls.caller_note'
                        )->get();

        $data = array();

        foreach ($resultArr as $row) {
            $nestedData = array();
            //$msgStatus = ($row['sent_mail'] == 1 ? 'Sent' : 'Not Sent');
            if($row['sent_mail']==1)
            {
                $actionHtml3='<span class="c-badge c-badge--success">Confirm</span>';
                        
            }else{
                $actionHtml3='<span class="c-badge c-badge--danger">Not Confirm</span>';
            }
            
//            $actionHtml2='<a  title="Call Popup" class="bigpopup"  data-id="'.$row["id"].'" data-toggle="modal" data-target="#myModal2">
//                            <i class="fa fa-eye customerpopupdetail" data-id="'.$row["id"].'"></i>
//                          </a>';
            
//            if ($row['sent_mail'] == 1) {
//                $actionHtml = '<a class="sentEmailBtn" title="Send Mail Again" data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '"  href="javascript:;">
//                    <i class="fa fa-refresh"></i>
//                                 
//                              </a>';
//            } else {
//                $actionHtml = '<a class="sentEmailBtn" title="Send Mail"  data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '"  href="javascript:;">
//                                        <i class="fa fa-envelope-o"></i>
//                                    </a>';
//            }

//            $nestedData[] = '<input class="changeStatus" type="checkbox">';
            $nestedData[] = $row["id"];
            $nestedData[] = date('d-m-Y h:i:s', strtotime($row['date_time']));
            $nestedData[] = (empty($row['caller']) ? 'N/A' : $row['caller']) . "<a href='". route('address-book-add-customer',array('phoneNumber'=>$row["caller"])) ."'><span class='c-tooltip c-tooltip--top'  aria-label='Add Addressbook'>
                                        <i class='fa fa-plus-circle' ></i></span></a>";
            $nestedData[] = (empty($row['agentName']) ? 'N/A' : $row['agentName']);
            $nestedData[] = (empty($row['customerName']) ? 'N/A' : $row['customerName']);
            $nestedData[] = $row['caller_note'];
            $nestedData[] = $actionHtml3;
//            $nestedData[] = $actionHtml;
//            $nestedData[] = $actionHtml2;
             
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }
    public function getdatatableIncomingCall($request) {
        
        $logindata = Session::get('logindata');
        $requestData = $_REQUEST;
//        print_r($logindata);exit;
        $columns = array(
            // datatable column index  => database column name
            0 => 'calls.id',
            1 => 'calls.date_time',
            2 => 'calls.caller',
            3 => 'u1.name',
            4 => 'calls.caller_note',
            5 => 'calls.sent_mail',
            6 => 'u2.name',
        );
       
        $query = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.system_genrate_no')
                 ->where('u1.inopla_username','=',$logindata[0]['inopla_username'])
                ->groupBy('calls.id');
        

        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                        $flag = 0;
                        foreach ($columns as $key => $value) {
                            $searchVal = $requestData['search']['value'];
                            if ($key == 3 && ($searchVal == 'Not Sent' || $searchVal == 'not sent')) {
                                $searchVal = 0;
                            } else if ($key == 3 && ($searchVal == 'sent' || $searchVal == 'Sent')) {
                                $searchVal = 1;
                            }
                             if ($key == 1) {
                                $searchVal = date('Y-m-d', strtotime($searchVal));
                            }
                            if ($requestData['columns'][$key]['searchable'] == 'true') {
                                if ($flag == 0) {
                                    $flag = $flag + 1;
                                    $query->where($value, 'like', '%' . $searchVal . '%');
                                } else {
//                                    $query->orWhere($value, 'like',"%$searchVal%");
                                    $query->orWhere($value, 'like', '%' . $searchVal . '%');
                                }
                            }
                        }
                    });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());
        $resultArr = $query->skip($requestData['start'])
                        ->take($requestData['length'])
                        ->select(
                                'u1.name as agentName', 'u2.name as customerName','calls.caller', 'u1.inopla_username', 'calls.event', 'calls.uuid', 'calls.kid', 'calls.cdr_id', 'calls.date_time', 'calls.sent_mail', 'calls.id', 'calls.routing_id', 'calls.service', 'calls.ddi', 'calls.caller_note'
                        )->get();

        $data = array();

        foreach ($resultArr as $row) {
            $nestedData = array();
            if($row['sent_mail']==1)
            {
                $actionHtml3='<span class="c-badge c-badge--success">Confirm</span>';
                        
            }else{
                $actionHtml3='<span class="c-badge c-badge--danger">Not Confirm</span>';
            }
            
            $actionHtml2='<a  title="Call Popup"    data-toggle="modal" data-target="#myModal2">
                            <i class="fa fa-eye customerpopupdetail" data-id="'.$row["id"].'"></i>
                          </a>';
            
            if ($row['sent_mail'] == 1) {
                $actionHtml = '<a class="sentEmailBtn" title="Send Mail Again" data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '"  href="javascript:;">
                    <i class="fa fa-refresh"></i>
                                 
                              </a>';
            } else {
                $actionHtml = '<a class="sentEmailBtn" title="Send Mail"  data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '"  href="javascript:;">
                                        <i class="fa fa-envelope-o"></i>
                                    </a>';
            }
            // $msgStatus = ($row['sent_mail'] == 1 ? 'Sent' : 'Not Sent');
            // $actionHtml2='<button type="button" class="c-btn c-btn--info" data-toggle="modal" data-target="#myModal2">
            //           Call Popup
            //         </button>';
            // $actionHtml3='<button type="button" class="c-btn c-btn--success ">
            //           Confirm
            //         </button>';
            // if ($row['sent_mail'] == 1) {
            //     $actionHtml = '  <div class="col u-mb-medium">
            //                         <a  title="Send Mail Again" data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '" class="c-btn c-btn--secondary sentEmailBtn" href="javascript:;">
            //                             <i class="fa fa-refresh"></i>
            //                         </a>
            //                     </div>';
            // } else {
            //     $actionHtml = '<div class="col u-mb-medium">
            //                         <a title="Send Mail"  data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '" class="c-btn c-btn--info sentEmailBtn" href="javascript:;">
            //                             <i class="fa fa-envelope-o"></i>
            //                         </a>
            //                    </div>';
            // }

//            $nestedData[] = '<input class="changeStatus" type="checkbox">';
            $nestedData[] = "<span style='margin-left:10px;'>".$row["id"]."<span>";
            $nestedData[] = date('d-m-Y h:i:s', strtotime($row['date_time']));
            $nestedData[] = (empty($row['caller']) ? 'N/A' : $row['caller']) . "<a href='". route('address-book-add',array('phoneNumber'=>$row["caller"])) ."'><span class='c-tooltip c-tooltip--top'  aria-label='Add Addressbook'>
                                        <i class='fa fa-plus-circle' ></i></span></a>";
            $nestedData[] = (empty($row['agentName']) ? 'N/A' : $row['agentName']);
            $nestedData[] = (empty($row['customerName']) ? 'N/A' : $row['customerName']);
            $nestedData[] = $row['caller_note'];
            $nestedData[] = $actionHtml3;
            $nestedData[] = $actionHtml;
            $nestedData[] = $actionHtml2;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

    public function getSystemMailCalls($name) {
        $weekStart = date('Y-m-d', strtotime('last Monday'));
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'u1.id');
        $sql->where('u1.type','CUSTOMER');
        if ($name == 'today') {
            $sql->whereRaw('Date(calls.created_at) = CURDATE()');
        }
        if ($name == 'week') {
            $sql->whereBetween('calls.created_at', [$weekStart, date('Y-m-d')]);
        }
        if ($name == 'month') {
            $sql->whereBetween('calls.created_at', [date('Y-m-01'), date('Y-m-t')]);
        }
        if ($name == 'year') {
            $sql->whereBetween('calls.created_at', [date('Y-01-01'), date('Y-m-d')]);
        }

        $sql->groupBy('order_info.user_id');
//        $sql->groupBy('calls.destination_number');
        $sql->orderBy('TotalCount', 'DESC');
        $result = $sql->get(array('u1.inopla_username', 'calls.created_at', 'calls.id as callsID', 'u1.name', 'order_info.company_name', DB::raw('COUNT(calls.id)as TotalCount')))->toArray();
        $result['finalTotal'] = 0;
        foreach ($result as $row => $val) {
            $result['finalTotal'] += $val['TotalCount'];
        }
        return $result;
    }

    public function getSystemSentMail($name) {
        $weekStart = date('Y-m-d', strtotime('last Monday'));
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'u1.id');
        $sql->where('calls.sent_mail', '=', 1);
        $sql->where('u1.type','CUSTOMER');
        if ($name == 'today') {
            $sql->whereRaw('Date(calls.created_at) = CURDATE()');
        }
        if ($name == 'week') {
            $sql->whereBetween('calls.created_at', [$weekStart, date('Y-m-d')]);
        }
        if ($name == 'month') {
            $sql->whereBetween('calls.created_at', [date('Y-m-01'), date('Y-m-t')]);
        }
        if ($name == 'year') {
            $sql->whereBetween('calls.created_at', [date('Y-01-01'), date('Y-m-d')]);
        }

        $sql->groupBy('order_info.user_id');
//        $sql->groupBy('calls.destination_number');
        $sql->orderBy('TotalCount', 'DESC');
        $result = $sql->get(array('u1.inopla_username', 'calls.created_at', 'calls.id as callsID', 'u1.name', 'order_info.company_name', DB::raw('COUNT(calls.id)as TotalCount')))->toArray();
        $result['finalTotal'] = 0;
        foreach ($result as $row => $val) {
            $result['finalTotal'] += $val['TotalCount'];
        }
        return $result;
    }

    public function getSystemNotSentMail($name) {
        $weekStart = date('Y-m-d', strtotime('last Monday'));
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'u1.id');
        $sql->where('calls.sent_mail', '=', 0);
        if ($name == 'today') {
            $sql->whereRaw('Date(calls.created_at) = CURDATE()');
        }
        if ($name == 'week') {
            $sql->whereBetween('calls.created_at', [$weekStart, date('Y-m-d')]);
        }
        if ($name == 'month') {
            $sql->whereBetween('calls.created_at', [date('Y-m-01'), date('Y-m-t')]);
        }
        if ($name == 'year') {
            $sql->whereBetween('calls.created_at', [date('Y-01-01'), date('Y-m-d')]);
        }

        $sql->groupBy('calls.destination_number');
        $sql->orderBy('TotalCount', 'DESC');
        $result = $sql->get(array('u1.inopla_username', 'calls.created_at', 'calls.id as callsID', 'u1.name', 'order_info.company_name', DB::raw('COUNT(calls.id)as TotalCount')))->toArray();
        $result['finalTotal'] = 0;
        foreach ($result as $row => $val) {
            $result['finalTotal'] += $val['TotalCount'];
        }
        return $result;
    }

    public function getAgentStatics($name) {
        $weekStart = date('Y-m-d', strtotime('last Monday'));
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'u1.id');
        $sql->where('u1.type','AGENT');
        $sql->where('calls.sent_mail', '=', 1);
        if ($name == 'today') {
            $sql->whereRaw('Date(calls.created_at) = CURDATE()');
        }
        if ($name == 'week') {
            $sql->whereBetween('calls.created_at', [$weekStart, date('Y-m-d')]);
        }
        if ($name == 'month') {
            $sql->whereBetween('calls.created_at', [date('Y-m-01'), date('Y-m-t')]);
        }
        if ($name == 'year') {
            $sql->whereBetween('calls.created_at', [date('Y-01-01'), date('Y-m-d')]);
        }

        $sql->groupBy('u1.id');
        $sql->orderBy('TotalCount', 'DESC');
        $result = $sql->get(array('u1.inopla_username', 'calls.created_at', 'calls.id as callsID', 'u1.name', 'order_info.company_name', DB::raw('COUNT(calls.id)as TotalCount')))->toArray();
        $result['finalTotal'] = 0;
        foreach ($result as $row => $val) {
            $result['finalTotal'] += $val['TotalCount'];
        }
        return $result;
    }

    public function getSystemMailList() {
        $sql = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.system_genrate_no')
                ->groupBy('calls.id');
        $result = $sql->get(['calls.*',
            'u1.name as agentName',
            'u2.name as customerName',
            'calls.sent_mail',
            'u1.inopla_username'
        ]);
        return $result;
    }

    public function getSystemMailData111() {
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number');
        $sql->where('calls.created_at', '>', "DATE_SUB(now(), INTERVAL 1 DAY)");
        $sql->groupBy('calls.destination_number');
        $sql->orderBy('TotalCount', 'DESC');
        $result = $sql->get(array('u1.inopla_username', DB::raw('COUNT(calls.id)as TotalCount')));
        return $result;
    }
    
    public function customerpopupdetail($id){
         $objCalls = Calls::find($id['data']['id']);
        $objCalls->is_popup = '1';
        $objCalls->save();
        
        $query = Calls::leftjoin('users', 'users.system_genrate_no', '=', 'calls.system_genrate_no')
                ->leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'users.id')
                ->groupBy('calls.id')
                ->where('calls.id',$id['data']['id']);
        $resultArr = $query->select(
                'users.name',
                'users.email',
                'u1.email as agentEmail',
                'users.id as user_id',
                'users.customer_number',
                'users.system_genrate_no',
                'order_info.company_name',
                'order_info.company_info',
                'order_info.fullname as customerName',
                'calls.service',
                'calls.caller'
                )->get()->toArray();
        return $resultArr;

    }
    
    public function customerpopupdetailbussinesshours($id){
        
        $query = Calls::leftjoin('users', 'users.system_genrate_no', '=', 'calls.system_genrate_no')
                ->leftjoin('customer_details', 'customer_details.user_id', '=', 'users.id')                
                ->where('calls.id',$id['data']['id']);
        $result = $query->select(
                    'customer_details.day_name',
                    'customer_details.day_start_time',
                    'customer_details.day_end_time'
                )->get()->toArray();
       
        return $result;
    }   
    
    public function customer_info($id){
         $query = Calls::leftjoin('users', 'users.system_genrate_no', '=', 'calls.system_genrate_no')
                ->leftjoin('customer_info', 'customer_info.user_id', '=', 'users.id')                
                ->where('calls.id',$id['data']['id']);
         $result = $query->select(
                    'calls.created_at',
                    'customer_info.lunch_start_time',
                    'customer_info.lunch_end_time',
                    'customer_info.holiday_global_from',
                    'customer_info.holiday_global_to'
                )->get()->toArray();
         
          return $result;
     }
     
     
    public function orderinfo($id){
         $query = Calls::leftjoin('users', 'users.system_genrate_no', '=', 'calls.system_genrate_no')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'users.id')                
                ->where('calls.id',$id['data']['id']);
         $result = $query->select(
                    'order_info.welcome_note',
                    'order_info.reroute_confirm',
                    'order_info.company_info'
                )->get()->toArray();
        $welcome=$result[0]['welcome_note'];
        $reroute=$result[0]['reroute_confirm'];
        
        $constant_note=Config::get('constants.welcome_note');
         $constant_reroute=Config::get('constants.reroute_confirm');
        $details['note']=$constant_note[$welcome];
        $details['reroute']=$constant_reroute[$reroute];
        $details['company_info']=$result[0]['company_info'];
          return $details;
     }
     
    public function sendmail($request){
       
        $result=Employee::select('email')
                ->where('customer_id','=',$request['employe'])
                ->get();
        $email=$result['0']['email'];
        $mailData['subject'] = 'Calls - Sent Email';
        //$mailData['attachment'] = array();
//        $mailData['mailto'] = 'shaileshvanaliya91@gmail.com';
        $mailData['mailto'] = $email;//$request->input('caller_email');
        $sendMail = new Sendmail;
        $sent=$sendMail->sendSMTPMail($mailData);
      
    }
    
    public function employeinfo($request){
         $result= Calls::leftjoin('users', 'users.system_genrate_no', '=', 'calls.system_genrate_no')
                        ->leftjoin('employee', 'employee.customer_id', '=', 'users.id')
                        ->where('calls.id','=',$request->input()['data']['id'])
                        ->get(['users.id','employee.first_name','employee.last_name'])
                  ->toarray();
         return $result;
     }
    public function checkNewCalls($inopla_username){
         $result= Calls::join('users', 'users.system_genrate_no', '=', 'calls.system_genrate_no')
                        ->where('calls.destination_number','=',$inopla_username)
                       
                        ->get(['calls.id'])->toarray();
         return $result;
     }
     
      public function getDashboardData() {
        $logindata = Session::get('logindata');
         
        $query = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.system_genrate_no')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'u2.id')
                ->where('u1.inopla_username','=',$logindata[0]['inopla_username'])
                ->groupBy('calls.id');
        $query->orderBy('id', 'desc');
        $resultArr = $query->select('u1.name as agentName', 'order_info.company_name','u2.name as customerName','calls.caller', 'u1.inopla_username', 'calls.event', 'calls.uuid', 'calls.kid', 'calls.cdr_id', 'calls.date_time', 'calls.sent_mail', 'calls.id', 'calls.routing_id', 'calls.service', 'calls.ddi', 'calls.caller_note')->limit(4)->get();
        return $resultArr;
    }

       public function getSystemDashboardCount($name) {
        // echo $name;exit;
        $logindata = Session::get('logindata');
        $weekStart = date('Y-m-d', strtotime('last Monday'));
        // echo  $weekStart;exit;
        $sql = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->where('u1.inopla_username','=',$logindata[0]['inopla_username']);
        
        if ($name == 'today') {
            $sql->whereRaw('Date(calls.created_at) = CURDATE()');
        }
        if ($name == 'week') {
            $sql->whereBetween( DB::raw('date(calls.created_at)'), [$weekStart, date('Y-m-d')] );
        }
        if ($name == 'month') {
            $sql->whereBetween('calls.created_at', [date('Y-m-01'), date('Y-m-t')]);
        }
        if ($name == 'year') {
            $sql->whereBetween('calls.created_at', [date('Y-01-01'), date('Y-m-d')]);
        }

        $sql->groupBy('calls.destination_number');
        $result = $sql->get(array('u1.inopla_username', 'calls.created_at', 'calls.id as callsID', DB::raw('COUNT(calls.id)as TotalCount')))->toArray();
        return $result;
    }

      public function getCustomerDashbard($name,$userId = null) {
        // echo $name .', '. $userId;exit;
        $logindata = Session::get('logindata');
        $weekStart = date('Y-m-d', strtotime('last Monday'));
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number');
        if ($name == 'today') {
            $sql->whereRaw('Date(calls.created_at) = CURDATE()');
        }
        if ($name == 'week') {
            $sql->whereBetween( DB::raw('date(calls.created_at)'), [$weekStart, date('Y-m-d')] );
        }
        if ($name == 'month') {
            $sql->whereBetween('calls.created_at', [date('Y-m-01'), date('Y-m-t')]);
        }
        if ($name == 'year') {
            $sql->whereBetween('calls.created_at', [date('Y-01-01'), date('Y-m-d')]);
        }

        $sql->groupBy('calls.destination_number');
        if(!empty($userId)){
            $sql->where('calls.id','=',$userId);
        }
        $result = $sql->get(array('u1.inopla_username', DB::raw('COUNT(calls.id)as TotalCount')))->toArray();
        return $result;
    }

}

?>