
<div class="modal fade" id="login_idle" data-backdrop="static" keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">       
        <div class="modal-body text-center">
            <p>Your session has been idle over it's time limit. Please login again</p>
            <?php echo $this->Html->link('Ok', array('action' => 'logout'), array('class' => 'btn btn-success btn-sm')); ?>
        </div>
    </div>
  </div> 
</div>

<?php

echo $this->Js->buffer('
    $(document).ready( function(){
        $("#login_idle").appendTo("body").modal("show");
    });    
');

?>