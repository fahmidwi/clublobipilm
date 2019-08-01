<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/frontend/css/css//magnific-popup.css');?>">
<style type="text/css">
 .gallery * {
  padding: 1%;
}

.gallery-images {
  display: grid;
  grid-gap: 30px 20px;
  grid-template-columns: auto;
  grid-auto-flow: dense;
}

@media (min-width: 600px) and (max-width: 1099px) {
    .gallery-images {
      display: grid;
      grid-gap: 30px 20px;
      grid-template-columns: repeat(auto-fill,minmax(calc(50% - 20px), 1fr));
      grid-auto-flow: dense;
  }
}

@media (min-width: 1100px) {
  .gallery-images {
    display: grid;
    grid-gap: 30px 20px;
    grid-template-columns: repeat(auto-fill,minmax(calc(25% - 20px), 1fr));
    grid-auto-flow: dense;
  }
}

.gallery-image {
  display: block;
  width: 100%;
  grid-column-end: span 1;
  grid-row-end: span 1;
  position: relative;
  transform: scale(1, 1);
  transition: transform .125s ease;
  &:hover:not(.gallery-image__preview) {
    transform: scale(1.02, 1.02);
  }
}

.gallery-image__crop {
  display: block;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.gallery-image__media {
  display: block;
  height: 100%;
  width: 100%;
  object-fit: cover;
}

.gallery-image__caption {
  display: none;
}


@media (min-width: 600px) and (max-width: 1099px) {
  .gallery-image__preview {
    display: block;
    grid-column-end: span 2;
    grid-row-end: span 2;
  }
}

@media (min-width: 1100px) {
  .gallery-image__preview {
    display: block;
    grid-column-end: span 4;
    grid-row-end: span 4;
  }
}


.gallery-image__preview .gallery-image__caption {
  display: block;
  font-family: "Inter UI", "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
  position: absolute;
  right: 0;
  bottom: 0;
  padding: 8px 14px;
  color: white;
  background: hsla(0, 0%, 20%, .9);
  text-align: justify;
}
</style>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
<section class="gallery"><br><br><br>
  <center><h2 class="gallery-title">tidak ada foto untuk kategori Indiefest</h2>
  <img src="<?php echo base_url('assets/frontend/img/tidakadafoto.png'); ?>" width="25%" height="25%;" style="margin-top: -6%;"></center>
</section>
  <!-- /Section: about -->
  <!-- FOOTER -->
<?php $this->load->view('include/footer.php'); ?>
  <script src="<?php echo base_url('lib/frontend/js/jquery.magnific-popup.min.js'); ?>"></script>
  <script src="<?php echo base_url('lib/frontend/js/main.js'); ?>"></script>

</body>
<script type="text/javascript">
document.addEventListener('click', function (event) {
  console.log(event.target.parentElement.parentElement);
  if (event.target.parentElement.parentElement.matches('.gallery-image__preview')) {
    event.target.parentElement.parentElement.classList.remove('gallery-image__preview');
    event.target.parentElement.parentElement.scrollIntoView();
  } else if (event.target.matches('.gallery-image__media')) {
    // Remove any existing preview classes
    var previewing = document.getElementsByClassName('gallery-image__preview');
    for (el of previewing) {
      el.classList.remove('gallery-image__preview');
    }
        // Preview the clicked figure
    event.target.parentElement.parentElement.classList.add('gallery-image__preview');
    event.target.parentElement.parentElement.scrollIntoView();
    }
}, false);

</script>

</html>
