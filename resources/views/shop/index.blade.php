@extends('layout.main')
@section('content')
<section id="main-content" ng-controller="shopController">
  <section class="wrapper">
      <!-- page start-->
      <div class="row">
          <div class="col-md-3">
              <section class="panel">
                  <div class="panel-body">
                      <input type="text" placeholder="Keyword Search" class="form-control">
                  </div>
              </section>
              <section class="panel">
                  <header class="panel-heading">
                      Category
                  </header>
                  <div class="panel-body">
                      <ul class="nav prod-cat">
                          @foreach($prodcat as $pc)
                          <li>
                              <a href="#" class="active"><i class=" fa fa-angle-right"></i> {{$pc->name}}</a>
<!--                               <ul class="nav">
                                  <li class="active"><a href="#">- Shirt</a></li>
                                  <li><a href="#">- Pant</a></li>
                                  <li><a href="#">- Shoes</a></li>
                              </ul> -->
                          </li>
                          @endforeach
                      </ul>
                  </div>
              </section>
              <section class="panel">
                  <header class="panel-heading">
                      Price Range
                  </header>
                  <div class="panel-body sliders">
                      <div id="slider-range" class="slider"></div>
                      <div class="slider-info">
                          <span id="slider-range-amount"></span>
                      </div>
                  </div>
              </section>
              <section class="panel">
                  <header class="panel-heading">
                      Filter
                  </header>
                  <div class="panel-body">
                      <form role="form product-form">
                          <div class="form-group">
                              <label>Brand</label>
                              <select class="form-control">
                                  <option>Wallmart</option>
                                  <option>Catseye</option>
                                  <option>Moonsoon</option>
                                  <option>Textmart</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Color</label>
                              <select class="form-control">
                                  <option>White</option>
                                  <option>Black</option>
                                  <option>Red</option>
                                  <option>Green</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Type</label>
                              <select class="form-control">
                                  <option>Small</option>
                                  <option>Medium</option>
                                  <option>Large</option>
                                  <option>Extra Large</option>
                              </select>
                          </div>
                          <button class="btn btn-primary" type="submit">Filter</button>
                      </form>
                  </div>
              </section>
              <section class="panel">
                  <header class="panel-heading">
                      Best Seller
                  </header>
                  <div class="panel-body">
                      <div class="best-seller">
                          <article class="media">
                              <a class="pull-left thumb p-thumb">
                                  <img src="img/product1.jpg">
                              </a>
                              <div class="media-body">
                                  <a href="#" class=" p-head">Item One Tittle</a>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                              </div>
                          </article>
                          <article class="media">
                              <a class="pull-left thumb p-thumb">
                                  <img src="img/product2.png">
                              </a>
                              <div class="media-body">
                                  <a href="#" class=" p-head">Item Two Tittle</a>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                              </div>
                          </article>
                          <article class="media">
                              <a class="pull-left thumb p-thumb">
                                  <img src="img/product3.png">
                              </a>
                              <div class="media-body">
                                  <a href="#" class=" p-head">Item Three Tittle</a>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                              </div>
                          </article>
                      </div>
                  </div>
              </section>
          </div>
          <div class="col-md-9">
              <section class="panel">
                  <div class="panel-body">
                      <div class="pro-sort">
                          <label class="pro-lab">Sort By</label>
                          <select class="styled" >
                              <option>Default Sorting</option>
                              <option>Popularity</option>
                              <option>Average Rating</option>
                              <option>Newness</option>
                              <option>Price Low to High</option>
                              <option>Price High to Low</option>
                          </select>
                      </div>
                      <div class="pro-sort">
                          <label class="pro-lab">Show</label>
                          <select class="styled" >
                              <option>Result Per Page</option>
                              <option>2 Per Page</option>
                              <option>4 Per Page</option>
                              <option>6 Per Page</option>
                              <option>8 Per Page</option>
                              <option>10 Per Page</option>
                          </select>
                      </div>

                      <div class="pull-right">
                          <ul class="pagination pagination-sm pro-page-list">

                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">»</a></li>
                          </ul>
                      </div>
                  </div>
              </section>
              <div class="row product-list">
                  <div class="col-md-4">
                      <section class="panel">
                          <div class="pro-img-box">
                              <img src="img/product-list/pro-1.jpg" alt=""/>
                              <a href="#" class="adtocart">
                                  <i class="fa fa-shopping-cart"></i>
                              </a>
                          </div>

                          <div class="panel-body text-center" ng-repeat="product in test">
                              <h4>
                                  <a href="#" class="pro-title">
                                      {[product.description]}
                                  </a>
                              </h4>
                              <p class="price">$300.00</p>
                          </div>
                      </section>
                  </div> 
              </div>
          </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->
@endsection