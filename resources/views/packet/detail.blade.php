@extends('layout.landing_page.main')
@section('content')
<div class="blog-area">
  <div class="container">
      <div class="row">
          <div class="col-lg-7 blog-details-wrapper">
              <!-- Post Details Start -->
              <article class="single-post-item">
                  <div class="post-thumbnail">
                      <a href="#">
                        <img src="{{ asset('storage/'.$tour_packet->cover_image) }}" alt="Blog Image">
                      </a>
                  </div>
                  <div class="post-content-wrapper">
                      <div class="post-meta style-2">
                          <div class="post-meta-inner">
                              <a href="#" class="user-info">
                                  <div class="image-wrapper">
                                      <img src="images/latest-post/meta-user-img-1.png" alt="Meta User">
                                  </div>
                                  <p class="name">By Jerremy Jean</p>
                              </a>
                              <div class="date-info">
                                  <p class="date">Friday, 1 April 2022</p>
                              </div>
                              <div class="time-info">
                                  <p class="time">5 min read</p>
                              </div>
                          </div>
                      </div>
                      <div class="post-card-divider"></div>
                      <h3 class="post-title">
                          <a href="blog-details.html">The Top 10 Destinations You Should Visit In 2022</a>
                      </h3>
                      <div class="post-content">
                          <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, laborem consectectur, adipisci velit, sed quia non numquam eius modi temporadew incisdunt ut labore et dolore magnam aliquam Excepteur sint occaecat cupidatat non proident, sunt in culpa qui offici deserunt mollit anim id est enim ad minim veniam, quis nostrud exercitation ullam co labr is nisi ut aliquip ex Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo con. Duis aute irure dolor in reprehenderit in voluptate velitesse cillum dolore eu fugiat nulla pariatu sint occaecat cupidatat non proident, sunt in culpa</p>
                          <div class="post-gallery-columns-2">
                              <div class="post-gallery-item">
                                  <img src="images/blog-detail/image-2.jpg" alt="image">
                              </div>
                              <div class="post-gallery-item">
                                  <img src="images/blog-detail/image-3.jpg" alt="image">
                              </div>
                          </div>

                          <div class="list-item-wrapper">
                              <ul>
                                  <li>Sunt in culpa qui officia deserunt mollit</li>
                                  <li>Lorem ipsum dolor sit amet, consecte</li>
                                  <li>Sed do eiusmod tempor incidi secte</li>
                              </ul>
                          </div>
                          <blockquote>
                              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo con consequatu ea commodo con Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                              <footer>
                                  <span class="name">Arlene McCoy</span>
                                  <img src="images/icon/quote.png" alt="quote">
                              </footer>
                          </blockquote>
                      </div>
                       <div class="post-card-divider"></div>
                      <div class="single-post-meta">
                          <div class="blog-post-tag">
                              <!-- <span>TAGS</span> -->
                              <div class="post-tag-list">
                                  <a href="#">Branding</a>
                                  <a href="#">User interface</a>
                              </div>
                          </div>
                          <div class="social-share">
                              <!-- <span class="social-share-title">SHARE</span> -->
                              <a class="facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a class="linkedin" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                          </div>
                      </div>
                  </div>
              </article>

              <!-- Post Author Start -->
              <div class="author-info">
                  <div class="author-thumb">
                      <a href="#">
                          <img alt="author" src="images/user/image-7.png" class="avatar avatar-190 photo media-object" height="165" width="165">
                      </a>
                  </div>
                  <div class="author-text">
                      <div class="title-wrapper">
                          <div class="title">
                              <h3><a href="#">Arlene McCoy</a></h3>
                              <span class="designation">Chief Advisor</span>
                          </div>
                          <div class="author-social-profiles">
                              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a href="#"><i class="fa-brands fa-youtube"></i></a>
                          </div>
                      </div>
                      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id es conse quatu ea commodo con quis nostrud</p>
                  </div>
              </div>
              <!-- Post Author End -->

              <div class="blog-post-nav">
                  <div class="post-navigation">
                      <div class="post-img">
                          <img src="images/blog/image-1.jpg" alt="post image">
                      </div>
                      <div class="text">
                          <span><i class="fa-solid fa-angle-left"></i> Prev Post</span>
                          <h4><a href="#" rel="prev">Adventure is worthwhile in itself.</a> </h4>
                      </div>
                  </div>
                  <div class="divider"></div>
                  <div class="post-navigation">
                      <div class="post-img">
                          <img src="images/blog/image-2.jpg" alt="post image">
                      </div>
                      <div class="text">
                          <span>Next Post <i class="fa-solid fa-angle-right"></i></span>
                          <h4><a href="#" rel="next">Adventure is worthwhile in itself.</a> </h4>
                      </div>
                  </div>
              </div>
              
              <!-- Comment List Start -->
              <div class="post-comments">
                  <div class="blog-coment-title">
                      <h2>111 Comments Found</h2>
                  </div>
                  <div class="latest-comments">
                      <ul>
                          <li class="comment">
                              <div class="comments-box">
                                  <div class="comments-avatar">
                                      <img src="images/user/image.jpg" alt="Commenter Author" height="96" width="96">
                                  </div>
                                  <div class="comments-text">
                                      <div class="avatar-name">
                                          <h5><a href="#">Peter Parker</a></h5>
                                          <span>April, 14, 2023 at 1.22 am</span>
                                          <a href="#" class="comment-reply-link">Reply</a>
                                      </div>
                                      <p>Kobita  toami ki korbo re et dolore magnam aliquam quaerat volupta por incididu nt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc itation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                  </div>
                              </div>
                          </li>
                          <li class="comment depth-1">
                              <div class="comments-box">
                                  <div class="comments-avatar">
                                      <img src="images/user/image-2.jpg" alt="Commenter Author" height="96" width="96">
                                  </div>
                                  <div class="comments-text">
                                      <div class="avatar-name">
                                          <h5><a href="#">Peter Parker</a></h5>
                                          <span>April, 14, 2023 at 1.22 am</span>
                                          <a href="#" class="comment-reply-link">Reply</a>
                                      </div>
                                      <p>Kobita  toami ki korbo re et dolore magnam aliquam quaerat volupta por incididu nt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc itation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                  </div>
                              </div>
                              <ul class="children">
                                  <li class="comment">
                                      <div class="comments-box">
                                          <div class="comments-avatar">
                                              <img src="images/user/image-3.jpg" alt="Commenter Author" height="96" width="96">
                                          </div>
                                          <div class="comments-text">
                                              <div class="avatar-name">
                                                  <h5><a href="#">Peter Parker</a></h5>
                                                  <span>April, 14, 2023 at 1.22 am</span>
                                                  <a href="#" class="comment-reply-link">Reply</a>
                                              </div>
                                              <p>Kobita  toami ki korbo re et dolore magnam aliquam quaerat volupta por incididu nt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc itation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                          <li class="comment">
                              <div class="comments-box">
                                  <div class="comments-avatar">
                                      <img src="images/user/image-5.jpg" alt="Commenter Author" height="96" width="96">
                                  </div>
                                  <div class="comments-text">
                                      <div class="avatar-name">
                                          <h5><a href="#">Peter Parker</a></h5>
                                          <span>April, 14, 2023 at 1.22 am</span>
                                          <a href="#" class="comment-reply-link">Reply</a>
                                      </div>
                                      <p>Kobita  toami ki korbo re et dolore magnam aliquam quaerat volupta por incididu nt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc itation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- Comment List End -->

               <!-- Comment Form Start -->
              <div class="post-comments-form">
                  <div class="post-comments-title">
                      <h3 class="title">Leave a reply</h3>
                  </div>
                  <div class="comment-respond">
                      <form action="#" method="post" class="comment-form">
                          <div class="row g-4">
                              <div class="col-xl-6">
                                  <div class="contacts-name">
                                      <label>Full name</label>
                                      <input name="author" type="text" placeholder="Enter your name">
                                  </div>
                              </div>
                              <div class="col-xl-6">
                                  <div class="contacts-email">
                                      <label>Email</label>
                                      <input name="email" type="text" placeholder="Enter your email">
                                  </div>
                              </div>
                              <div class="col-xl-12">
                                  <div class="contacts-message">
                                      <label>Your comment</label>
                                      <textarea name="comment" cols="20" rows="3" placeholder="Enter Your Comments"></textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <button class="theme-btn" type="submit">
                                      <span class="swip">
                                          <span class="title-wrapper">
                                              <span class="title-1">Submit now</span>
                                          </span>
                                      </span>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <!-- Comment Form End -->

              <!-- Post Details End -->
          </div>
          <!-- Blog Sidebar Start -->
          <div class="col-lg-5 order-1 order-lg-2">
              <div class="sidebar">
                  <div class="widget widget_search">
                      <!-- <div class="widget-title-box">
                          <h4 class="wp-block-heading">Search</h4>
                      </div> -->
                      <form class="search-form" action="#" method="get">
                          <input type="text" placeholder="Search..">
                      </form>
                      <button type="submit"><i class="icon-search"></i></button>
                  </div>
                  <div class="widget widget_latest_post">
                      <div class="widget-title-box">
                          <h4 class="wp-block-heading">Recent Posts</h4>
                      </div>
                      <ul>
                          <li>
                              <div class="latest-post-thumb">
                                  <img src="images/blog/recent-post/image-5.jpg" alt="Latest Post">
                              </div>
                              <div class="latest-post-desc">
                                  <h3 class="latest-post-title">
                                      <a href="blog-details.html">The Top 10 Destinations You Should Visit In 2022</a>
                                  </h3>
                                  <span class="latest-post-meta">April 22, 2022</span>
                              </div>
                          </li>
                          <li>
                              <div class="latest-post-thumb">
                                  <img src="images/blog/recent-post/image-6.jpg" alt="Latest Post">
                              </div>
                              <div class="latest-post-desc">
                                  <h3 class="latest-post-title">
                                      <a href="blog-details.html">The Top 10 Destinations You Should Visit In 2022</a>
                                  </h3>
                                  <span class="latest-post-meta">April 22, 2022</span>
                              </div>
                          </li>
                          <li>
                              <div class="latest-post-thumb">
                                  <img src="images/blog/recent-post/image-7.jpg" alt="Latest Post">
                              </div>
                              <div class="latest-post-desc">
                                  <h3 class="latest-post-title">
                                      <a href="blog-details.html">The Top 10 Destinations You Should Visit In 2022</a>
                                  </h3>
                                  <span class="latest-post-meta">April 22, 2022</span>
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="widget widget_categories">
                      <div class="widget-title-box">
                          <h4 class="wp-block-heading">Categories</h4>
                      </div>
                      <ul>
                          <li><a href="#">Adventure</a>(<span>1</span>)</li>
                          <li><a href="#">Hiking</a>(<span>3</span>)</li>
                          <li><a href="#">Culture</a>(<span>2</span>)</li>
                          <li><a href="#">Uncategorized</a>(<span>4</span>)</li>
                      </ul>
                  </div>
                  <div class="widget widget_tag_cloud">
                      <div class="widget-title-box">
                          <h4 class="wp-block-heading">Tags</h4>
                      </div>
                      <div class="tagcloud">
                          <a href="#">Travel</a>
                          <a href="#">Adventure</a>
                          <a href="#">Tour</a>
                          <a href="#">Mountain</a>
                          <a href="#">Family</a>
                          <a href="#">People</a>
                          <a href="#">Sports</a>
                          <a href="#">Hiking</a>
                          <a href="#">Swimming</a>
                          <a href="#">River</a>
                          <a href="#">Explore</a>
                          <a href="#">Autumn</a>
                      </div>
                  </div>
                  <div class="widget widget_instagram_feed">
                      <div class="widget-title-box">
                          <h4 class="wp-block-heading">Gallery</h4>
                      </div>
                      <div class="widget-instagram-feed">
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-8.jpg" alt="instagram photo">
                          </div>
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-9.jpg" alt="instagram photo">
                          </div>
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-10.jpg" alt="instagram photo">
                          </div>
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-11.jpg" alt="instagram photo">
                          </div>
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-12.jpg" alt="instagram photo">
                          </div>
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-13.jpg" alt="instagram photo">
                          </div>
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-14.jpg" alt="instagram photo">
                          </div>
                          <div class="single-instagram-feed">
                              <img src="images/blog/gallery/image-15.jpg" alt="instagram photo">
                          </div>
                      </div>
                  </div>
                  <div class="widget widget_social_profile">
                      <div class="widget-title-box">
                          <h4 class="wp-block-heading">Social</h4>
                      </div>
                      <div class="social-profile">
                          <a class="facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                          <a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                          <a class="linkedin" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                          <a class="instagram" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Blog Sidebar Start -->
      </div>
  </div>
</div>
@endsection