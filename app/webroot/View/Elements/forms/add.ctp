<?php	
	$loguser = $this->requestAction('users/loggeduser');
	if(!empty($class_form) && isset($class_form)){
		$class_form = $class_form;
	}else{
		$class_form = 'default-addedit-form';
	}
	echo '<div class="row" style="margin-top: 5px"><div class="col-md-11"><div class="box box-default color-palette-box">';
		echo '<div class="box-header">';
			echo '<h3 class="box-title">'.$header.'</h3>';
		echo '</div>';
		echo '<div class="box-body table-responsive no-padding">';
			echo '<table class="table" style="border: 0">';
	
				echo $this->Form->create($form, array('enctype' => 'multipart/form-data', 'class' => $class_form, 'onsubmit' => 'return confirm("The system is about to process a certain data, are you sure you want to continue?");'));	
		
				if(!empty($legend)){
					echo '<h4 style="border-bottom: 1px dashed #ccc; border-top: 1px dashed #ccc; padding: 5px 0; margin: 0 20px 10px 20px; color: #666;">'.$legend.'</h4>';	
				}
		
				foreach($fields as $field => $index):
						
						if(!empty($labels)){ 
							$lbls = $labels[$field];
						}else{ 
							$lbls = str_replace('_', ' ', $index);
						}	
						switch($lbls){
							case "ID":
								
							break;
							
							default:
								echo '<tr><td style="width: 200px"><label>' . $lbls . '</label></td>';
						}
						
						
						switch($form){
									
							default: 
								switch($index){
									case "id":
										echo $this->Form->input('id');
									break;
									
									case "newpin":
									case "reenterpin":
									case "pin":
										echo '<td>' . $this->Form->input($index, array('label' => false, 'empty' => true, 'class' => 'form-control input-sm', 'id' => $index, 'autocomplete' => 'off', 'required' => true, 'type' => 'password')) . '</td></tr>';			
									break;
									
									case "card_id":
										echo '<td>' . $this->Form->input($index, array('label' => false, 'class' => 'form-control input-sm', 'id' => $index, 'autocomplete' => 'off', 'required' => true)) . '</td></tr>';			
									break;
									
									case "bday":
										echo '<td><input type="date" name="data['.$form.']['.$index.']" class="form-control input-sm" ></td></tr>';	
									break;
									
									default:
										echo '<td>' . $this->Form->input($index, array('label' => false, 'empty' => true, 'class' => 'form-control input-sm', 'id' => $index, 'autocomplete' => 'off')) . '</td>';			
									break;
								}
							break;
						}	
						
						echo '<td style="width: 30%">&nbsp;</td></tr>';
				endforeach;
			echo '</table>';
		echo '</div>';
		echo '<div class="box-footer clearfix" style="text-align: right">';
			echo $this->Form->submit($endbtn, array('class' => 'btn btn-xs', 'title' => 'Submit all information'));
		echo '</div>';
	echo '</div></div></div>';
?>

<script>
	 $(".select2").select2();
</script>	
