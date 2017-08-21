<?php
/**
* 
*/


class CartView
{
	
	public function displayCart($products){
		// global $user_data;
		$nb = count($products);		

		$output='';
		for ($x=0;$x<$nb;$x++){
			if (isset($products[$x]['title'])){
			$link = 'detail.php?id=' .$products[$x]['product_id'].'&category=' .$products[$x]['category'];
			$url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$link2 = 'delete-cart.php?id=' .$products[$x]['product_id'].'&url='.$url;
			$output .='<tr>	';						
			$output .='					<td><div class="entry-image">';
		    $output .='                               <a href="'.$link.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		    $output .='                               <img src="'.$products[$x]['image1'].'" height="63" alt=""></a>';
		    $output .='                     </div></td>';
			$output .='					<td><a href="'.$link.'">'.$products[$x]['title'].'</a></td>	';						
			$output .='					<td>'.$products[$x]['price'].' 元</td>';
			$output .='					<td>'.$products[$x]['quantity'].'</td>';			
			$output .='					<td><strong>'.$products[$x]['sale_price'].' 元</strong></td>';
			$output .='					<td>';
			$output .='						<a href="'.$link2.'" class="remove" title="Remove this item" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>';
			$output .='					</td>';
			$output .='				</tr>';
			} else
				break;
		}
	
		return $output;
	}

	public function displayTotal($products){
		
		$nb = count($products);		
		$total = 0;
		for ($x=0;$x<$nb;$x++){
			if (isset($products[$x]['title'])){
			$total = $total + $products[$x]['sale_price'];
			} else
				break;
		}
	
		return $total;
	}
}