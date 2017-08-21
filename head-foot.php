<?php

	include 'databaseConnect/init.php';

	class Head{

		public function displayHead(){
			global $user_data;
			$products = get_user_cart();
			
			$user_id = (int) $_COOKIE['user_id'];			
			$output = '';
			$output .= '<div class="copyright-bar-2 ">';
	        $output .= '    <div class="container ">';
	        $output .= '        <div class="editContent">';
	        $output .= '            <div class="row mytop">';
	        $output .= '                <div class="col-md-2 col-lg-2" style="text-align:center !important;">';
	        $output .= '                <div class="dropdown dropdown-lg">';
	        $output .= '                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">SEARCH</a>';                        
	        $output .= '                    <div class="dropdown-menu " role="menu">';
	        $output .= '                        <form class="form-horizontal has-warning" role="form" action="search.php" method="GET">' ;
	        $output .= '                            <div class="form-group">     ';                                   
	        $output .= '                                <input name="search" class="form-control" type="text" placeholder="Search" />';
	        $output .= '                            </div>                                    ';
	        $output .= '                            <button type="submit"  class="btn btn-custom btn-block">Submit</button>';
	        $output .= '                        </form>';
	        $output .= '                    </div>';
	        $output .= '                </div>    ';                    
	        $output .= '                </div>';
	        if(!logged_in())
	        	$output .= '                <div class="col-md-1 col-lg-1 col-md-offset-7 col-lg-offset-7" style="text-align:right !important;"><a href="login.php">LOGIN</a></div>';
	        elseif(!$user_data['admin']==1){
		        $output .= '                <div class="col-md-1 col-lg-1 col-md-offset-6 col-lg-offset-6" style="text-align:right !important;"><a href="logout.php">LOGOUT</a></div>';
		        $output .= '                <div class="col-md-1 col-lg-1 " style="text-align:right !important;"><a href="profile.php">PROFILE</a></div>';
		    }elseif ($user_data['admin']==1) {
		    	$output .= '                <div class="col-md-1 col-lg-1 col-md-offset-5 col-lg-offset-5" style="text-align:right !important;"><a href="logout.php">LOGOUT</a></div>';
		        $output .= '                <div class="col-md-1 col-lg-1 " style="text-align:right !important;"><a href="admin.php">ADMIN</a></div>';
		        $output .= '                <div class="col-md-1 col-lg-1 " style="text-align:right !important;"><a href="profile.php">PROFILE</a></div>';
		    }
	        $output .= '                <div class="col-md-2 col-lg-2" style="text-align:left !important;">';
	        if(logged_in()){
		        $output .= '                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">CART <span class="badge">'.get_cart_number($user_id).'</span></a>';
		        $output .= '                        <ul class="dropdown-menu dropdown-cart" role="menu">';

		        for ($x=0;$x<get_cart_number($user_id);$x++){
		        	if (isset($products[$x]['title'])){
		        	$url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		        	$link2 = 'delete-cart.php?id=' .$products[$x]['product_id'].'&url='.$url;
			        $link = 'detail.php?id=' .$products[$x]['product_id'].'&category=' .$products[$x]['category'];
		            $output .= '                          <li>';
			        $output .= '                              <span class="item">';
			        $output .= '                                <span class="item-left">';
			        $output .= '                                    <a href="'.$link.'"><img src="'.$products[$x]['image1'].'" height="63" alt="" /></a>';
			        $output .= '                                    <span class="item-info">';		        
			        $output .= '                                        <a href="'.$link.'">'.$products[$x]['title'].'</a>';		    
			        $output .= '                                        <span>'.$products[$x]['price'].' 元</span>';
			        $output .= '                                        <span>Quantity: '.$products[$x]['quantity'].'</span>';
			        $output .= '                                    </span>';
			        $output .= '                                </span>';
			        $output .= '                                <span class="item-right">';
			        $output .= '                                    <a href="'.$link2.'" class="btn btn-xs btn-danger pull-right">x</a>';
			        $output .= '                                </span>';
			        $output .= '                            </span>';
			        $output .= '                          </li>';
			        $output .= '                          <li class="divider"></li>';
			        } else
						break;
		   		}

		        $output .= '                            <li><a class="text-center" href="cart.php">View Cart</a></li>';
		    } else{
		    	$output .= '                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">CART <span class="badge">0</span></a>';
		        $output .= '                        <ul class="dropdown-menu dropdown-cart" role="menu">';

		    	$output .= '                            <li> <a href="login.php">Please Login or Register to access this content! </a></li>';
		    }



	        $output .= '                          </ul>';
	        $output .= '                </div>';
	        $output .= '            </div>  ';                  
	        $output .= '        </div>';
	        $output .= '    </div>';
	        $output .= '</div>';

	        return $output;
		}

		public function displayNav(){
			$output2='';
			$output2.='<nav class="main-nav ">';
	        $output2.='    <div class="container">  ';              
	        $output2.='        <div class="navbar-header">';
	        $output2.='            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">';
	        $output2.='            <span class="sr-only">Toggle navigation</span>';
	        $output2.='            <span class="icon-bar"></span>';
	        $output2.='            <span class="icon-bar"></span>';
	        $output2.='            <span class="icon-bar"></span>';
	        $output2.='            </button>';
	        $output2.='            <a href="index.php"><img src="images/logo.png" class="brand-img img-responsive"></a> ';                  
	        $output2.='        </div>  ';             
	        $output2.='        <div class="collapse navbar-collapse">';
	        $output2.='            <ul class="nav navbar-nav navbar-right">';
	        $output2.='                <li class="nav-item dropdown">';
	        $output2.='                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">FASHION </a>';
	        $output2.='                    <ul class="dropdown-menu">';
	        $output2.='                        <li><a href="products.php?category=ladies+wear">Ladies wears</a></li>';
	        $output2.='                        <li><a href="products.php?category=bags">Bags</a></li>';
	        $output2.='                        <li><a href="products.php?category=caps">Caps & Hats</a></li>';
	        $output2.='                        <li><a href="products.php?category=jackets">Jackets & Coats</a></li>';
	        $output2.='                        <li><a href="products.php?category=sunglasses">Sunglasses</a></li>';
	        $output2.='                        <li><a href="products.php?category=shirts">Shirts</a></li>';
	        $output2.='                        <li><a href="products.php?category=shoes">Shoes</a></li>';
	        $output2.='                    </ul> '; 
	        $output2.='                </li>';
	        $output2.='                <li class="nav-item ">';
	        $output2.='                <a href="products.php?category=decor">DECOR </a>  ';                       
	        $output2.='                </li>';
	        $output2.='                <li class="nav-item dropdown">';
	        $output2.='                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">ELECTRONICS </a>';
	        $output2.='                    <ul class="dropdown-menu">';
	        $output2.='                        <li><a href="products.php?category=phones">Phones</a></li>';
	        $output2.='                        <li><a href="products.php?category=computer">Computer</a></li>';
	        $output2.='                        <li><a href="products.php?category=printers">Printers</a></li>';
	        $output2.='                        <li><a href="products.php?category=cameras">Cameras</a></li>';
	        $output2.='                        <li><a href="products.php?category=tv">Tv</a></li>';
	        $output2.='                    </ul> ';
	        $output2.='                </li>';
	        $output2.='                <li class="nav-item ">';
	        $output2.='                <a href="products.php?category=household">HOUSEHOLD </a>  ';                          
	        $output2.='                </li>';
	        $output2.='                <li class="nav-item ">';
	        $output2.='                <a  href="products.php?category=books">BOOKS</a> ';                           
	        $output2.='                </li>';
	        $output2.='                <li class="nav-item ">';
	        $output2.='                <a href="products.php?category=drinks">DRINKS</a> ';                          
	        $output2.='                </li>  '; 



	        
	        $output2.='                <li class="nav-item ">';
	        $output2.='                <a href="products.php?category=food">FOOD</a> ';                          
	        $output2.='                </li>  ';        
	        $output2.='                <li class="nav-item ">';
	        $output2.='                <a href="products.php?category=vehicule">VEHICULE</a> ';                          
	        $output2.='                </li>  ';  	        
	        $output2.='                <li class="nav-item dropdown">';
	        $output2.='                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">OTHERS </a>';
	        $output2.='                    <ul class="dropdown-menu">';
	        $output2.='                        <li><a href="products.php?category=chinese+specials">Chinese Specials</a></li>';
	        $output2.='                        <li><a href="products.php?category=others">Others</a></li>';
	        $output2.='                    </ul> ';
	        $output2.='                </li>';

	        $output2.='            </ul>';
	        $output2.='        </div>';
	        $output2.='    </div>';
	        $output2.='</nav>';

	        return $output2;
		}

	

		public function displayFooter(){
			$output='';
			$output .='<section class="content-block-nopad bg-deepocean">';
			$output .='		        <div class="container footer-1-1">';
			$output .='		            <div class="row">     ';     
			$output .='		                <div class="col-sm-5">';
			$output .='		                    <a href="index.php"><img  src="images/logo-white.png" class="brand-img img-responsive"></a>';
			$output .='		                    <div class="editContent">';
			$output .='		                        <h3><strong>Premium</strong> quality products...</h3>';
			$output .='		                    </div>';
			$output .='		                    <div class="editContent">';
			$output .='		                        <p class="lead">Come join us and you will see by yourself!</p>';
			$output .='		                    </div>';
			$output .='		                </div>     ';           
			$output .='		                <div class="col-sm-6 col-sm-offset-1">';
			$output .='		                    <div class="row">';
			$output .='		                        <div class="col-md-4">';
			$output .='		                            <div class="editContent">';
			$output .='		                                <h4>Shortcuts</h4>';
			$output .='		                            </div>';
			$output .='		                            <div class="editContent">';
			$output .='		                                <ul>   ';                                 
			$output .='		                                    <li><a href="about.php">About us</a></li>';
			$output .='		                                    <li><a href="contact.php">Contact</a></li>';
			$output .='		                                    <li><a href="oder.php">How to order</a></li>';                                  
			$output .='		                                </ul>';
			$output .='		                            </div>';
			$output .='		                        </div>';
			$output .='		                        <div class="col-md-4">';
			$output .='		                            <div class="editContent">';
			$output .='		                                <h4>Social media</h4>';
			$output .='		                            </div>';
			$output .='		                            <div class="editContent">';
			$output .='		                                <ul>';
			$output .='		                                    <li><a href="#">Wechat: meiyiguoji</a></li>';
			$output .='		                                    <li><a href="#">QQ: 2433615312</a></li> ';                                   
			$output .='		                                </ul>';
			$output .='		                            </div>';
			$output .='		                        </div>';
			$output .='		                        <div class="col-md-4">';
			$output .='		                            <div class="editContent">';
			$output .='		                                <h4>Any questions?</h4>';
			$output .='		                            </div>';
			$output .='		                            <a href="contact.php" class="btn btn-block btn-primary">Contact us</a>';
			$output .='		                        </div>';
			$output .='		                    </div>';
			$output .='		                </div>       ';     
			$output .='		            </div><!-- /.row -->';
			$output .='		        </div><!-- /.container -->';
			$output .='		    </section>    ';
			$output .='		    <div class="copyright-bar bg-black">';
			$output .='		        <div class="container">';
			$output .='		            <div class="editContent">';
			$output .='		                <p class="pull-left small">© 2015 All Rights Reserved </p>';
			$output .='		            </div>';
			$output .='		            <div class="editContent">';
			$output .='		                <p class="pull-right small">Modern design by CS boys</p>';
			$output .='		            </div>';
			$output .='		        </div>';
			$output .='		    </div>';
			
			return $output;

		}



	}


	?>