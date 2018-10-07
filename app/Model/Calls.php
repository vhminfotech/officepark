<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;

class Calls extends Model {

    protected $table = 'calls';

    public function addCalls($postData) {

        $objCalls = new Calls();
        $objCalls->event = (isset($postData['event'])) ? $postData['event'] : '';
        $objCalls->uuid = (isset($postData['uuid'])) ? $postData['uuid'] : '';
        $objCalls->kid = (isset($postData['kid'])) ? $postData['kid'] : '';
        $objCalls->cdr_id = (isset($postData['cdr_id'])) ? $postData['cdr_id'] : '';
        $objCalls->routing_id = (isset($postData['routing_id'])) ? $postData['routing_id'] : '';
        $objCalls->service = (isset($postData['service'])) ? $postData['service'] : '';
        $objCalls->ddi = (isset($postData['ddi'])) ? $postData['ddi'] : '';
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
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.service')
                ->groupBy('calls.id');
        $result = $sql->get(['calls.*',
            'u1.name as agentName',
            'u2.name as customerName',
            'u1.inopla_username'
        ]);
        return $result;
    }

    public function getCallListingV2($customerNo) {
        $sql = Calls::leftjoin('users', 'users.inopla_username', '=', 'calls.destination_number');
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
        $mailData['template'] = 'emails.sent-email';
        $mailData['attachment'] = array();
//        $mailData['mailto'] = 'shaileshvanaliya91@gmail.com';
        $mailData['mailto'] = $request->input('caller_email');
        $sendMail = new Sendmail;
        $mailData['data']['caller_note'] = $request->input('caller_note');
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
            2 => 'u1.name',
            3 => 'u2.name',
            4 => 'calls.caller_note',
            5 => 'calls.sent_mail',
            6 => 'calls.sent_mail',
        );

        $query = Calls::leftjoin('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('users as u2', 'u2.system_genrate_no', '=', 'calls.service')
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
                                'u1.name as agentName', 'u2.name as customerName', 'u1.inopla_username', 'calls.event', 'calls.uuid', 'calls.kid', 'calls.cdr_id', 'calls.date_time', 'calls.sent_mail', 'calls.id', 'calls.routing_id', 'calls.service', 'calls.ddi', 'calls.caller_note'
                        )->get();

        $data = array();

        foreach ($resultArr as $row) {
            $nestedData = array();
            $msgStatus = ($row['sent_mail'] == 1 ? 'Sent' : 'Not Sent');

            if ($row['sent_mail'] == 1) {
                $actionHtml = '  <div class="col u-mb-medium">
                                    <a  data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '" class="c-btn c-btn--secondary sentEmailBtn" href="javascript:;">
                                        <i class="fa fa-envelope-o u-mr-xsmall"></i>Sent mail again</a>
                                </div>';
            } else {
                $actionHtml = '  <div class="col u-mb-medium">
                                    <a  data-toggle="modal" data-target="#modal8" data-name="' . $row['first_and_last_name'] . '" data-id="' . $row["id"] . '" class="c-btn c-btn--info sentEmailBtn" href="javascript:;">
                                        <i class="fa fa-envelope-o u-mr-xsmall"></i>Sent mail</a>
                                </div>';
            }

//            $nestedData[] = '<input class="changeStatus" type="checkbox">';
            $nestedData[] = $row["id"];
            $nestedData[] = date('d-m-Y h:i:s', strtotime($row['date_time']));
            $nestedData[] = (empty($row['agentName']) ? 'N/A' : $row['agentName']);
            $nestedData[] = (empty($row['customerName']) ? 'N/A' : $row['customerName']);
            $nestedData[] = $row['caller_note'];
            $nestedData[] = $msgStatus;
            $nestedData[] = $actionHtml;
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

    public function getSystemSentMail($name) {
        $weekStart = date('Y-m-d', strtotime('last Monday'));
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number')
                ->leftjoin('order_info', 'order_info.user_id', '=', 'u1.id');
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

        $sql->groupBy('calls.destination_number');
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

    public function getSystemMailData111() {
        $sql = Calls::join('users as u1', 'u1.inopla_username', '=', 'calls.destination_number');
        $sql->where('calls.created_at', '>', "DATE_SUB(now(), INTERVAL 1 DAY)");
        $sql->groupBy('calls.destination_number');
        $sql->orderBy('TotalCount', 'DESC');
        $result = $sql->get(array('u1.inopla_username', DB::raw('COUNT(calls.id)as TotalCount')));
        return $result;
    }

}

?>