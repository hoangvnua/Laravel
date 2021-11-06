@extends('frontend.layouts.master')

@section('content-header')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">{{ $post->title }}</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Trang chủ</a></li>
                                    <li><a href="blog-grid-sidebar-left.html">Bài viết</a></li>
                                    <li class="active" aria-current="page">{{ $post->title }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="blog-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    @include('frontend.posts.sidebar')
                </div>
                <div class="col-lg-9">
                    <!-- Start Blog Single Content Area -->
                    <div class="blog-single-wrapper">
                        <div class="blog-single-img" data-aos="fade-up" data-aos-delay="0">
                            <img class="img-fluid" src="/frontend/images/blog/blog-grid-home-1-img-1.jpg" alt="">
                        </div>
                        <ul class="post-meta" data-aos="fade-up" data-aos-delay="200">
                            <li>Đăng bởi : <a href="#" class="author">{{ $post->user->name }}</a></li>
                            <li><a href="#" class="date">{{ $post->created_at->format('d-m-Y') }}</a></li>
                        </ul>
                        <h4 class="post-title" data-aos="fade-up" data-aos-delay="400">{{ $post->title }}</h4>

                        <div class="para-content" data-aos="fade-up" data-aos-delay="600">
                            <p>{{ $post->content }}</p>
                            <blockquote class="blockquote-content">
                                {{ $post->content }}
                            </blockquote>
                            <p>{{ $post->content }}</p>
                            <p>{{ $post->content }}</p>
                        </div>
                        <div class="para-tags" data-aos="fade-up" data-aos-delay="0">
                            <span>Thẻ: </span>
                            <ul>
                                @foreach ($post->tags as $tag)
                                    @if (isset($tag->name))
                                        <li><a href="#">{{ $tag->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div> <!-- End Blog Single Content Area -->
                    <div class="comment-area">
                        {{-- <div class="comment-box" data-aos="fade-up" data-aos-delay="0">
                            <h4 class="title mb-4">3 Comments</h4>
                            <!-- Start - Review Comment -->
                            <ul class="comment">
                                <!-- Start - Review Comment list-->
                                <li class="comment-list">
                                    <div class="comment-wrapper">
                                        <div class="comment-img">
                                            <img src="/frontend/images/user/image-1.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-content-top">
                                                <div class="comment-content-left">
                                                    <h6 class="comment-name">Kaedyn Fraser</h6>
                                                </div>
                                                <div class="comment-content-right">
                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>

                                            <div class="para-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
                                                    inventore dolorem a unde modi iste odio amet, fugit fuga aliquam,
                                                    voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur
                                                    cumque nam quod sint provident modi alias culpa, inventore deserunt
                                                    accusantium amet earum soluta consequatur quasi eum eius laboriosam,
                                                    maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam
                                                    quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start - Review Comment Reply-->
                                    <ul class="comment-reply">
                                        <li class="comment-reply-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="/frontend/images/user/image-2.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Oaklee Odom</h6>
                                                        </div>
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
                                                            inventore dolorem a unde modi iste odio amet, fugit fuga
                                                            aliquam, voluptatem maiores animi dolor nulla magnam ea!
                                                            Dignissimos aspernatur cumque nam quod sint provident modi alias
                                                            culpa, inventore deserunt accusantium amet earum soluta
                                                            consequatur quasi eum eius laboriosam, maiores praesentium
                                                            explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint
                                                            sunt. Ipsam officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul> <!-- End - Review Comment Reply-->
                                </li> <!-- End - Review Comment list-->
                                <!-- Start - Review Comment list-->
                                <li class="comment-list">
                                    <div class="comment-wrapper">
                                        <div class="comment-img">
                                            <img src="/frontend/images/user/image-3.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-content-top">
                                                <div class="comment-content-left">
                                                    <h6 class="comment-name">Jaydin Jones</h6>
                                                </div>
                                                <div class="comment-content-right">
                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>

                                            <div class="para-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
                                                    inventore dolorem a unde modi iste odio amet, fugit fuga aliquam,
                                                    voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur
                                                    cumque nam quod sint provident modi alias culpa, inventore deserunt
                                                    accusantium amet earum soluta consequatur quasi eum eius laboriosam,
                                                    maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam
                                                    quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                            </div>
                                        </div>
                                    </div>
                                </li> <!-- End - Review Comment list-->
                            </ul> <!-- End - Review Comment -->
                        </div> --}}

                        {{-- <!-- Start comment Form -->
                        <div class="comment-form" data-aos="fade-up" data-aos-delay="0">
                            <div class="coment-form-text-top mt-30">
                                <h4 class="title mb-3 mt-3">Leave a Reply</h4>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-name">Your name <span>*</span></label>
                                            <input id="comment-name" type="text" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-email">Your Email <span>*</span></label>
                                            <input id="comment-email" type="email" placeholder="Enter your email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-review-text">Your review <span>*</span></label>
                                            <textarea id="comment-review-text" placeholder="Write a review"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-md btn-golden" type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End comment Form --> --}}
                    </div>
                </div>
            </div>
        </div>
    </div><br>
@endsection
