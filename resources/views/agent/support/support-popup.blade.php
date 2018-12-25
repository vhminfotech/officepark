

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
                            <th class="c-table__cell c-table__cell--head no-sort">{{ trans('employee.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="c-table__row">
                            <td class="c-table__cell">4521236</td>
                            <td class="c-table__cell">6570105</td>
                            <td class="c-table__cell">12.12.2018 </td>
                            <td class="c-table__cell">Tets1 </td>
                            <td class="c-table__cell">agrd4 </td>
                            <td class="c-table__cell">Improvement </td>
                            <td class="c-table__cell">Lorem Ipsum   </td>
                            <td class="c-table__cell"><span class="c-badge c-badge--small c-badge--success">Responded</span> </td>
                            <td class="c-table__cell"> <a href="javasctript:;"> 
                                <span class="c-badge c-badge--secondary"> Responds</span> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- // .col-12 -->
        </div>
    </div>
</div>


