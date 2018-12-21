<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use App\Model\OrderInfo;
use App\Model\Category;
use App\Model\Service;
use App\Model\Users;
use PDF;
use Config;

class PanelSettings extends Model {

    protected $table = 'panel_setting';
    public function getPanellist($id = NULL) {
        if ($id) {
            $result = PanelSettings::select('panel_setting.*')->where('panel_setting.id', '=', $id)->get();
        } else {
            $result = PanelSettings::whereIn('type', ['AGENT'])->get();
        }
        return $result;
    }
    
    public function gtCustomerlist(){
        $result = PanelSettings::select('*')->get();
        return $result;
    }

    public function savePanelSetting($request) {
        $name = '';
        if($request->file()){
            $image = $request->file('website_logo');
            $name = 'Websilte_logo'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/panel_logo/');
            $image->move($destinationPath, $name);    
        }
        // print_r($request->input());exit;
        // print_r($request->file());exit;
        $objPanelSetting = new PanelSettings();
        $objPanelSetting->website_name = $request->input('website_name');
        $objPanelSetting->website_logo = $name;
        $objPanelSetting->sidebar_menu_color = $request->input('sidebar_menu_color');
        $objPanelSetting->color = $request->input('color');
        $objPanelSetting->hovercolor = $request->input('hovercolor');
        if ($objPanelSetting->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
   
    public function updatePanelSetting($request) {
        $name =  $request->input('website_name');
        if($request->file()){
            $image = $request->file('website_logo');
            $name = 'Websilte_logo'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/panel_logo/');
            $image->move($destinationPath, $name);    
        }
        // print_r($request->input());exit;
        // print_r($request->file());exit;
        $objPanelSetting = PanelSettings::find($request->input('panel_id'));
        $objPanelSetting->website_name = $request->input('website_name');
        if($request->file()){
        $objPanelSetting->website_logo = $name;
        }
        $objPanelSetting->sidebar_menu_color = $request->input('sidebar_menu_color');
        $objPanelSetting->color = $request->input('color');
        $objPanelSetting->hovercolor = $request->input('hovercolor');
        if ($objPanelSetting->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

     function deletePanel($request) {
        return PanelSettings::where('id', $request)->delete();
    }
     public function getlastPanellist() {
         $result = PanelSettings::select('panel_setting.*')->get()->last()->toarray();
         return $result;
     }
}
