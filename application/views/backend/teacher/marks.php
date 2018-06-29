


<script
  src="jquery3.min.js"></script>
<link rel="stylesheet" href="bulma.min.css">
<script>
function seccion(idd){
    $.post("index.php?notas/secciones",{id: idd},
      function( data ) {
      console.log(data)
      $('.seccion').html(data)
      $(".seccion_cont").show()
  })
  if($(".materia_cont").is(":visible")){
    materia($('.materia').val())
  }
  if($(".alumno_cont").is(":visible")){
    alumno($('.class').val(), $('.seccion').val())
  }
}
function materia(idd){
    $.post("index.php?notas/materias",{id: idd},
      function( data ) {
      console.log(data)
      $('.materia').html(data)
      $(".materia_cont").show()
  })
  if($(".alumno_cont").is(":visible")){
    alumno($('.class').val(), $('.seccion').val())
  }
}
function alumno(id_c, id_s){
    $.post("index.php?notas/alumnos",{id_c: id_c, id_s : id_s},
      function( data ) {
      console.log(data)
      $('.alumno').html(data)
      $(".alumno_cont").show()
  })
}

function insertarNota(){
  console.log($(".nota").val())
  console.log($(".alumno").val())
  console.log($(".materia").val())
  console.log($(".class").val())
  console.log($(".trimestre").val())
if($(".nota").val() && $(".alumno").val() && $(".materia").val() && $(".class").val() && $(".trimestre").val()){
  $.post("index.php?notas/insertarNota",{
      student_id: $(".alumno").val(),
      subject_id: $(".materia").val(),
      class_id: $(".class").val(),
      exam_id: $(".trimestre").val(),
      mark_obtained: $(".nota").val(),
      comment: $(".comment").val()
  },
      function( data ) {
      console.log(data)
      document.querySelector(".alumno").selectedIndex = 0
      $(".mimodal").show()
      setTimeout(() => {
        $(".mimodal").fadeOut(2000)
      }, 700)
     
  })
}
else{
  alert("todo los campos son necesarios")
}
}
</script>
<div class="section">
  <div class="column is-offset-3 is-half">
  
 
    <div class="help" >
    Grado
  </div>
    <div class="select is-black">
      <select class="class" onchange = "seccion(this.value)">
        <script>
        document.write(`
        <?php
          $query = $this->db->query("select * from class where teacher_id = ". $this->session->userdata('teacher_id'));
          echo ' <option value="">Selecciona una opcion</option>';
          foreach ($query->result() as $row)
            {
                   echo '<option value="'.$row->class_id.'">'.$row->name.'</option>';
            }
        ?>
        `)
        </script>
      </select>
    </div>

    <div class="seccion_cont" style="display: none">
    <div class="help" style="margin-top: 1rem">
    Seccion
  </div>
    <div class="select is-black">
      <select class="seccion"  onchange = "materia($('.class').val())">
      
      </select>
    </div>
    </div>

 
    <div class="materia_cont" style="display: none">
    <div class="help" style="margin-top: 1rem">
    Materia
  </div>
    <div class="select is-black">
      <select class="materia"  onchange = "alumno($('.class').val(), $('.seccion').val())">
      
      </select>
    </div>
    </div>
  <div class="alumno_cont" style="display: none">

 <div class="help" style="margin-top: 1rem">
    Trimestre
  </div>
  <div class="select is-black">
      <select class="trimestre">
      <option value="">Selecciona una opcion</option>
        <option value="1">Primero</option>
        <option value="2">Segundo</option>
        <option value="3">Tercero</option>
        
      </select>
    </div>

  <div class="help" style="margin-top: 1rem">
    Alumno
  </div>
  <div class="select is-black">
      <select class="alumno">
        
      </select>
    </div>
    <div class="help" style="margin-top: 1rem">
    Nota a asignar
  </div>
  <input type="text" placeholder="Nota a asignar" class="nota input is-black is-radiusless">

  <div class="help" style="margin-top: 1rem">
    Comentarios
  </div>
  <input type="text" placeholder="Nota a asignar" class="comment input is-black is-radiusless">
  <div class="section has-text-centered" style="padding: 1rem">
<button onclick="insertarNota()" class="button is-dark is-focused is-radiusless">
    Asignar
  </button>
</div>
  </div>
  

  <div class="hero is-success mimodal" style="margin-top: 2rem; display: none">
            <div class="hero-body">
              <div class="subtitle">
              Notas agregadas
              </div>
            </div>
  </div>

</div>
</div>
