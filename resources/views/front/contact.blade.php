
@extends('front.layout')
@section('title')
    تواصل معنا
@endsection


@section('content')
<section class="container-fluied image-container">
    <section class="container container-width">
        <div class="contact-header ">
            <div class=" text-center">
                <h4>تواصل معنا</h4>
            </div>
        </div>

        <div class="perant">
            <div class="row">

                <div class="col-md-6  info">
                    <form action="" method="" class="form-info">
                        <div class="form-group">
                            <label for="exampleInputName">الإسم</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="الإسم">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكتروني">
                        </div>
                        <div class="form-group">
                            <label for="subject">الموضوع</label>
                            <input type="text" class="form-control" id="subject" placeholder="الموضوع">
                        </div>
                        <div class="form-group">
                            <label for="message">الرسالة</label>
                            <textarea class="form-control" id="message" placeholder="اكتب الرسالة هنا"></textarea>
                        </div>
                        <div class="info-btn">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>

                    </form>
                </div>

                <div class="col-md-6 right">
                    <div class="row">
                        <div class="col-md-12 ">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54725.48336654894!2d31.281205227555763!3d29.969240068783456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847c0170ade2b%3A0xfa6a938dc813cf8b!2z2KfZhNmF2K3Zg9mF2Kkg2KfZhNiv2LPYqtmI2LHZitipINin2YTYudmE2YrYpw!5e0!3m2!1sar!2seg!4v1648601764443!5m2!1sar!2seg" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="data-box">
                            <div class="col-md-12 data-div">
                                <div class="row">
                                    <div class="col-md-1 data-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="col-md-11">
                                        <h6>العنوان</h6>
                                        <p class="font-color">{{\App\Models\Setting::find(1)->address}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 data-div">
                                <div class="row">
                                    <div class="col-md-1 data-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="col-md-11">
                                        <h6>البريد الالكتورني </h6>
                                        <p class="font-color">{{\App\Models\Setting::find(1)->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 data-div">
                                <div class="row">
                                    <div class="col-md-1 data-icon">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <div class="col-md-11">
                                        <h6>رقم الهاتف</h6>
                                        <p class="font-color"> {{\App\Models\Setting::find(1)->phone}} </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</section>
@endsection
