<?php

 if(!empty($user_image)){
     echo $this->Html->image($user_image, array('class' => 'user-image'));
 }else{
    // echo $this->Html->image('1.jpg', array('class' => 'user-image'));
    echo '<span class="user-dash-pics"></span>';
 }

