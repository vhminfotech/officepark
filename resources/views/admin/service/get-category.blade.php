<table class="c-table">
    <thead class="c-table__head c-table__head--slim">
        <tr class="c-table__row">
            <th class="c-table__cell c-table__cell--head">{{ trans('op_services.name')}}</th>
            <th class="c-table__cell c-table__cell--head">{{ trans('op_services.action')}}</th>
        </tr>
    </thead>
    <tbody class="dataAppend" style="height: 50%;overflow: overlay;">    
        @for($i=0; $i< count($arrCategory); $i++)
        <tr class="c-table__row">
            <td class="c-table__cell">{{ $arrCategory[$i]['categoryname'] }}</td>
            <td class="c-table__cell"><a href="javascript:;" class="deleteCategory" data-id="{{ $arrCategory[$i]['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete Category"><i class="fa fa-trash-o"></i></span></a></td>
        </tr>
        @endfor
    </tbody>
</table>