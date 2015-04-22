@extends('layout.main')
@section('content')
<section id="main-content" ng-controller="shopController">
  <section class="wrapper">
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
          <div class="col-md-4" ng-repeat="product in products">
            <section class="panel">
              <div class="pro-img-box">
                <img src="img/product-list/pro-1.jpg" alt=""/>
                <a href="#myModal" data-toggle="modal" class="adtocart" ng-click="submitCart(product)">
                  <i class="fa fa-shopping-cart"></i>
                </a>      
              </div>
              <div class="panel-body text-center">
                <h4>
                  <a href="#" class="pro-title">
                    {[product.description]}
                  </a>
                </h4>
                <p class="price">{[product.price]}</p>
              </div>
              <!-- modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" id="myModal" role="dialog" tabindex="-1" class="modal fade">
                <form action="{{ url('/') }}" method="post">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                    <header class="panel-heading">
                      Add items to your cart
                    </header>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item Description</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="cart in cartData track by $index">
                          <td>{[$index]}</td>
                          <td>{[cart.description]}</td>
                          <td>{[cart.price]}</td>
                          <td>
                            <select ng-options="list.id as list.value for list in listQty" ng-change="updateQty(cart)" ng-model="cart.qty">
                            </select>
                          </td>
                          <td>{[cart.total]}</td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    <div class="modal-footer">
                      <div class="col-lg-5 pull-right">
                        {[netTotal()]}
                        <br>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" class="form-control btn btn-info" value="Checkout">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              </div>
              <!-- end modal -->
            </section>
          </div> 
        </div>
      </div>
    </div>
  </section>
</section>
@endsection