@foreach($getServiceDetails as $getServiceDetail)
@php
$qty = preg_replace("/[^0-9.]/", "", $getServiceDetail['qty']);
$price = preg_replace("/[^0-9.]/", "", $getServiceDetail['price']);
@endphp
<tr class="c-table__row remove{{ $getServiceDetail['id'] }}">
    <td>
       <input type="text" class="qty c-input" value="{{ $getServiceDetail['title'] }}" name="bezeichnung[]"/>
    </td>
    <td><input type="text" class="qty c-input" value="{{ $qty }}" name="menge[]"/></td>
    <td><input type="text" class="price c-input" value="{{ $price }}" name="price[]"/></td>
    <td><input type="hidden" name="total[] "class="Rowtotal"><span class="total">{{ $qty * $price }}</span>
     <a href="javascript:;" class="deleteInvoice" data-id="{{ $getServiceDetail['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                                        <i class="fa fa-trash-o"></i></span>
                                </a>
    </td>
</tr>
@endforeach