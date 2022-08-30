@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .none{
            display:none!important;
        }
        .block{
            display: block!important;
        }
        .label-radio{
            align-items: center;
            padding: 20px;
            border: 0.5px solid #ccc;
            background: #fff;
            margin: 0 0 8px 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            height: 48px;
            min-width: 144px;
            color: #777;
            display: inline-flex;
        }
        .label-radio input{
            margin:10px
        }
        .main-1{
            background-color: none;
        }
        .main-1 section {
            padding-top: 0px!important;
        }
        .box{
            text-align: right;
        }
        .box li{
            color:#000
        }
    </style>
@endsection
@section('content')




    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row" >
            <div class="col-md-3 main-1 ">
                <h4>الوظائف </h4>
                <hr>
                <section>
                <div class="row " style="text-align: right">
                    @foreach(\App\Models\JobRequest::where('id','!=',$data->id)->where('user_id',Auth::guard('web')->id())->inRandomOrder()->limit(4)->get() as $job )
                            <div class="col-md-12">
                                <a href="{{url('Job-Details',$job->id)}}">
                                 <div class="box">
                                  <li  >{{$job->Job->title}} </li>
                                    <li ><span><i class="fa fa-briefcase"></i>{{$job->Job->Company->company_name}}</span> </li>
                                    <li ><i class="fa fa-map-marker"></i>{{$job->Job->Country->name}} - {{$data->Job->City->name}}  </li>
                                    <li ><i class="fa fa-calendar"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->diffForHumans()}}
                                </div>
                                </a>
                            </div>
                    @endforeach

                </div>
                </section>
            </div>
            <div class="col-md-8 main-1 ">
                <h4>التقرير </h4>
                <hr>
                <section>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="box">
                                <li  >{{$data->Job->title}} </li>
                                <li ><span><i class="fa fa-briefcase"></i>{{$data->Job->Company->company_name}}</span> </li>
                                <li ><i class="fa fa-map-marker"></i>{{$data->Job->Country->name}} - {{$data->Job->City->name}}  </li>
                                <li ><i class="fa fa-calendar"></i> {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans()}}
                                </li>
                                <hr>
                                @foreach(\App\Models\JobRequestStates::where('job_request_id',$data->id)->OrderBy('id','asc')->get() as $Status)
                               @if($Status->type == 'pending')
                                <div class="row">
                                    <div class="col-md-3">
                                        <li style="color:#000000"> الاشعارات  </li>
                                        <li><span style="color:green">تم تحديد معاد مقابلة </span> </li>
                                        @if($Status->interview_date )
                                        <li style="color:#000000"><i class="fa fa-calendar"></i>تاريخ المقابلة</li>
                                        @endif
                                        <li style="color:#000000"><i class="fa fa-list"></i>ملاحظات</li>
                                    </div>
                                    <div class="col-md-9">
                                        <li>  <br>  </li>
                                        <li>  <br>  </li>
                                        <li style="color:#000000"> {{$Status->interview_date}}  </li>
                                        <li style="color:#000000">{{$Status->description}}  </li>
                                    </div>
                                </div>
                                        @if($Status->confirm_interview == 'pending')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{url('confirm_interview')}}" method="post">
                                                        @csrf
                                                        <input  type="hidden" name="job_request_id" value="{{$Status->job_request_id}}">
                                                        <input  type="hidden" name="job_request_states_id" value="{{$Status->id}}">

                                                        <button class="btn btn-primary" type="submit"> قبول </button>

                                                    </form>
                                                </div>

                                                <div class="col-md-2">
                                                    <form action="{{url('reject_interview')}}" method="post">
                                                        @csrf
                                                        <input  type="hidden" name="job_request_id" value="{{$Status->job_request_id}}">
                                                        <input  type="hidden" name="job_request_states_id" value="{{$Status->id}}">
                                                        <div class="form-group">
                                                            <label>سبب الرفض</label>
                                                            <select required class="form-control"  name="reason" >
                                                                @foreach(\App\Models\UserRejectInterviewReason::all() as $Reason)
                                                                    <option value="{{$Reason->reason}}">{{$Reason->reason}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-danger" type="submit"> رفض  </button>

                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    <hr>

                                    @elseif($Status->type == 'accepted')
                                        <div class="row">
                                            <div class="col-md-3">
                                                <li style="color:#000000"> الاشعارات  </li>
                                                <li><span style="color:green">الموقف النهائي  </span> </li>
                                                <li style="color:#000000"><i class="fa fa-list"></i>ملاحظات</li>
                                            </div>
                                            <div class="col-md-8">
                                                <li>  <br>  </li>
                                                <li>  تم قبولك في الوظيفة  </li>
                                                <li style="color:#000000">{{$Status->description}}  </li>
                                            </div>
                                        </div>
                                        <hr>

                                    @elseif($Status->type == 'rejected')

                                        <div class="row">
                                            <div class="col-md-3">
                                                <li style="color:#000000"> الاشعارات  </li>
                                                <li style="color:red    "> @if($Status->confirm_interview == 'rejected') تم رفض معاد الانترفيو @else  الموقف النهائي @endif</li>
                                                <li style="color:red"> سبب الرفض </li>
                                                <li style="color:#000000"><i class="fa fa-list"></i>ملاحظات</li>
                                            </div>
                                            <div class="col-md-8">
                                                <li>  <br>  </li>
                                                <li  style="color:red">  @if($Status->confirm_interview == 'rejected') <br> @else مرفوض @endif   </li>
                                                <li  style="color:red">  {{$Status->reason}}  </li>
                                                <li style="color:#000000">{{$Status->description}}  </li>
                                            </div>
                                        </div>
                                        <hr>
                                    @elseif($Status->type == '')
                                        <div class="row">
                                            <div class="col-md-3">
                                                <li style="color:#000000"> الاشعارات  </li>
                                                <li><span style="color:green">الموقف النهائي </li>
                                                <li style="color:#000000"><i class="fa fa-list"></i>ملاحظات</li>
                                            </div>
                                            <div class="col-md-8">
                                                <li>  <br>  </li>
                                                <li  style="color:red">  مرفوض  </li>
                                                <li style="color:#000000">{{$Status->description}}  </li>
                                            </div>
                                        </div>
                                        <hr>
                                   @endif
                                @endforeach
                                <div class="col-md-12">
                                    <form method="post" action="{{url('StoreComplaints')}}">
                                        @csrf
                                    <li class="fs-5 text-dark"> اضافة شكوى :</li>
                                        <br>
                                        <input type="hidden" value="{{$data->job_id}}" name="job_id">
                                    <textarea name="description" class="form-control" id="editor1"></textarea>
                                        <button class="btn btn-primary  pull-left"  type="submit" >حفظ</button>
                                    </form>
                                </div>
                                <br>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </section>

@endsection
@section('js')

    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
