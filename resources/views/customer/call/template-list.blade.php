<div class="c-table table-responsive">
    <table class="" id="ManageEmployerList">
        <thead class="c-table__head c-table__head--slim">
            <tr class="c-table__row">
                <th class="c-table__cell c-table__cell--head">Id &nbsp;&nbsp;</th>
                <th class="c-table__cell c-table__cell--head" style="width: 250px;">Message</th>
                <th class="c-table__cell c-table__cell--head">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($templateList) > 0)
            @foreach($templateList as $row => $val)
            <tr class="c-table__row">
                <th class="c-table__cell c-table__cell--head">{{ $val['id'] }}</th>
                <th class="c-table__cell c-table__cell--head"  style="width: 250px;">{{ $val['message'] }}</th>
                <th class="c-table__cell c-table__cell--head">
                    <a href="javascript:;" class="deleteTemplate"  data-id="{{ $val['id'] }}"><span class="c-tooltip c-tooltip--top" data-toggle="modal" data-target="#deleteModel" aria-label="Delete">
                            <i class="fa fa-trash-o"></i></span>
                    </a></th>
            </tr>
            @endforeach
            @else
             <tr class="c-table__row">
                 <th colspan="4" style="text-align: center;color: red;" class="c-table__cell c-table__cell--head">No Record Found</th>
            </tr>
            @endif
        </tbody>
    </table>
</div>