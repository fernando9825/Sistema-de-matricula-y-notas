<link rel="stylesheet" href="bulma.min.css">
<div class="section notas">

</div>
<script>
window.onload = ()=>{
	$.post("index.php?notas/getSMaterias",{student_id: <?php echo $this->session->userdata('student_id') ?>},
      function( data ) {
      console.log(data)
      $('.notas').html(data)
  }).done(()=>{
	document.querySelector("h3").style.display= "none"
  })

  console.log(<?php echo $this->session->userdata('student_id') ?>)
  
}

</script>
