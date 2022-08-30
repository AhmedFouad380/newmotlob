@extends('front.layout')
@section('title')
    غير مفعل
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@section('content')

    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row">
            <div class="col-md-12">
                <!-- row -->
                    <div class="col-md-12">
                        <div class="alert text-center">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            مرحبا   {{Auth::guard('company')->user()->first_name}}
                            <br>
                            تحية طيبة من فريق عمل مطلوب . كوم
                            <br> وظايف بدون رسوم.
                            <br>
                            نشكر اهتمامكم أن تكونوا جزءا من مطلوب.كوم.
                            <br>
                            نقوم حالياً بمراجعة طلبكم وسنقوم بتنشيط حسابكم خلال يومين عمل.
                            <br>
                            سيتم إعلامكم عبر الهاتف أو البريد الإلكتروني عند التنشيط.
                            <br>
                            نتمنى لك التوفيق!
                            <br>
                            فريق عمل مطلوب.كوم
                            <br>
                            يمكنك التواصل معنا عن طريق : info@matloob.com
                            <br>
                            او على هاتف رقم :
                            @inject('setting','App\Models\Setting')
                            {{$setting->find(1)->phone}}
                        </div>
                        <div class="col-md-12">
                            <div class="text-center text-danger">
                                بعد ارسال اتفاقيه التوظيف يمكنك تحميلها من هنا
                                <br>
                                @if(Auth::guard('company')->user()->employment_agreement != null)
                                    <a class="btn-success btn " download target="_blank" href="{{Auth::guard('company')->user()->employment_agreement}}">تحميل اتفاقية التوظيف</a>
                                @endif

                                @if(Auth::guard('company')->user()->verification_letter_image != null)
                                    <br><br>
                                    <a class="btn-primary btn " download target="_blank" href="{{Auth::guard('company')->user()->verification_letter_image}}">تحميل خطاب التحقق</a>
                                @endif

                            </div>
                            <form action="{{'updateCompanyFiles'}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <label>رقم البطاقه الضريبيه</label>
                                    <input type="text"   @if(Auth::guard('company')->user()->employment_agreement == null) disabled @endif required value="{{Auth::guard('company')->user()->tax_card_number}}" name="tax_card_number" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>رقم السجل التجاري</label>
                                    <input type="text" @if(Auth::guard('company')->user()->employment_agreement == null) disabled @endif required value="{{Auth::guard('company')->user()->commercial_registration_number}}" name="commercial_registration_number" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>صورة السجل الضريبية</label>
                                    <input type="file"@if(Auth::guard('company')->user()->employment_agreement == null) disabled @endif required  value="{{Auth::guard('company')->user()->tax_card_image}}" name="tax_card_image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>صورة السجل التجاري</label>
                                    <input type="file" @if(Auth::guard('company')->user()->employment_agreement == null) disabled @endif required  value="{{Auth::guard('company')->user()->commercial_registration_image}}"name="commercial_registration_image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>اتفاقية التوظيف</label>
                                    <input type="file" @if(Auth::guard('company')->user()->employment_agreement == null) disabled @endif  required value="{{Auth::guard('company')->user()->employment_agreement_user}}"  name="employment_agreement_user" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>خطاب التحقق</label>
                                    <input type="file" @if(Auth::guard('company')->user()->employment_agreement == null) disabled @endif  required value="{{Auth::guard('company')->user()->verification_letter_image_user}}" name="verification_letter_image_user" class="form-control">
                                </div>
                                    @if(Auth::guard('company')->user()->employment_agreement != null)
                                    <div class="col-md-3">
                                        <br>
                                        <button type="submit" class="btn-primary btn" >حفظ</button>
                                    </div>
                                    @endif

                            </div>
                            </form>

                        </div>
                    </div>


            </div>
        </div>
    </section>


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $('.dropify').dropify();
    </script>
@endsection
