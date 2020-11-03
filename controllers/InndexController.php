<?php
use App\models\Reviews;
use App\service\FileLoader;
use App\service\Validators\RevievValidator;

 function indexAction($smarty){

     $smarty->assign('formError', '');

     if(isset($_POST['sendReview'])){
         $data = (new RevievValidator($_POST))->validate();

         if(isset($data['errors'])) {
             $smarty->assign('formError', $data['errors']);
             $smarty->assign('formData', $_POST);
         }else{
             $reviewId = Reviews::write( $data );
             $smarty->assign('formSuccess', 'Отзыв отправлен на модерацию');

             if(!empty($_FILES['image'])) {
                 FileLoader::loadRewvievImg($_FILES['image'], $reviewId);
             }
         }

     }


     //сортировка отзывов
     if(empty($_SESSION['sortReview'])){
         $_SESSION['sortReview']['field'] = 'created_at';
         $_SESSION['sortReview']['sort'] = 'DESC';
     }

     if(isset($_POST['sortReviewSubmit'])){
         $sortVal = explode('|',$_POST['sortReview']);
         $_SESSION['sortReview']['field'] = $sortVal[0];
         $_SESSION['sortReview']['sort'] = $sortVal[1];
     }
     $smarty->assign('sortReviewSelect', $_SESSION['sortReview']);
     //сортировка отзывов

     $reviews = Reviews::getWidthSort($_SESSION['sortReview']['field'], $_SESSION['sortReview']['sort']);

     $smarty->assign('reviews', $reviews);
     $smarty->assign('pageTitle', 'Amen.team php');
     $smarty->assign('pageDesc', 'Amen.team php');

     loadTemplate($smarty, 'templates/mainAuthTemplate', 'index.tpl');
 }