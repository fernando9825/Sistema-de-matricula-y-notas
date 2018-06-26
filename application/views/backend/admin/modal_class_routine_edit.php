<?php 
$edit_data		=	$this->db->get_where('class_routine' , array('class_routine_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_student');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/class_routine/do_update/'.$row['class_routine_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                
	
                <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Hora Inicio</label>
                        
						<div class="col-sm-3">
							<input type="number" value=<?php echo "'".$row['time_start']."'"; ?> min="0" max="23" placeholder="Hora" class="form-control" name="time_start" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
                        </div>
                        <div class="col-sm-3">
							<input type="number" value=<?php echo "'".$row['time_start_min']."'"; ?> min="0" max="59"  placeholder="Minutos" class="form-control" name="time_start_min" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
						</div>
                    </div>
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Hora Fin</label>
                        
						<div class="col-sm-3">
							<input type="number" value=<?php echo "'".$row['time_end']."'"; ?> min="0" max="23" placeholder="Hora" class="form-control" name="time_end" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
                        </div>
                        <div class="col-sm-3">
							<input type="number" value=<?php echo "'".$row['time_end_min']."'"; ?> min="0" max="59"  placeholder="Minutos" class="form-control" name="time_end_min" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
						</div>
                    </div>
                    

                    <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
		                    <div class="col-sm-5">
		                        <select name="day" class="form-control">

                                    <?php 
                                    
                                        $dias = array(
                                            "lunes",
                                            "martes",
                                            "miercoles",
                                            "jueves",
                                            "viernes"
                                        );

                                        foreach ($dias as $dia) {
                                        
                                            if($dia == $row['day']){
                                                echo "<option selected value='".$dia."'>".$dia."</option>";
                                            }else{
                                                echo "<option value='".$dia."'>".$dia."</option>";
                                            }

                                          
                                        }       

                                    ?>

			                    </select>
			                </div>
					</div>
    
                
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                        
						<div class="col-sm-5">
							<select name="class_id" class="form-control" data-validate="required" id="class_id" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_class_sections(this.value, ".$row['subject_id'] .")">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
									$classes = $this->db->get('class')->result_array();
									foreach($classes as $row2):
										?>
                                		<option value="<?php echo $row2['class_id'];?>"
                                        	<?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>
													<?php echo $row2['name'];?>
                                                </option>
	                                <?php
									endforeach;
								  ?>
                          </select>
						</div> 
                    </div>
                    
                    <div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
			                    <div class="col-sm-5">
			                        <select name="subject_id" class="form-control" id="section_selector_holder">
			                            <option value=""><?php echo get_phrase('select_class_first');?></option>
				                    </select>
				                </div>
						</div>

                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_class_routine');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>

<script type="text/javascript">

	function get_class_sections(class_id, subject_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_subject/' + class_id +"/"+subject_id,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

    var class_id = $("#class_id").val();
    var subject_id = <?php echo $edit_data[0]['subject_id']; ?>
    
    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_subject/' + class_id+"/"+subject_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });


</script>