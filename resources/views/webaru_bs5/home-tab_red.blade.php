@extends('webaru_bs5/layout_index')

@section('content')

<div class="container">
    <div class="row mt-2 mb-3">
        <div class="col-lg-12 col-md-12">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ url('2025-01-07-142426.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ url('2024-10-28-161502.gif') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
                </div>
            </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="single-choose-us choose-bg-light-blue">
                <div class="choose-img">
                    <img class="animated" src="{{ url('glaxdu') }}/assets/img/icon-img/service-1.png" alt="">
                </div>
                <div class="choose-content">
                    <h3>คณะครุศาสตร์</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="single-choose-us choose-bg-yellow">
                <div class="choose-img">
                    <img class="animated" src="{{ url('glaxdu') }}/assets/img/icon-img/service-3.png" alt="">
                </div>
                <div class="choose-content" >
                    <h3>คณะมนุษยศาสตร์และสังคมศาสตร์</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="single-choose-us choose-bg-blue">
                <div class="choose-img">
                    <img class="animated" src="{{ url('glaxdu') }}/assets/img/icon-img/service-3.png" alt="">
                </div>
                <div class="choose-content">
                    <h3>คณะวิทยาศาสตร์และเทคโนโลยี</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="single-choose-us choose-bg-green">
                <div class="choose-img">
                    <img class="animated" src="{{ url('glaxdu') }}/assets/img/icon-img/service-4.png" alt="">
                </div>
                <div class="choose-content">
                    <h3>คณะวิทยาการจัดการ</h3>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    nav > .nav.nav-tabs{

border: none;
  color:#fff;
  background:#272e38;
  border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
border: none;
  padding: 18px 25px;
  color:#fff;
  background:#272e38;
  border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
{
content: "";
position: relative;
bottom: -60px;
left: -10%;
border: 15px solid transparent;
border-top-color: #e74c3c ;
}
.tab-content{
background: #fdfdfd;
  line-height: 25px;
  border: 0px solid #ddd;
  border-top:5px solid #e74c3c;
  border-bottom:5px solid #e74c3c;
  padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
border: none;
  background: #e74c3c;
  color:#fff;
  border-radius:0;
  transition:background 0.20s linear;
}
</style>

<div class="popular-product-area pb-100 mt-50">
    <div class="container">
        <div class="section-title mb-20">
            <h2><span>ประกาศ</span> มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
        </div>
        <div class="row">
            <div class="col-xs-12 ">
              <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                  <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                  <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
                </div>
              </nav>
              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                  Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
              </div>

            </div>
          </div>

          <div class="row"></div>
    </div>
  </div>
    </div>
</div>

{{-- <div class="popular-product-area pb-100 mt-50">
    <div class="container">
        <div class="section-title mb-20">
            <h2><span>ประกาศ</span> มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
              <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
          </div>
        <div class="admission-tab-list tab-list-2 nav pb-50">
            <a class="active" href="#course-categorie-1" data-bs-toggle="tab" >
                <h4>all </h4>
            </a>
            <a href="#course-categorie-2" data-bs-toggle="tab">
                <h4> ข่าวสารนักศึกษาภาคปกติ </h4>
            </a>
            <a href="#course-categorie-3" data-bs-toggle="tab">
                <h4>ข่าวสารนักศึกษาภาคพิเศษ </h4>
            </a>
            <a href="#course-categorie-4" data-bs-toggle="tab">
                <h4>สมัครงาน </h4>
            </a>
        </div>
        <div class="tab-content jump">
            <div class="tab-pane active" id="course-categorie-1">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-5.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Awesome vase</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$60</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-6.jpg" alt=""></a>
                                <span>Sale</span>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Ceramic vase</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-7.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Smart Watch</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-8.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">History Book</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="course-categorie-2">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-8.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-7.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-6.jpg" alt=""></a>
                                <span>Sale</span>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$60</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-5.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$70</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="course-categorie-3">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-7.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$80</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-8.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$90</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-6.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-5.jpg" alt=""></a>
                                <span>Sale</span>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="course-categorie-4">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-6.jpg" alt=""></a>
                                <span>Sale</span>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-5.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-8.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$60</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-wrap mb-30">
                            <div class="product-img">
                                <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-7.jpg" alt=""></a>
                                <div class="product-action">
                                    <ul>
                                        <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                        <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="pro-title-rating-wrap">
                                    <div class="product-title">
                                        <h3><a href="single-product.html">Color Box</a></h3>
                                    </div>
                                    <div class="product-rating">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                    </div>
                                </div>
                                <div class="pro-category-price">
                                    <span class="pro-category">Drawing</span>
                                    <span class="pro-price">$70</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="best-sale-area pt-60 pb-50">
    <div class="container">
        <div class="section-title mb-10">
            <h2>Best <span>Sale</span></h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-wrap mb-30">
                    <div class="product-img">
                        <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-1.jpg" alt=""></a>
                        <span>Sale</span>
                        <div class="product-action">
                            <ul>
                                <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="pro-title-rating-wrap">
                            <div class="product-title">
                                <h3><a href="single-product.html">Marker Pen</a></h3>
                            </div>
                            <div class="product-rating">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                            </div>
                        </div>
                        <div class="pro-category-price">
                            <span class="pro-category">Drawing</span>
                            <span class="pro-price">$10</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-wrap mb-30">
                    <div class="product-img">
                        <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-9.jpg" alt=""></a>
                        <div class="product-action">
                            <ul>
                                <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="pro-title-rating-wrap">
                            <div class="product-title">
                                <h3><a href="single-product.html">History Book</a></h3>
                            </div>
                            <div class="product-rating">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                            </div>
                        </div>
                        <div class="pro-category-price">
                            <span class="pro-category">Drawing</span>
                            <span class="pro-price">$10</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-wrap mb-30">
                    <div class="product-img">
                        <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-10.jpg" alt=""></a>
                        <span>Sale</span>
                        <div class="product-action">
                            <ul>
                                <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="pro-title-rating-wrap">
                            <div class="product-title">
                                <h3><a href="single-product.html">Softball Gloves</a></h3>
                            </div>
                            <div class="product-rating">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                            </div>
                        </div>
                        <div class="pro-category-price">
                            <span class="pro-category">Drawing</span>
                            <span class="pro-price">$10</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product-wrap mb-30">
                    <div class="product-img">
                        <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-11.jpg" alt=""></a>
                        <div class="product-action">
                            <ul>
                                <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                                <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                                <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="pro-title-rating-wrap">
                            <div class="product-title">
                                <h3><a href="single-product.html">Skating Shoes</a></h3>
                            </div>
                            <div class="product-rating">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                            </div>
                        </div>
                        <div class="pro-category-price">
                            <span class="pro-category">Drawing</span>
                            <span class="pro-price">$10</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="banner-area pt-130 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30">
                    <div class="banner-img">
                        <a href="#"><img src="{{ url('glaxdu') }}/assets/img/banner/book-1.png" alt=""></a>
                    </div>
                    <div class="banner-content">
                        <h5>Adventure</h5>
                        <h2>BOOK 2018</h2>
                        <div class="banner-shape">
                            <img src="{{ url('glaxdu') }}/assets/img/icon-img/banner-shape.png" alt="">
                        </div>
                        <div class="banner-btn">
                            <a class="default-btn" href="#">ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-banner second-banner mb-30">
                    <div class="banner-img">
                        <a href="#"><img src="{{ url('glaxdu') }}/assets/img/banner/book-2.png" alt=""></a>
                    </div>
                    <div class="banner-content">
                        <h5>Adventure</h5>
                        <h2>BOOK 2018</h2>
                        <div class="banner-shape">
                            <img src="{{ url('glaxdu') }}/assets/img/icon-img/banner-shape.png" alt="">
                        </div>
                        <div class="banner-btn">
                            <a class="default-btn" href="#">ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30">
                    <div class="banner-img">
                        <a href="#"><img src="{{ url('glaxdu') }}/assets/img/banner/book-3.png" alt=""></a>
                    </div>
                    <div class="banner-content">
                        <h5>Adventure</h5>
                        <h2>BOOK 2018</h2>
                        <div class="banner-shape">
                            <img src="{{ url('glaxdu') }}/assets/img/icon-img/banner-shape.png" alt="">
                        </div>
                        <div class="banner-btn">
                            <a class="default-btn" href="#">ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}




{{-- <div class="producta-area pb-130">
    <div class="container">
        <div class="section-title mb-75 mrg-bottom-small">
            <h2>New <span>ITA</span></h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="producta-active">
            <div class="product-wrap">
                <div class="product-img">
                    <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-1.jpg" alt=""></a>
                    <span>Sale</span>
                    <div class="product-action">
                        <ul>
                            <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                            <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                            <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                            <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="pro-title-rating-wrap">
                        <div class="product-title">
                            <h3><a href="single-product.html">Marker Pen</a></h3>
                        </div>
                        <div class="product-rating">
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                        </div>
                    </div>
                    <div class="pro-category-price">
                        <span class="pro-category">Drawing</span>
                        <span class="pro-price">$10</span>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                <div class="product-img">
                    <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-2.jpg" alt=""></a>
                    <div class="product-action">
                        <ul>
                            <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                            <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                            <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                            <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="pro-title-rating-wrap">
                        <div class="product-title">
                            <h3><a href="single-product.html">Color Pencil</a></h3>
                        </div>
                        <div class="product-rating">
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                        </div>
                    </div>
                    <div class="pro-category-price">
                        <span class="pro-category">Drawing</span>
                        <span class="pro-price">$20</span>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                <div class="product-img">
                    <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-3.jpg" alt=""></a>
                    <span>Sale</span>
                    <div class="product-action">
                        <ul>
                            <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                            <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                            <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                            <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="pro-title-rating-wrap">
                        <div class="product-title">
                            <h3><a href="single-product.html">Color Box</a></h3>
                        </div>
                        <div class="product-rating">
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                        </div>
                    </div>
                    <div class="pro-category-price">
                        <span class="pro-category">Drawing</span>
                        <span class="pro-price">$30</span>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                <div class="product-img">
                    <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-4.jpg" alt=""></a>
                    <div class="product-action">
                        <ul>
                            <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                            <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                            <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                            <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="pro-title-rating-wrap">
                        <div class="product-title">
                            <h3><a href="single-product.html">Toy mobile</a></h3>
                        </div>
                        <div class="product-rating">
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                        </div>
                    </div>
                    <div class="pro-category-price">
                        <span class="pro-category">Drawing</span>
                        <span class="pro-price">$40</span>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                <div class="product-img">
                    <a href="single-product.html"><img src="{{ url('glaxdu') }}/assets/img/product/pro-2.jpg" alt=""></a>
                    <span>Sale</span>
                    <div class="product-action">
                        <ul>
                            <li><a title="Add To Cart" href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                            <li><a title="Compare" href="#"><i class="fa fa-random"></i></a></li>
                            <li><a title="Wishlist" href="#"><i class="fa fa-heart-o"></i></a></li>
                            <li><a title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="pro-title-rating-wrap">
                        <div class="product-title">
                            <h3><a href="single-product.html">Color Pencil</a></h3>
                        </div>
                        <div class="product-rating">
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                            <i class="zmdi zmdi-star"></i>
                        </div>
                    </div>
                    <div class="pro-category-price">
                        <span class="pro-category">Drawing</span>
                        <span class="pro-price">$50</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



{{-- <div class="discount-area bg-img pt-110 pb-90" style="background-image:url({{ url('glaxdu') }}/assets/img/bg/bg-7.jpg);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-5">
                <div class="discount-img-wrap mr-60">
                    <img src="assets/img/banner/book-4.png" alt="">
                    <div class="discount-img-content-wrap">
                        <img src="assets/img/banner/discount.png" alt="">
                        <div class="discount-img-content">
                            <h5>50%</h5>
                            <span>DISCOUNT</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="discount-content">
                    <h4>Buy Now !</h4>
                    <h2>Stock <span>Limited</span></h2>
                    <div class="discount-btn">
                        <a class="default-btn" href="#">ADD TO CART</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- bannaer-area -->
<div class="brand-logo-area pb-130">
    <div class="container">
        <div class="brand-logo-active owl-carousel">
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/1.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/2.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/3.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/4.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/5.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/6.png" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ url('glaxdu') }}/assets/img/brand-logo/2.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- bannaer-area-end -->
@endsection
