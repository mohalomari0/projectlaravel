@extends('public.masterpage')
@section('content')

<style>
    /* تعديل حجم النصوص في الصفحة */
    .contact-title {
        font-size: 36px; /* زيادة حجم العنوان */
        font-weight: bold; /* جعله عريضًا */
        color: #333; /* تغيير اللون إلى لون أغمق لزيادة الوضوح */
        text-align: left; /* محاذاة العنوان في المنتصف */
        margin-bottom: 30px; /* إضافة مسافة أسفل العنوان */
    }

    .contact-info h3 {
        font-size: 20px; /* زيادة حجم النص داخل المعلومات */
        font-weight: 600; /* جعل النص أكثر وضوحًا */
        color: #333; /* استخدام لون داكن للنص */
    }

    .contact-info p {
        font-size: 16px; /* زيادة حجم النصوص الأخرى */
        color: #555; /* تغيير اللون إلى لون أفتح قليلاً */
    }

    textarea.form-control, .form-control {
        font-size: 18px; /* زيادة حجم النص داخل الحقول */
        padding: 15px; /* إضافة padding لتحسين المسافة داخل الحقول */
    }

    .button-contactForm {
        font-size: 18px; /* زيادة حجم الخط في الزر */
        padding: 12px 25px; /* تحسين المسافة داخل الزر */
        background-color: #a37954; /* تطبيق اللون الجديد على الزر */
        color: white; /* جعل النص أبيض */
        border: none; /* إزالة الحدود */
        border-radius: 5px; /* جعل الزر ذو حواف مدورة */
        cursor: pointer; /* تغيير شكل المؤشر عند المرور على الزر */
        transition: background-color 0.3s ease; /* إضافة تأثير التغيير في اللون عند التمرير */
    }

    .button-contactForm:hover {
        background-color: #8f693e; /* تغيير اللون عند التمرير إلى لون أغمق قليلاً */
    }

    .contact-info__icon {
        font-size: 30px; /* تكبير الأيقونات */
        color: #007bff; /* تغيير اللون للأيقونات */
        margin-right: 15px; /* إضافة مسافة بين الأيقونة والنص */
    }

    .contact-info {
        margin-bottom: 20px; /* إضافة مسافة بين كل قسم من معلومات الاتصال */
    }

    /* تحسين عرض الحقول والنصوص */
    .form-control {
        margin-bottom: 15px; /* إضافة مسافة بين الحقول */
        width: 100%;
        border: 1px solid #ccc; /* إضافة حد خفيف */
        border-radius: 5px; /* إضافة حواف مدورة */
    }
</style>

<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70 text-center">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!--?  Contact Area start  -->
    <section class="contact-section">
        <div class="container">
            <div class="row m-4">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2> <!-- محاذاة العنوان في المنتصف -->
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('contacts.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control w-100" name="message" required placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="name" type="text" required placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" required placeholder="Email">
                        </div>
                        <button type="submit" class="button-contactForm boxed-btn">Send</button>
                    </form>
                </div>

                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+1 253 565 2365</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@colorlib.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->
</main>

@endsection
