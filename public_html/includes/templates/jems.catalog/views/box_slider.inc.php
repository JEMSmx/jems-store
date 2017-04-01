<?php $detect = new Mobile_Detect; ?>
<?php if ($detect->isMobile()){ ?>
<div class="k-workspace">
  <div class="k-wrap" role="toolbar">
    <section  id="slider">
  <?php foreach($slides as $number=>$slide) {  ?>
    <div id="<?php echo $number ?>" style="background-image: url(<?php echo (empty($slide['image_mobile'])) ? $slide['image']:$slide['image_mobile']; ?>)"><a href="<?php echo htmlspecialchars($slide['link']) ?>"><span class="sr-only"><?php echo $slide['caption'] ?></span></a></div>
  <?php } ?>
</section>
  </div>
</div>
<?php }else{ ?>
<div class="k-workspace">
  <div class="k-wrap" role="toolbar">
    <section  id="slider">
  <?php foreach($slides as $number=>$slide) {  ?>
    <div id="<?php echo $number ?>" style="background-image: url(<?php echo $slide['image'] ?>)"><a href="<?php echo htmlspecialchars($slide['link']) ?>"><span class="sr-only"><?php echo $slide['caption'] ?></span></a></div>
  <?php } ?>
</section>
  </div>
</div>
<?php } ?>