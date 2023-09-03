<?php

$video_index = str_replace('https://www.youtube.com/watch?v=', '', $model['video'] );
$video_url = 'https://www.youtube.com/embed/'.$video_index;

?>

<div id="lesson-page">

      <div class="d-flex flex-column lesson" data-id="<?=$model['id']?>"></div>
        <div> 
          <a href="/lessons/<?=$model['id']?>"><?=$model['title'];?></a> 
        </div>
        <div><?=$model['description'];?></div>
        <div>
          <iframe width="560" height="315" src="<?= $video_url; ?>" frameborder="0" allowfullscreen></iframe>
        </div>

  <lesson />
  
</div>
