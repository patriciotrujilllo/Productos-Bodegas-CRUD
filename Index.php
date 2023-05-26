
<!DOCTYPE html>
<html>
<head>
  <title>Página de inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="Index.php?view=bodegas">Bodegas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Index.php?view=productos">Productos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Index.php?view=inventario">Inventario</a>
  </li>
</ul>


<?php
		// Obtener el parámetro de la URL
		$view = isset($_GET['view']) ? $_GET['view'] : '';

		// Cargar la vista correspondiente
		switch ($view) {
			case 'productos':
				require_once('Productos.php');
				break;
      case 'bodegas':
        require_once('Bodegas.php');
        break;
      case 'inventario':
        require_once('Inventario.php');
        break;
			default:
				// Cargar la vista predeterminada si no se proporciona un parámetro
				require_once('Productos.php');
				break;
		}
	?>


  <?php include 'modal/modal.php'; ?>
  


 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
</body>
</html>
