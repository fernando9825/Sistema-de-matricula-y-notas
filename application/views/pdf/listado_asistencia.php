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
               <th id="th_i"></th>
               <th id="th_i">Nombre</th>
               <th id="th_i">L</th>
               <th id="th_i">M</th>
               <th id="th_i">X</th>
               <th id="th_i">J</th>
               <th id="th_i">V</th>
               <th id="th_i">L</th>
               <th id="th_i">M</th>
               <th id="th_i">X</th>
               <th id="th_i">J</th>
               <th id="th_i">V</th>
               <th id="th_i">L</th>
               <th id="th_i">M</th>
               <th id="th_i">X</th>
               <th id="th_i">J</th>
               <th id="th_i">V</th>
               <th id="th_i">L</th>
               <th id="th_i">M</th>
               <th id="th_i">X</th>
               <th id="th_i">J</th>
               <th id="th_i">V</th>
           </tr>
       </thead>
       <tbody>
          <?php $i = 1; foreach ($estudiantes as $estudiante) { ?>
            <tr>
                <td id="td_i"><?php echo $i;?></td>
                <td id="td_i"><?php echo $estudiante->name;?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
                <td id="td_i"><?php echo "   "?></td>
            </tr>
          <?php $i = $i + 1; }?>
       </tbody>
</table>



</body>
</html>
