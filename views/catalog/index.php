<?php require ROOT.'/views/layouts/header.php'; ?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Каталог</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <ul class="category-menu">
                        <?php foreach ($category as $categoryName): ?>
                            <a href="/category/<?php echo $categoryName['id'] ?>">
                                <li>
                                    <?php echo $categoryName['name']?>
                                </li>
                            </a>
                        <?php endforeach ?>
                    </ul>
                </div>
                 <div class="col-md-10">
                    <?php foreach ($productList as $product): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                 <a href="/product/<?php echo $product['id']?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt="<?php echo $product['name']?>"></a>
                            </div>
                            <h2><a href="/product/<?php echo $product['id']?>"><?php echo $product['name']?></a></h2>
                            <div class="product-carousel-price">
                                <ins><?php echo $product['price']?> &#8381</ins> <del>999.00 &#8381</del>
                            </div>     
                            <div class="product-option-shop">
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/cart/add/<?php echo $product['id'] ?>">В корзину</a>
                            </div>                       
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                            </nav>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require ROOT.'/views/layouts/footer.php'; ?>