<?php


class AdminProductController extends AdminBase
{



    public function actionIndex()
    {
        self::checkAdmin();

        $productsList = Product::getProductsList();

        include_once ROOT.'/views/admin/product/index.php';
        return true;
    }


    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {

            Product::deleteProductById($id);

            header("Location: /admin/product");
        }

        include_once ROOT.'/views/admin/product/delete.php';
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        $categoryList = Category::getCategotyListAll();
        $brandList = Brand::getBrandListAll();

        if (isset($_POST['submit'])) {
            $good['name'] = $_POST['name'];
            $good['code'] = $_POST['code'];
            $good['price'] = $_POST['price'];
            $good['category_id'] = $_POST['catefory_id'];
            $good['brand_id'] = $_POST['brand_id'];
            $good['description'] = $_POST['description'];
            $good['availability'] = $_POST['availability'];
            $good['if_new'] = $_POST['if_new'];
            $good['if_recomended'] = $_POST['if_recomended'];
            $good['status'] = $_POST['status'];

            $errorMassage = false;

            if ((!isset($good['name'])) || empty($good['name'])) {
                $errorMassage[] = 'Заполните имя товара';
            }

            if ($errorMassage == false) {

                $id = Product::createProduct($good);
                

                if ($id) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
                    }

                };

                header("Location: /admin/product");

            }
        }


        include_once ROOT.'/views/admin/product/create.php';
        return true;
    }


    public function actionUpdate($id)
    {
        self::checkAdmin();

        $categoryList = Category::getCategotyListAll();
        $brandList = Brand::getBrandListAll();

        $product = Product::getProductById($id);

        if (isset($_POST['submit'])) {
            $good['name'] = $_POST['name'];
            $good['code'] = $_POST['code'];
            $good['price'] = $_POST['price'];
            $good['category_id'] = $_POST['catefory_id'];
            $good['brand_id'] = $_POST['brand_id'];
            $good['description'] = $_POST['description'];
            $good['availability'] = $_POST['availability'];
            $good['if_new'] = $_POST['if_new'];
            $good['if_recomended'] = $_POST['if_recomended'];
            $good['status'] = $_POST['status'];

            if (Product::updateProductById($id, $good)) {


                if ($id) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
                    }

                };

            
                header("Location: /admin/product");
            }
        }



        include_once ROOT.'/views/admin/product/update.php';
        return true;
    }
}
