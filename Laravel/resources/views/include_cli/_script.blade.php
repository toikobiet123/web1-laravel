<script src="{{ asset('client/js/jquery-1.12.1.min.js') }}"></script>
<script src="{{ asset('client/js/popper.min.js') }}"></script>
<script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('client/js/swiper.min.js') }}"></script>
<script src="{{ asset('client/js/masonry.pkgd.js') }}"></script>
<script src="{{ asset('client/js/lightslider.min.js') }}"></script>
<script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('client/js/slick.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('client/js/waypoints.min.js') }}"></script>
<script src="{{ asset('client/js/contact.js') }}"></script>
<script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.form.js') }}"></script>
<script src="{{ asset('client/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('client/js/mail-script.js') }}"></script>
<script src="{{ asset('client/js/stellar.js') }}"></script>
<script src="{{ asset('client/js/price_rangs.js') }}"></script>
<script src="{{ asset('client/js/theme.js') }}"></script>
<script src="{{ asset('client/js/custom.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('summernote/summernote.min.js')}}"></script>
<script src="{{asset('rating/star-rating.js')}}"></script>
<script src="{{asset('rating/theme.js')}}"></script>
{{-- ========================= --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#search_input').on('keyup',function () {
            var query = $(this).val();
            $.ajax({
                url:'{{ route('search') }}',
                type:'GET',
                data:{'name':query},
                success:function (data) {
                    $('#product_list_search').html(data);
                }
            })
        });
        $(document).on('click', 'li', function(){
            // var value = $(this).text();
            // $('#search_input').val(value);
            // $('#product_list_search').html("");
        });
    });
</script>
<script type="text/javascript">
    var link = document.createElement("link");
    link.setAttribute("rel","stylesheet");
    link.setAttribute("href","{{asset('client/css/search.css')}}");
    var head = document.getElementsByTagName("head")[0];
    head.appendChild(link);
  </script>
  <script>
    var mybutton = document.getElementById("myBtn");
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
