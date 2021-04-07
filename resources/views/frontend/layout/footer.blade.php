
<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery-ui.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.slicknav.js"></script>
<script src="{{ asset('frontend') }}/js/mixitup.min.js"></script>
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/js/main.js"></script>

<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

        $( "#employee_search" ).autocomplete({
            source: function( request, response ) {
                // Fetch data
                $.ajax({
                    url:"{{route('employees.getEmployees')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                $('#employee_search').val(ui.item.label); // display the selected text
                return false;
            }
        });

    });
</script>


{{--<script>--}}
    {{--function mybtn(){--}}
        {{--var pro_id = $('#pro_id').val();--}}
        {{--var price = $('#price').val();--}}
        {{--var b_id = $('#b_id').val();--}}
        {{--var f_img = $('#f_img').val();--}}
        {{--var s_img = $('#s_img').val();--}}
        {{--var t_img = $('#t_img').val();--}}
        {{--var f_img = $('#f_img').val();--}}

        {{--$.ajax({--}}
            {{--type:"POST",--}}
            {{--dataType:"JSON",--}}
            {{--data:{product_id:pro_id, price:price ,brand_id:b_id, first_img:f_img ,second_img:s_img, third_img:t_img, fourth_img:f_img},--}}
            {{--url:"/cart",--}}
            {{--success:function(data){--}}
                {{--console.log('data added success')--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
{{--</script>--}}


</body>

</html>