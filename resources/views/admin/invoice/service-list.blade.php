@foreach($getServiceDetails as $getServiceDetail)
<tr class="c-table__row remove{{ $getServiceDetail['id'] }}">
    <td>
       <input type="text" class="qty c-input" value="{{ $getServiceDetail['title'] }}" name="bezeichnung[]"/>
    </td>
    <td><input type="text" class="qty c-input" value="{{ $getServiceDetail['qty'] }}" name="menge[]"/></td>
    <td><input type="text" class="price c-input" value="{{ $getServiceDetail['price'] }}" name="price[]"/></td>
    <td><input type="hidden" name="total[] "class="Rowtotal"><span class="total">{{ $getServiceDetail['qty'] * $getServiceDetail['price'] }}</span>
     <a href="javascript:;" class="deleteInvoice" data-id="{{ $getServiceDetail['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o"></i></span>
                                </a>
    </td>
</tr>
@endforeach