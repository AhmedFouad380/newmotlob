<div class="col-md-2">
    <ul class="company-data">
       <a href="{{url('Profile')}}"><li @if(Request::segment(1) == 'Profile') class="blue gray first-li" @endif >حساب الشركة</li></a>
        <a href="{{url('Company-jobs')}}"> <li @if(Request::segment(1) == 'Company-jobs') class="blue gray " @endif >الوظائف</li></a>
        @inject('companies','App\Models\Company')
        @if(($companies->find(Auth::guard('company')->id())->company_type == 'employment'))
        <a href="{{url('Reports')}}">  <li  @if(Request::segment(1) == 'Reports') class="blue gray " @endif >التقارير
            </li></a>
        <a href="{{url('MyInvoices')}}"><li @if(Request::segment(1) == 'MyInvoices' || Request::segment(1) =='InvoiceDetail') class="blue gray " @endif>
            الحسابات
{{--            @if(\App\Models\Invoice::where('company_id',Auth::guard('company')->id())->where('is_read',0)->count() > 0)--}}
{{--                <span style="background: red; border-radius: 50%; ">{{\App\Models\Invoice::where('company_id',Auth::guard('company')->id())->where('is_read',0)->count()}}</span>--}}
{{--            @endif--}}
        </li>
        </a>

            <a href="{{url('Complaints')}}">  <li  @if(Request::segment(1) == 'Complaints') class="blue gray " @endif  >الشكاوي</li></a>
        @endif
    </ul>
</div>
