<?php

class ProductModel{

    public $products = array();
    public $newProducts = array();
    public $oldProducts = array();
    public $SearchProducts = array();
    public $detailProducts = array();
    public $categoryProducts = array();    

    public function __construct(){
        $sql = mysql_query("SELECT * FROM `products`");
        while($row = mysql_fetch_assoc($sql)){
            $this->products[] = $row;
        }        
    }
    public function getProducts(){
        return $this->products;
    }

    public function getNewProducts(){        
        $sql = mysql_query("SELECT * FROM `products` WHERE `special`= 'new'");        
        while($row = mysql_fetch_assoc($sql)){
            $this->newProducts[] = $row;
        }        
        return $this->newProducts;
    }

    public function getOldProducts(){
     
        $sql = mysql_query( "SELECT * FROM `products` WHERE `special`= 'old' ORDER BY `price`");
        
        while($row = mysql_fetch_assoc($sql)){
            $this->oldProducts[] = $row;
        }        
        return $this->oldProducts;
    }

    public function getSearchItems($search){
        $search = strip_tags($search);
        $search = str_ireplace(array("'",'-','"',';'), '', $search);
        $search = "'%" . $search . "%'";
        
        $sql =  mysql_query("SELECT * FROM `products` WHERE `product_id` LIKE $search OR `description` LIKE $search OR `title` LIKE $search ORDER BY `title`");
       
        while($row = mysql_fetch_assoc($sql)){
            $this->SearchProducts[] = $row;
        }
        
        return $this->SearchProducts;

    }

    public function getDetailsById($id){        
        $sql = mysql_query("SELECT * FROM `products` WHERE `product_id`= '$id'");       
        while($row = mysql_fetch_assoc($sql)){
            $this->detailProducts[] = $row;
        }       
        return $this->detailProducts;
    }

    public function getProductByCategory($category){        
        $sql =mysql_query("SELECT * FROM `products` WHERE `category`= '$category'");        
        while($row = mysql_fetch_assoc($sql)){
            $this->categoryProducts[] = $row;
        }        
        return $this->categoryProducts;
    }    
}