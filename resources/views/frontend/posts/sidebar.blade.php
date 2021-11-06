<div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">
    <!-- Start Single Sidebar Widget -->
    <div class="sidebar-single-widget">
        <h6 class="sidebar-title">Danh mục bài viết</h6>
        <div class="sidebar-content">
            <ul class="sidebar-menu">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('frontend.posts.list', $category->id) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> <!-- End Single Sidebar Widget -->

    <!-- Start Single Sidebar Widget -->
    <div class="sidebar-single-widget">
        <h6 class="sidebar-title">Thẻ</h6>
        <div class="sidebar-content">
            <div class="tag-link">
                @foreach ($tags as $tag)
                    <a href="{{ route('frontend.posts.list', $tag->id) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </div> <!-- End Single Sidebar Widget -->
</div> <!-- End Sidebar Area -->