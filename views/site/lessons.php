<?php

  $success = true;

  foreach ($model as $item) {
      foreach ($item['lessonPlans'] as $lessonPlan) {
          if ($lessonPlan['is_done'] != 1) {
              $success = false; 
              break;
          }
      }

      if(empty($item['lessonPlans'])){
        $success = false;

      }
  }

?>

<div id="app">
  <?php if($success === true) {  ?>
<div class="success"> Курс пройден</div>

<?php } else { ?>
  <div class="success"> Курс не пройден</div>
<?php } ?>

<div class="row flex-column lessons">
<?php  foreach ($model as $model_item) : ?>
      <div class="d-flex col-6 lessons__item">
        <div> 
          <a href="/lessons/<?=$model_item['id']?>"><?=$model_item['title'];?></a> 
        </div>
        <div><?=$model_item['description'];?></div>
        <? $check = $model_item['lessonPlans'][0]['is_done'] ?? 0;   ?>
        <?php if($check == 1) { ?>
           <div class="check"><image src="assets/check.png"/></div>
           <?php } else if($check == 0) {  ?>
            <div class="check"></div>
          <?php  }?>
      </div>
<?php  endforeach ; ?>
        </div>
</div>

<style>
  .check {
    width: 20px;
    height: 20px;
  }
  .check img{
    width: 100%;
    height: 100%;
  }
  .lessons__item > div {
    margin: 1rem 2rem 0px 0px;
  }

</style>