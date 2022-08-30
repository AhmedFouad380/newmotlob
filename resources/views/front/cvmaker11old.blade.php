@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection


@section('content')              <!-- this is content -->

             <section class="container">
                 <div class="row cv-maker">
						<div class="col-md-3 cv">
							<div>
								<h6>مراحل تصميم السيرة الذاتية </h6>
								<hr>
										<ul class="ul">
											<li class="green"><span class="green">1</span>المعلومات الشخصية</li>
											<li class="green"><span class="green">2</span>الموجـز</li>
											<li class="green"><span class="green">3</span>التعليـم</li>
											<li class="green"><span class="green">4</span>الخبـرات</li>
											<li class="green"><span class="green">5</span>المهـارات</li>
                                            <li class="green"><span class="green">7</span>الاحداث و الدورات</li>
                                            <li class="green"><span class="green">8</span>المعرفين</li>
                                            <li class="green"><span class="green">9</span>المنظمات</li>
                                            <li class="blue"><span class="blue border-blue">10</span>الخطوة النهـائية</li>
										</ul>
							</div>
					    </div>

              <div class="col-md-6 cv-form">
                <h5>هل تحتاج إلى إضافة المزيد من الأقسام؟ </h5>
                <p>هذه الأقسام اختيارية</p>
                <form>
                    <section class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>أضف قسماً مخصصاً </label>
                          <input type="text" class="form-control" name="" placeholder=" أضف عنوان القسم">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="اكتب ما يحتويه القسم المخصص الجديد هنا" id="floatingTextarea2" style="height: 180px"></textarea>
                            <label for="floatingTextarea2">اكتب ما يحتويه القسم المخصص هنا</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                       <div class="div-form">عناويين أقسام جاهزة</div>
                       <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          قسم اللغات
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          قسم المواقع و معرض الأعمال
                        </label>
                      </div>
					  <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          قسم المعلومات الإضافية
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          قسم الإنجازات
                        </label>
                      </div>
					  <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          قسم الهوايات الشخصية
                        </label>
                      </div>
                     </div>
                    </section>
               </form>
						</div>


						<div class="col-md-3 cv-table">
							<ul class="green">
								<li class="green color">
									<span class="green">سيرة ذاتية</span>
									<p class="green">الإسم الأول الإسم الأخير</p>
									<p class="green">البريد الإلكتروني</p>
									<p class="green">الموجز</p>

								</li>
								<li class="green color">التعليم</li>
								<li class="green color">الخبرات</li>
								<li class="green color">المهارات</li>

							</ul>

						</div>





                    </div>
					 <hr>
					 <div class="row cv-btn">
						<a type="button" class=" btn  btn-theme2" href="{{url('cv-maker-step9')}}">
							رجوع للخلف
						  </a>
						<a type="button" class="btn btn-primary btn-theme" data-toggle="modal" data-target="#login">
							الخطوة التالية
						  </a>

					 </div>
              </section>


@endsection
