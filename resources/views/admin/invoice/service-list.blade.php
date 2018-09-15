@foreach($getServiceDetails as $getServiceDetail)
<tr class="c-table__row">
    <td>
       <input type="text" class="qty c-input" value="{{ $getServiceDetail['title'] }}" name="bezeichnung[]"/>
    </td>
    <td><input type="text" class="qty c-input" value="{{ $getServiceDetail['qty'] }}" name="menge[]"/></td>
    <td><input type="text" class="price c-input" value="{{ $getServiceDetail['price'] }}" name="price[]"/></td>
    <td><input type="hidden" name="total[] "class="Rowtotal"><span class="total"></span></td>
</tr>
@endforeach