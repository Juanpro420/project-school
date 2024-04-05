<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="punto.css">
    <title>Factura</title>
    <link rel="icon" type="image/jpeg" href="logo.jpeg">
</head>
<body>
<header>
        <div class="overlay">
            <div class="logotipo">
          <a href="index.php"> <img src="logo.jpeg" alt="" class="images" width="8%" border-radius="30px"></a> 
            </div>
            <nav>
                <ul><a href="index.php">Inicio</a> </ul>
                <ul><a href="servicio.php">Servicios</a></ul>
                <ul><a href="promociones.php">Promociones</a></ul>
                <ul><a href="puntoventa.php">Punto de Venta</a></ul>
            </nav>
        </div>
</div>
    </header>
<div class="todo">
    <h2>Paquetes:</h2>
    <div>


        <label class="custom-checkbox"><input name="dummy" type="checkbox" class="paquete" data-precio="350"><span class="checkmark"></span> Básico $350</label><br>
        <label class="custom-checkbox"> <input name="dummy" type="checkbox" class="paquete" data-precio="480"><span class="checkmark"></span> Súper $480</label><br>
        <label class="custom-checkbox"> <input name="dummy" type="checkbox" class="paquete" data-precio="890"><span class="checkmark"></span> Astro $890</label><br>
        <label class="custom-checkbox"> <input name="dummy" type="checkbox" class="paquete" data-precio="1200"><span class="checkmark"></span> Deluxe $1200</label>
    </div>

    <h2>Subtotal: $<span id="subtotal">0</span></h2>
  <h2>IVA: $<span id="iva">0</span></h2>
  <h2>Total: $ <span id=totalto>0</span></h2>
<button onclick="window.print()">Imprimir Factura</button>

<?php
if(isset($_POST['calcular'])){
    $subtotal = 0;
    $iva = 0;
    $total = 0;
    $totalto = 0;
    if(isset($_POST['paquete'])){
        foreach($_POST['paquete'] as $precio){
            $subtotal += $precio;
        }
        $iva = $subtotal * 0.16;
        $total = $subtotal + $iva;
        $totalto = $total;
        echo "<script>
        document.getElementById('subtotal').textContent = $subtotal.toFixed(2);
        document.getElementById('iva').textContent = $iva.toFixed(2);
        document.getElementById('total').textContent = $total.toFixed(2);
        document.getElementById('totalto').textContent = $totalto.toFixed(2);
        </script>";
    }
}
?>

<script>
const checkboxes = document.querySelectorAll('.paquete');
const subtotalElement = document.getElementById('subtotal');
const ivaElement = document.getElementById('iva'); // Elemento para mostrar solo el IVA
const totalele = document.getElementById('totalto');
let subtotal = 0;
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const precio = parseInt(this.getAttribute('data-pr'));
        if (this.checked) {
            subtotal += precio;
        } else {
            subtotal -= precio;
        }
        subtotalElement.textContent = subtotal;
        // Calcular y mostrar solo el IVA
        const iva = subtotal * 0.16;
        ivaElement.textContent = iva.toFixed(2);

        totalele.textContent = (parseFloat(ivaElement.textContent) + parseFloat(subtotalElement.textContent)).toFixed(2);
    });
});
</script>
  
</div>
</body>

</html>