<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\ServiceDetail;

class Service extends Model {

    protected $table = 'service';

    public function getCategory($id = NULL) {

        if ($id) {
            $result = Service::select('category.*')->where('category.id', '=', $id)->get();
        } else {
            $result = Service::get();
        }
        return $result;
    }
    
        public function getServiceData(){
           return Service::select(
                'service.id',
                'service.packages_name',
                'service.category_id',
                'service.website_id',
                'category.categoryname'
                )
                ->leftjoin('category','category.id','=','service.category_id')
                ->get();
        }
        
        public function getServices($seviceId){
            
           $service =  Service::select(
                'service.id',
                'service.packages_name',
                'service.category_id',
                'service.website_id'
                //'GROUP_CONCAT(service_detail.title) as totalTitle',
                //'GROUP_CONCAT(service_detail.qty) as totalQty',
                //'GROUP_CONCAT(service_detail.price) as totalPrice',
                //'GROUP_CONCAT(service_detail.is_invoice) as totalIsInvoice',
                //'GROUP_CONCAT(service_detail.total) as totaled'
                )
                //->leftjoin('service_detail','service_detail.service_id','=','service.id')
                ->where('service.id',$seviceId)
                ->get();
                //->groupBy('service.id')
           
           $serviceDetail = ServiceDetail::select(
                        'service_detail.title',
                        'service_detail.qty',
                        'service_detail.price',
                        'service_detail.is_invoice',
                        'service_detail.total'
                   )
                ->where('service_detail.service_id',$seviceId)
                ->get();
           
                $data_array = array(
                    'service' => $service,
                    'service_detail' => $serviceDetail,
                );
                
                return $data_array;
        }

        public function saveService($data, $websiteId) {
        
        $objadd = new Service();
        $objadd->packages_name = $data['packagename'];
        $objadd->category_id = $data['category'];
        $objadd->website_id = $websiteId;
        $objadd->created_at = date('Y-m-d H:i:s');
        $objadd->updated_at = date('Y-m-d H:i:s');
        $resultSave = $objadd->save();

        if ($resultSave) {

            $total = 0;
            $serviceId = $objadd->id;
            $title = $data['title'];
            $qty = $data['qty'];
            $price = $data['price'];
            $is_invoice = $data['in_invoice'];


            for ($i = 0; $i < count($title); $i++) {
                $objServiceDetail = new ServiceDetail();
                $total = ($qty[$i]) * ($price[$i]);
                if ($title[$i] != '') {
                    $objServiceDetail->service_id = $serviceId;
                    $objServiceDetail->title = $title[$i];
                    $objServiceDetail->qty = $qty[$i];
                    $objServiceDetail->price = $price[$i];
                    $objServiceDetail->is_invoice = (isset($is_invoice[$i])) ? 'Yes' : 'No';
                    $objServiceDetail->total = $total;
                    $objServiceDetail->created_at = date('Y-m-d H:i:s');
                    $objServiceDetail->updated_at = date('Y-m-d H:i:s');
                    $result = $objServiceDetail->save();
                }
            }

            if ($result) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    
    public function saveEditService($data , $serviceId){
        
        $objInfoEdit = Service::find($serviceId);
        $objInfoEdit->packages_name = $data['packagename'];
        $objInfoEdit->category_id = $data['category'];
        $objInfoEdit->website_id = $data['websites'];
        $serviceEdit = $objInfoEdit->save();
        
        /*Delete Service Detail*/
        
        ServiceDetail::where('service_id', $serviceId)->delete();
        
        /*Add Detail*/
        
        $title = $data['title'];
        $qty = $data['qty'];
        $price = $data['price'];
        $is_invoice = $data['in_invoice'];


        for ($i = 0; $i < count($title); $i++) {
            $objServiceDetail = new ServiceDetail();
            $total = ($qty[$i]) * ($price[$i]);
            if ($title[$i] != '') {
                $objServiceDetail->service_id = $serviceId;
                $objServiceDetail->title = $title[$i];
                $objServiceDetail->qty = $qty[$i];
                $objServiceDetail->price = $price[$i];
                $objServiceDetail->is_invoice = (isset($is_invoice[$i])) ? 'Yes' : 'No';
                $objServiceDetail->total = $total;
                $objServiceDetail->created_at = date('Y-m-d H:i:s');
                $objServiceDetail->updated_at = date('Y-m-d H:i:s');
                $result = $objServiceDetail->save();
            }
        }
        
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    
    public function ServiceDelete($request){
        
       $deleteServiceDetail = ServiceDetail::where('service_id', $request->input('id'))->delete();
       
       return Service::where('id', $request->input('id'))->delete();
       
    }

}

?>