<style>
<?php $rgb = implode(', ', sscanf($theme['color'], "#%02x%02x%02x")); ?>
#content {
  background: #fff; /* Old browsers */
  background: -moz-linear-gradient(-45deg, rgba(<?php echo $rgb; ?>, 1) 0px, rgba(255,255,255,1) 100px); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, right bottom, color-stop(0px, rgba(<?php echo $rgb; ?>, 1)), color-stop(100px,rgba(255,255,255,1))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(-45deg, rgba(<?php echo $rgb; ?>, 1) 0px, rgba(255,255,255,1) 100px); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(-45deg, rgba(<?php echo $rgb; ?>, 1) 0px, rgba(255,255,255,1) 100px); /* Opera 11.10+ */
  background: -ms-linear-gradient(-45deg, rgba(<?php echo $rgb; ?>, 1) 0px, rgba(255,255,255,1) 100px); /* IE10+ */
  background: linear-gradient(135deg, rgba(<?php echo $rgb; ?>, 1) 0px, rgba(255,255,255,1) 100px); /* W3C */
}
</style>

<!--snippet:doc-->