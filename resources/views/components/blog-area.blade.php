<section class="blog-area section">
    <div class="container">

        <div class="row">

            @foreach($posts as $post)

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">

                            <div class="blog-image"><img src="{{ $post->small_image }}" alt="Blog Image"></div>

                            <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>

                            <div class="blog-info">

                                <h4 class="title"><a href="/post/{{ $post->id }}"><b>{{ $post->title }}</b></a></h4>

                                <ul class="post-footer">
                                    <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                </ul>

                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->

            @endforeach

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="http://blue-ocean.com.ua/image/catalog/blog/gotovie-ob-ekty/akvapark-vo-lvove.jpg" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>

                        <h4 class="title"><a href="#"><b>Композитные трубы Blue Ocean T-Fusion и S-Fusion</b></a></h4>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-8 col-md-12">
                <div class="card h-100">
                    <div class="single-post post-style-2">

                        <div class="blog-image"><img src="http://blue-ocean.com.ua/image/catalog/blog/gotovie-ob-ekty/torgoviy-center-bashni.JPG" alt="Blog Image"></div>

                        <div class="blog-info">

                            {{--<h6 class="pre-title"><a href="#"><b>HEALTH</b></a></h6>--}}

                            <h4 class="title"><a href="#"><b>Металлопластиковые или ППР трубы</b></a></h4>

                            <p>Тенденции развития рынка сантехнической продукции приводят к тому, что широкий ассортимент изделий затрудняет выбор продукции, в особенности для неискушенного человека.</p>

                            <div class="avatar-area">
                                <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                                <div class="right-area">
                                    <a class="name" href="#"><b>Александр Золотарев</b></a>
                                    <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                                </div>
                            </div>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>

                        </div><!-- blog-right -->

                    </div><!-- single-post extra-blog -->

                </div><!-- card -->
            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="http://blue-ocean.com.ua/image/catalog/main-categories/1.png" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>

                        <h4 class="title"><a href="#"><b>Трубы Fiber, особенности и монтаж</b></a></h4>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">

                    <div class="single-post post-style-2 post-style-3">

                        <div class="blog-info">

                            <h6 class="pre-title"><a href="#"><b>HEALTH</b></a></h6>

                            <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                            <div class="avatar-area">
                                <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                                <div class="right-area">
                                    <a class="name" href="#"><b>Lora Plamer</b></a>
                                    <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                                </div>
                            </div>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>

                        </div><!-- blog-right -->

                    </div><!-- single-post extra-blog -->

                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="images/ben-o-sullivan-382817.jpg" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>

                        <div class="blog-info">
                            <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>
                        </div><!-- blog-info -->

                    </div><!-- single-post -->

                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">

                    <div class="single-post post-style-4">

                        <div class="display-table">
                            <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>
                        </div>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->

                    <div class="single-post">

                        <div class="display-table">
                            <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>
                        </div>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->

                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">

                    <div class="single-post post-style-4">

                        <div class="display-table">
                            <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>
                        </div>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->

                    <div class="single-post">

                        <div class="display-table">
                            <h4 class="title display-table-cell"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>
                        </div>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->

                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-8 col-md-12">
                <div class="card h-100">
                    <div class="single-post post-style-2">

                        <div class="blog-image"><img src="images/icons8-team-355990.jpg" alt="Blog Image"></div>

                        <div class="blog-info">

                            <h6 class="pre-title"><a href="#"><b>HEALTH</b></a></h6>

                            <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                            <div class="avatar-area">
                                <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                                <div class="right-area">
                                    <a class="name" href="#"><b>Lora Plamer</b></a>
                                    <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                                </div>
                            </div>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>

                        </div><!-- blog-right -->

                    </div><!-- single-post extra-blog -->

                </div><!-- card -->
            </div><!-- col-lg-8 col-md-12 -->

        </div><!-- row -->

        <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

    </div><!-- container -->
</section>