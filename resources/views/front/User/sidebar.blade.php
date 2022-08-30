<div class="col-md-2">
    <ul class="company-data">
       <a href="{{url('MyProfile')}}"><li @if(Request::segment(1) == 'MyProfile') class="blue gray first-li" @endif >الصفحة الشخصية</li></a>
        <a href="{{url('MyJobs')}}"> <li @if(Request::segment(1) == 'MyJobs') class="blue gray " @endif >الوظائف</li></a>
    </ul>
</div>
