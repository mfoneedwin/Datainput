<?php


class Prod{
	public function displayProduct($page, $productPerPage,$products,$max){
		global $user_data;
		$offset = $page * $productPerPage;
		$output='';
		for ($x=0;$x<$productPerPage;$x++){
			if($x+$offset >=$max)
				break;
				if (isset($products[$x + $offset]['title'])){
				$link = 'detail.php?id=' .$products[$x + $offset]['product_id'].'&category=' .$products[$x + $offset]['category'];
				$url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";				
								
				$link2 = 'addcart.php?id=' .$products[$x + $offset]['product_id'].'&url='.$url;
				$link3 = 'removeproduct.php?id=' .$products[$x + $offset]['product_id'].'&url='.$url;
				$output .='<div class="col-md-3 col-sm-6 col-xs-12">';
				$output .='				<div class="product clearfix">';
				if ($products[$x + $offset]['special'] == 'new')
					$output .='					<div class="ribbon new"></div>';
				elseif ($products[$x + $offset]['special'] == 'old')
					$output .='					<div class="ribbon sale"></div>';
				$output .='					<div class="product-image">';
		        $output .='                        <a href="'.$link.'"><img src="'.$products[$x + $offset]['image1'].'" height="370" width="586" alt=""></a>';
		        $output .='                        <a href="'.$link.'">';
		        if($products[$x]['image2'])	
		        		$output .=' <img src="'.$products[$x + $offset]['image2'].'"  height="370" width="586"  alt="">';
		        $output .='			</a>';

		        $output .='                        <div class="product-overlay">';
		        if(!logged_in()){
		        $output .='                            <a href="javascript:alert(\'Sorry, you need to be logged in to use this function.\');"  class="add-to-cart"><i class="fa fa-cart-plus"></i></a>';
		        }else{
		        $output .='                            <a href="'.$link2.'" class="add-to-cart"><i class="fa fa-cart-plus"></i></a>';
		        }
		        $output .='                            <a href="'.$link.'" class="add-to-cart" ><i class="fa fa-search"></i></a>';
		        $output .='                        </div>';
		        $output .='                    </div>';
		        $output .='                    <div class="product-desc">';
		        $output .='                    	<div class="editContent">';
		        $output .='                        	<h3><a href="'.$link.'">'.$products[$x + $offset]['title'].'</a></h3>';
		        $output .='                    	</div>';
		        $output .='                    	<div class="editContent">';
				$output .='							<h4>';
				if($products[$x + $offset]['old_price']!=0)
					$output .= sprintf('<del>%d 元</del>',$products[$x + $offset]['old_price']);
				$output .='			'.$products[$x + $offset]['price'].' 元</h4>';
		        $output .='                    	</div>';
		        if($user_data['admin']==1){
		        $output .='                    <div class="editContent"> <a href="'.$link3.'" style="color: red; font-weight:bold; font-size: 20px;"> Delete this product </a></div>    ';
		    	}

		        $output .='                    </div>';
				$output .='				</div>';
				$output .='			</div>';
				} else
				break;
			}
		return $output;
	}

	public function displayDetailProduct($products){
		$output='';
		for ($x=0;$x<8;$x++){
			if (isset($products[$x]['title'])){


		switch ($products[$x]['category']) {
    	case 'ladies wear':
    		$title = 'products.php?category=ladies+wear';
    		break;
    	case 'bags':
    		$title = 'products.php?category=bags';
    		break;
    	case 'caps':
    		$title = 'products.php?category=caps';
    		break;
    	case 'jackets':
    		$title = 'products.php?category=jackets';
    		break;
    	case 'sunglasses':
    		$title = 'products.php?category=sunglasses';
    		break;
    	case 'shirts':
    		$title = 'products.php?category=shirts';
    		break;
    	case 'shoes':
    		$title = 'products.php?category=shoes';
    		break;
    	case 'decor':
    		$title = 'products.php?category=decor';
    		break;
    	case 'phones':
    		$title = 'products.php?category=phones';
    		break;
    	case 'computer':
    		$title = 'products.php?category=computer';
    		break;
    	case 'printers':
    		$title = 'products.php?category=printers';
    		break;
    	case 'cameras':
    		$title = 'products.php?category=cameras';
    		break;
    	case 'tv':
    		$title = 'products.php?category=tv';
    		break;
    	case 'household':
    		$title = 'products.php?category=household';
    		break;
    	case 'books':
    		$title = 'products.php?category=books';
    		break;
    	case 'drinks':
    		$title = 'products.php?category=drinks';
    		break;
    	case 'food':
    		$title = 'products.php?category=drinks';
    		break;
    	case 'vehicule':
    		$title = 'products.php?category=vehicule';
    		break;
    	case 'others':
    		$title = 'products.php?category=others';
    		break;
    	case 'chinese specials':
    		$title = 'products.php?category=chinese+specials';
    		break;
    	default:
    		$title = 'index.php';
    		break;
    }	
    	$url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$output .='<div class="col-md-9"><div class="row">	<div class="col-md-6">';
		if ($products[$x]['special'] == 'new')
			$output .='					<div class="ribbon new"></div>';
		elseif ($products[$x]['special'] == 'old')
			$output .='					<div class="ribbon sale"></div>';
		$output .='					<div class="product-image">';
	    $output .='                        <a href="#"><img src="'.$products[$x]['image1'].'" height="540"  alt=""></a>';
	    $output .='                        <a href="#">';
        if($products[$x]['image2'])	
        		$output .=' <img src="'.$products[$x]['image2'].'"  height="540"   alt="">';
        $output .='			</a>';

	    $output .='                    </div></div><div class="col-md-6"><div class="product-desc"><div class="editContent">';
        $output .='                        	<h1>'.$products[$x]['title'].'</h1>';
		$output .='						</div><div class="editContent">';
        // $output .='                        	<h2>'.$products[$x]['price'].'</h2>';
        $output .='							<h2>';
		if($products[$x]['old_price']!=0)
			$output .= sprintf('<del>%d  元  </del>&nbsp;&nbsp;&nbsp;',$products[$x]['old_price']);
		$output .='			'.$products[$x]['price'].' 元</h2>';
		$output .='						</div><form class="form-inline" action="addcart.php" method="GET"><div class="form-group"><label class="" for="exampleInputAmount">Quantity: &nbsp;&nbsp;</label>';
		$output .='								<input name="qty"  type="number" style="width: 50px; padding: 3px; height: 30px" min="1" value="1"> ';
		$output .='							</div><br><button type="submit" class="btn btn-primary">Add to Cart</button><input type="hidden" name="id" value="'.$products[$x]['product_id'].'"><input type="hidden" name="url" value="'.$url.'"></form>';
		$output .='                        <div class="editContent">';
	    $output .='                        	<p>'.$products[$x]['description'].'</p>';
	    $output .='                        </div><ul class="fa-ul">';
	    $output .='                        	<li><i class="fa-li fa fa-chevron-right"></i>30-Day Return Policy</li>';
	    $output .='                        </ul><hr><ul class="fa-ul">	 ';                               
	    $output .='                            <li><i class="fa-li fa fa-th-list"></i>Category: <a href="'.$title.'">';
	    $output .= $products[$x]['category'];                               
	    $output .='                       </a></li> </li></ul></div></div></div><div class="more-info-tabs"><ul class="nav nav-tabs text-center" role="tablist" id="myTab">';
		$output .='					<li class="active"><a href="#description1" role="tab" data-toggle="tab">Description</a></li>	';					
		$output .='				</ul><div class="tab-content"><div class="tab-pane fade in active" id="description1">';
		$output .='						<div class="row"><div class="col-xs-10 col-xs-offset-1"><div class="editContent">';
		$output .='									<p>     <img src="'.$products[$x]['image3'].'" class="img-responsive"  alt=""> <br>  <img src="'.$products[$x]['image4'].'" class="img-responsive"  alt=""> <br> <img src="'.$products[$x]['image5'].'" class="img-responsive"  alt=""> </p>';
		$output .='								</div></div></div></div></div></div></div>';
		} else
				break;
			}

		return $output;
	}


	public function displayIndexProduct($products){
		global $user_data;
		$output='';
		for ($x=0;$x<8;$x++){
				if (isset($products[$x]['title'])){
				$link = 'detail.php?id=' .$products[$x]['product_id'].'&category=' .$products[$x]['category'];
				$url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$link2 = 'addcart.php?id=' .$products[$x]['product_id'].'&url='.$url;
				$link3 = 'removeproduct.php?id=' .$products[$x]['product_id'].'&url='.$url;
				$output .='<div class="col-md-3 col-sm-6 col-xs-12">';
				$output .='				<div class="product clearfix">';
				if ($products[$x]['special'] == 'new')
					$output .='					<div class="ribbon new"></div>';
				elseif ($products[$x]['special'] == 'old')
					$output .='					<div class="ribbon sale"></div>';
				$output .='					<div class="product-image">';
		        $output .='                        <a href="'.$link.'"><img src="'.$products[$x]['image1'].'"   height="370" width="586"  alt=""></a>';
		        $output .='                        <a href="'.$link.'">';
		        if($products[$x]['image2'])	
		        		$output .=' <img src="'.$products[$x]['image2'].'"  height="370" width="586"  alt="">';
		        $output .='			</a>';
		        $output .='                        <div class="product-overlay">';
		        if(!logged_in()){
		        $output .='                            <a href="javascript:alert(\'Sorry, you need to be logged in to use this function.\');"  class="add-to-cart"><i class="fa fa-cart-plus"></i></a>';
		        }else{
		        $output .='                            <a href="'.$link2.'" class="add-to-cart"><i class="fa fa-cart-plus"></i></a>';
		        }

		        $output .='                            <a href="'.$link.'" class="add-to-cart" ><i class="fa fa-search"></i></a>';
		        $output .='                        </div>';
		        $output .='                    </div>';
		        $output .='                    <div class="product-desc">';
		        $output .='                    	<div class="editContent">';
		        $output .='                        	<h3><a href="'.$link.'">'.$products[$x]['title'].'</a></h3>';
		        $output .='                    	</div>';
		        $output .='                    	<div class="editContent">';
				$output .='							<h4>';
				if($products[$x]['old_price']!=0)
					$output .= sprintf('<del>%d 元</del>',$products[$x]['old_price']);
				$output .='			'.$products[$x]['price'].' 元</h4>';
		        $output .='                    	</div>';
		         if($user_data['admin']==1){
		        $output .='                    <div class="editContent"> <a href="'.$link3.'" style="color: red; font-weight:bold; font-size: 20px;"> Delete this product </a></div>    ';
		    	}
		        $output .='                        ';
		        $output .='                    </div>';
				$output .='				</div>';
				$output .='			</div>';
			} else
				break;
			}
		return $output;
	}

	public function displaySidebarProducts($products){
		$output='';
		for ($x=0;$x<4;$x++){
				if (isset($products[$x]['title'])){
					$link = 'detail.php?id=' .$products[$x]['product_id'].'&category=' .$products[$x]['category'];
					$output .='  <div class="sml-item">';
			        $output .='                        <div class="entry-image">';
			        $output .='                            <a href="'.$link.'"><img src="'.$products[$x]['image1'].'" height="63" alt=""></a>';
			        $output .='                        </div>';
			        $output .='                        <div class="editContent">';
			        $output .='                        	<h4><a href="'.$link.'">'.$products[$x]['title'].'</a></h4>';
			        $output .='                        </div>';
			        $output .='                        <div class="editContent">';
			        $output .='							<h5>';
			        if($products[$x]['old_price']!=0)
						$output .= sprintf('<del>%d 元</del>&nbsp;&nbsp;',$products[$x]['old_price']);
			        $output .= $products[$x]['price'].'  元</h5>';
			        $output .='                        </div> ';               
			        $output .='                    </div>';
			        } else
				break;
			}

        return $output;
	}
}