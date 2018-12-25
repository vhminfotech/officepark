<input class="c-input" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<div class="container">
    <div class="row u-mb-large">
        <div class="col-12">
            <div c-table-responsive>
                <table class="c-table table-responsive" id="datatable">
                   
                    <caption class="c-table__title">
                        <div class="row">
                            <label>Supports Calls</label>
                            <div class=" col-lg-offset-7 col-lg-7">
                                <div class="c-field u-mb-small"></div>
                            </div>
                        </div>
                    </caption>
                    
                    <thead class="c-table__head c-table__head--slim" style="">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head" style="">Ticket ID &nbsp;&nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Call ID &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Date/Time &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Customer <br/> Number &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Customer &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Agent &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Reasion &nbsp;&nbsp;</th>
                            <th class="c-table__cell c-table__cell--head">Message &nbsp;&nbsp;</th>
                            <!-- <th class="c-table__cell c-table__cell--head no-sort">{{ trans('employee.action') }}</th> -->
                        </tr>
                    </thead>
                    <tbody>
                       @php
                        $MessageW = wordwrap($supportArray[0]['note'], 30, "\n", true);
                        $MessageW = htmlentities($MessageW);
                        $MessageW = nl2br($MessageW);
                        @endphp
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{ $supportArray[0]['id'] }}</td>
                            <td class="c-table__cell">6570105</td>
                            <td class="c-table__cell">{{ date('d.m.Y', strtotime($supportArray[0]['created_at'] )) }} </td>
                            <td class="c-table__cell">{{ ($supportArray[0]['type'] == 'CUSTOMER' ? $supportArray[0]['customer_number'] : '-') }} </td>
                            <td class="c-table__cell">{{ ($supportArray[0]['type'] == 'CUSTOMER' ? $supportArray[0]['name'] : '-') }} </td>
                            <td class="c-table__cell">{{ ($supportArray[0]['type'] == 'AGENT' ? $supportArray[0]['name'] : '-') }} </td>
                            <td class="c-table__cell">{{ $support_message[$supportArray[0]['support_id']] }} </td>
                            <td class="c-table__cell" style="width: 50px;">{!!  $MessageW !!}</td>
                            <!-- <td class="c-table__cell"><span class="c-badge c-badge--small c-badge--success">Responded</span> </td> -->
                           <!--  <td class="c-table__cell"> <a href="javasctript:;"> 
                                <span class="c-badge c-badge--secondary"> Responds</span> </a>
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>
</div>


