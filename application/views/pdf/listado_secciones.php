<html>
  <head>
      <link rel="stylesheet" type="text/css" href="./assets/css/listado_secciones.css">
  </head>

<body>

  <header>
      <table>
          <tr>
              <td id="header_logo">
                  <img id="logo" src="./uploads/logo.png">
              </td>
              <td id="header_texto">
                  <div>CENTRO ESCOLAR SAGRADO CORAZÓN</div>
                  <div><?php echo $grado; ?></div>
              </td>

              <td id="header_logos">
                  <img id="logo1" src="./uploads/mined.png">
              </td>
          </tr>
      </table>
  </header>
  <footer>
      <div id="footer_texto">Derechos reservados</div>
  </footer>

  <table id="table_info">
       <thead>
           <tr>
               <th id="th_i">NIE</th>
               <th id="th_i">Nombre</th>
               <th id="th_i">Sexo</th>
               <th id="th_i">Dirección</th>
               <th id="th_i">Correo</th>
               <th id="th_i">Encargado</th>
           </tr>
       </thead>
       <tbody>
          <?php foreach ($estudiantes as $estudiante) { ?>
            <tr>
                <td id="td_i"><?php echo $estudiante->roll;?></td>
                <td id="td_i"><?php echo $estudiante->name;?></td>
                <td id="td_i"><?php echo $estudiante->sex;?></td>
                <td id="td_i"><?php echo $estudiante->address;?></td>
                <td id="td_i"><?php echo $estudiante->email;?></td>
                <td id="td_i"><?php echo $estudiante->mother_name;?></td>
            </tr>
          <?php  }?>
       </tbody>
</table>



</body>
</html>
