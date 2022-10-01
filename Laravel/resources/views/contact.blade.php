@extends('layouts.client')
@section('title', 'Liên hệ')
@section('content')
    <section class="contact-section padding_top">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=1140&amp;height=480&amp;hl=en&amp;q=Cao đẳng FPT&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                            href="https://www.kokagames.com/fnf-friday-night-funkin-mods/">FNF</a></div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            width: 100%;
                            height: 480px;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            width: 100%;
                            height: 480px;
                        }

                        .gmap_iframe {
                            height: 480px !important;
                        }
                    </style>
                </div>

            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Để lại lời nhắn tại đây</h2>
                </div>
                <div class="col-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-lg-8">

                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        placeholder='Lời nhắn ...'></textarea>
                                        @error('message')
                                            {{$message}}
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder='Tên của bạn ...'>
                                        @error('name')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        placeholder='Email của bạn ...'>
                                        @error('email')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn_3 button-contactForm" id="cf">Gửi lời nhắn</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Trường cao đẳng FPT Polytechnic.</h3>
                            <p>Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>0394 523 205</h3>
                            <p>Đây là số của sinh viên</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>minhductham@duck.com</h3>
                            <p>Đây là mail của sinh viên</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>

        // function post() {
        //     $.ajax({
        //     type: "POST",
        //     url: "{{route('contact.store')}}",
        //     success: function(response) {
        //         Swal.fire({
        //             position: 'top-end',
        //             icon: 'success',
        //             title: 'Your work has been saved',
        //             showConfirmButton: false,
        //             timer: 1500
        //         })

        //     }
        // });
        //   }

        // $('#cf').click(function (e) {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "POST",
        //         url: "contact",
        //         success: function(response) {
        //             Swal.fire({
        //                 position: 'top-end',
        //                 icon: 'success',
        //                 title: 'Your work has been saved',
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             })
        //             console.log(response);
        //         }

        // });
        //     });
        // $('#cf').click(function (e) {
            // e.preventDefault();

                    // Swal.fire({
                    //     position: 'top-end',
                    //     icon: 'success',
                    //     title: 'Your work has been saved',
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // })

            // });
            // $('button').click(function (e) {
            //     // e.preventDefault();

            //     Swal.fire({
            //             position: 'top-end',
            //             icon: 'success',
            //             title: 'Your work has been saved',
            //             showConfirmButton: false,
            //             timer: 1500
            //         })
            // });
    </script>
@endsection
