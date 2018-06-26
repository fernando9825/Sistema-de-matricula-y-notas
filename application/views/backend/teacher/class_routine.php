<?php

  $id = 1;

  if($this->session->userdata('login_type') == "teacher"){
    $id = $this->session->userdata('teacher_id');
  }

  

  $clases = $this->db->get_where("class", array("teacher_id" => $id));
  

  $subjects = $this->db->get_where("subject", array("teacher_id" => $id));

  echo $subjects->result()[8]->name;

?>
	<!-- Contenedor -->
	<ul id="accordion" class="accordion">
    
    <?php
      $i = 0;
      $c = "";
      foreach ($clases->result() as $row):
        if($i == 0){
          $c = "default open";
        }else{
          $c = "";
        }
    ?>

      <li <?php echo "class='".$c."'"; ?> >
        <div class="link"><i class="fa fa-clock-o"></i><?php echo $row->name; ?><i class="fa fa-chevron-down"></i></div>
        
        <div class="submenu">
          <?php
            $this->db->select('*');

            $this->db->from('class_routine');
            $this->db->where('class_routine.class_id', $row->class_id); 
            $this->db->order_by('time_start', 'ASC');    

            $query = $this->db->get();

            //echo json_encode($query->result());        
          ?>

          <table class="table table-hover">
            <thead>
              <tr>
                <th><b>Día</b></th>
              </tr>
            </thead>
            <tbody>
            <?php

              $lunes = "<tr><th><b>Lunes</b></th>";
              $martes = "<tr><th><b>Martes</b></th>";
              $miercoles = "<tr><th><b>Miercoles</b></th>";
              $jueves = "<tr><th><b>Jueves</b></th>";
              $viernes = "<tr><th><b>Viernes</b></th>";

              foreach ($query->result() as $tr):


                $materia = $this->db->get_where('subject', array('subject_id' => $tr->subject_id, 'teacher_id' => $id, 'class_id' => $row->class_id), 1);
                
                $n = $materia->num_rows();
                $materia = $materia->result();
                //echo json_encode(count($materia));
                
                if($n > 0){
                  switch ($tr->day) {
                    case 'lunes':
                      $tmp_data = "<td><span class='badge'><b>".$materia[0]->name."</b>  (". $tr->time_start.":".$tr->time_start_min."-".$tr->time_end.":".$tr->time_end_min.")</span></td>";
                      $lunes.=$tmp_data;
                      $tmp_data = "";
                      break;
                    case 'martes':
                      $tmp_data = "<td><span class='badge'><b>".$materia[0]->name."</b>  (". $tr->time_start.":".$tr->time_start_min."-".$tr->time_end.":".$tr->time_end_min.")</span></td>";
                      $martes.=$tmp_data;
                      $tmp_data = "";
                      break;
                    
                    case 'miercoles':
                      $tmp_data = "<td><span class='badge'><b>".$materia[0]->name."</b>  (". $tr->time_start.":".$tr->time_start_min."-".$tr->time_end.":".$tr->time_end_min.")</span></td>";
                      $miercoles.=$tmp_data;
                      $tmp_data = "";
                      break;
  
                    case 'jueves':
                      $tmp_data = "<td><span class='badge'><b>".$materia[0]->name."</b>  (". $tr->time_start.":".$tr->time_start_min."-".$tr->time_end.":".$tr->time_end_min.")</span></td>";
                      $jueves.=$tmp_data;
                      $tmp_data = "";
                      break;
  
                    case 'viernes':
                      $tmp_data = "<td><span class='badge'><b>".$materia[0]->name."</b>  (". $tr->time_start.":".$tr->time_start_min."-".$tr->time_end.":".$tr->time_end_min.")</span></td>";
                      $viernes.=$tmp_data;
                      $tmp_data = "";
                      break;
                    
                    default:
                      # code...
                      break;
                  }
                }
        

                

              endforeach;

              $lunes.= "</tr>";
              $martes.= "</tr>";
              $miercoles.= "</tr>";
              $jueves.= "</tr>";
              $viernes.= "</tr>";

              echo $lunes;
              echo $martes;
              echo $miercoles;
              echo $jueves;
              echo $viernes;

            ?>
            </tbody>
          </table>



        </div>
      
    </li>
    
    <?php
        $i = $i + 1;
      endforeach;
    ?>
    
	</ul>


<style>


* {
	margin: 0;
	padding: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

body {
	background: #2d2c41;
	font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
}

ul {
	list-style-type: none;
}

a {
	color: #b63b4d;
	text-decoration: none;
}

/** =======================
 * Contenedor Principal
 ===========================*/
h1 {
 	color: #FFF;
 	font-size: 24px;
 	font-weight: 400;
 	text-align: center;
 	margin-top: 80px;
 }

h1 a {
 	color: #c12c42;
 	font-size: 16px;
 }

 .accordion {
 	width: 100%;
 	max-width: 100%;
 	margin: 30px auto 20px;
 	background: #FFF;
 	-webkit-border-radius: 4px;
 	-moz-border-radius: 4px;
 	border-radius: 4px;
 }

.accordion .link {
	cursor: pointer;
	display: block;
	padding: 15px 15px 15px 42px;
	color: #4D4D4D;
	font-size: 14px;
	font-weight: 700;
	border-bottom: 1px solid #CCC;
	position: relative;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li:last-child .link {
	border-bottom: 0;
}

.accordion li i {
	position: absolute;
	top: 16px;
	left: 12px;
	font-size: 18px;
	color: #595959;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.accordion li i.fa-chevron-down {
	right: 12px;
	left: auto;
	font-size: 16px;
}

.accordion li.open .link {
	color: #084184;/*#b63b4d;*/
}

.accordion li.open i {
	color: #084184;/*#b63b4d;*/
}
.accordion li.open i.fa-chevron-down {
	-webkit-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	transform: rotate(180deg);
}

.badge{
  background: #084184;
  color: white;
}

.accordion li.default .submenu {display: block;}
/**
 * Submenu
 -----------------------------*/
 /*.submenu {
 	display: none;
 	background: #e1e1e1;
 	font-size: 14px;
 }

 .submenu li {
 	border-bottom: 1px solid #4b4a5e;
 }

 .submenu a {
 	display: block;
 	text-decoration: none;
 	color: #d9d9d9;
 	padding: 12px;
 	padding-left: 42px;
 	-webkit-transition: all 0.25s ease;
 	-o-transition: all 0.25s ease;
 	transition: all 0.25s ease;
 }

 .submenu a:hover {
 	background: #b63b4d;
 	color: #FFF;
 }*/

</style>


<script>

 $(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});

</script>