<form method="post" action="{{url('updateReportStates')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <input type="hidden" name="type" value="{{$value}}">
    @if($value == 'pending')
        <div class="form-group">
            <label>معاد الانترفيو</label>
            <input name="interview_date"  min="<?php echo date("Y-m-d"); ?>" class="form-control" type="datetime-local" >
        </div>
    @elseif($value == 'accepted')

        <div class="form-group">
            <label>راتب التعيين </label>
            <input type="number" name="salary" required class="form-control">
        </div>

        <div class="form-group">
            <label>العقد  </label>
            <input type="file" name="contract" required class="form-control">
        </div>

        <div class="form-group">
            <label>تاريخ التعين  </label>
            <input type="date" name="date_of_hiring" required class="form-control">
        </div>


    @elseif($value == 'rejected')

        <div class="form-group">
            <label>سبب الرفض</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\CancelReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>
    @elseif($value == 'hold')

        <div class="form-group">
            <label>سبب التعليق</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\HoldReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>
    @elseif($value == 'block')

        <div class="form-group">
            <label>سبب الحظر</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\BlockReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>

    @elseif($value == 'repeat')

        <div class="form-group">
            <label>سبب التكرار</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\RepeatReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>
        @elseif($value == 'trial_period')
        <div class="form-group">
            <label>تاريخ الاستقالة</label>
            <input type="date" name="resignation_date" class="form-control">
        </div>

    @endif
    <div class="form-group">
        <label>الملاحظات</label>
        <textarea name="interview_description"  class="form-control" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">حفظ </button>
</form>

