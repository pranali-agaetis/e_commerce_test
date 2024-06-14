<?php 
use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
 

Breadcrumbs::for('Product', function ($trail,$product) {
    $trail->parent('Product',$product->name);
    $trail->push($product->name, url('view-product/1'));
});

 
// Breadcrumbs::for('product', function ($trail, $product){
//     $trail->parent('product',$product->name);
//     $trail->push($product->name, route('product.show', $product));
// });
?>