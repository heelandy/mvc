<?php require RUTA_APP . '/view/inc/header.php'; ?>
<p><?php echo $dato['titulo']; ?></p>
<ul>
   <?php foreach($dato['articulo'] as $articulo): ?>
     <li><?php echo $articulo->titulo;?></li>
   <?php endforeach;?>
</ul>
<?php require RUTA_APP . '/view/inc/footer.php'; ?>
