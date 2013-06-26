<?php foreach ($image_tb as $images_tb_item): ?>   
<div class="image-box">
         <div class="holder">
         <div class="photo-cover"> <a href="./assets/images/<?php echo $images_tb_item['image'] ?>"rel="lightbox" >
         <img src="./assets/images/<?php echo $images_tb_item['image'] ?>" width="169" height="110"></a> </div>
         <p class="photo-name">Title: <?php echo $images_tb_item['title'] ?></br>
Category Name:<?php echo $images_tb_item['category_name'] ?></br> Name:<?php echo $images_tb_item['first_name'] ?></p> </br>
         </div>
         </div>
<?php endforeach ?>
<p><?php echo $links; ?></p>
