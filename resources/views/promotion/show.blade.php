<div class="card bg-none card-box">
    {{Form::open(array('url'=>'promotion/changeaction','method'=>'post'))}}
    <div class="row">
        <div class="col-12">
            <table class="table table-striped mb-0 dataTable no-footer">
                <tr role="row">
                    <th>{{__('Employee')}}</th>
                    <td style="display: table-cell;">{{ !empty($promotion->employee())?$promotion->employee()->name:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Designation')}}</th>
                    <td style="display: table-cell;">{{ !empty($promotion->designation())?$promotion->designation()->name:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Promotion Date')}}</th>
                    <td>{{ !empty($promotion->promotion_date)?$promotion->promotion_date:'' }}</td>
                </tr>
                <tr>
                <th>{{__('HOD promotion status')}}</th>
                                <td>
                                    @if($promotion->hod_promotions_approve=="0")
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($promotion->hod_promotions_approve=="1")
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    @else($promotion->hod_promotions_approve=="2")
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    @endif
                                </td>
                </tr>
                <tr>
                <th>{{__('HR promotion status')}}</th>
                                <td>
                                    @if($promotion->hr_promotions_approve=="0")
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($promotion->hr_promotions_approve=="1")
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    @else($promotion->hr_promotions_approve=="2")
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    @endif
                                </td>
                </tr>
                <input type="hidden" value="{{ $promotion->id }}" name="promotion_id">
            </table>
        </div>
        @if(\Auth::user()->type == 'hr')
            @if($promotion->hod_promotions_approve!="0")
            <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>
            @else
                <div class="col-12">
                {{'First HOD promotion Approve After You can Access'}}
                </div>
            @endif
        @else
        <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>

        @endif

    </div>
    {{Form::close()}}
</div>
