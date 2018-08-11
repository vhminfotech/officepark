<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class Addressbook extends Model {

    protected $table = 'addressbook';

    public function getAddBookLlist($id = NULL) {

        if ($id) {
            $result = addressbook::select('addressbook.*')->where('addressbook.id', '=', $id)->get();
        } else {
            $result = addressbook::get();
        }
        return $result;
    }


    public function addAddresBook($request) {

        $objadd = new Addressbook();
        $objadd->firstname = $request->input('firstname');
        $objadd->surname = $request->input('surname');
        $objadd->company = $request->input('company');
        $objadd->position = $request->input('position');
        $objadd->telephone_number = $request->input('telephone_number');
        $objadd->email = $request->input('email');
        $result = $objadd->save();

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function editaddbookInfo($request) {
        $userId = $request->input('address_book_id');
        $objEdit = Addressbook::find($userId);
        $objEdit->firstname = $request->input('firstname');
        $objEdit->surname = $request->input('surname');
        $objEdit->company = $request->input('company');
        $objEdit->position = $request->input('position');
        $objEdit->telephone_number = $request->input('telephone_number');
        $objEdit->email = $request->input('email');

        if ($objEdit->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function AddressBookDelete($request){
         return Addressbook::where('id', $request->input('id'))->delete();
    }
}
?>