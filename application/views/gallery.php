<!DOCTYPE html>
<html lang="en">

<!-- CSS -->
<?php $this->load->view('include/header.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/frontend/css/css//magnific-popup.css');?>">
<style type="text/css">js
  @media only screen and (max-width: 1168px) {
  #sudahdaftar {
    margin-top: 6%;
  }
  #sinopsis{
    margin-top: 300%;
  }
}

.gallery-title
{
    font-size: 36px;
    color: #000;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #000;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #000;
    border-radius: 5px;
    text-align: center;
    color: #000;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #000;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #000;
    transition: 0.3s;

}
.btn-dark:active .filter-button:active
{
    background-color: #000;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}


img{
    height: 200;
}
</style>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Section: about -->
  <section id="about" class="home-section color-dark bg-white" style="margin-top: -10%;">
     <div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
        </div>

        <div align="center">
            <button class="btn btn-dark filter-button active" data-filter="all">All</button>
            <button class="btn btn-dark filter-button" data-filter="Indiefest">Indiefest</button>
            <button class="btn btn-dark filter-button" data-filter="Bioskop">Bioskop Mini</button>
            <button class="btn btn-dark filter-button" data-filter="latihan">latihan Kepemimpinan</button>
            <button class="btn btn-dark filter-button" data-filter="irrigation">Irrigation Pipes</button>
        </div>
        <br/>


            <div class="popup-gallery" id="klikfoto">
                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Indiefest">
                    <a href="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" >
                    <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive"></a>
                </div>
            </div>
            
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Indiefest">
                <a href="<?php echo base_url('assets/frontend/img/slide2.jpg') ?>"><img src="<?php echo base_url('assets/frontend/img/slide2.jpg') ?>" class="img-responsive"></a>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Indiefest">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Bioskop">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Bioskop">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter latihan">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>


            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter latihan">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>


            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter latihan">
                <img src="<?php echo base_url('assets/frontend/img/Indiefest.jpg') ?>" class="img-responsive">
            </div>

        </div>
</div>
  </section>
  <!-- /Section: about -->
  <!-- FOOTER -->
<?php $this->load->view('include/footer.php'); ?>
  <script src="<?php echo base_url('lib/frontend/js/jquery.magnific-popup.min.js'); ?>"></script>
  <script src="<?php echo base_url('lib/frontend/js/main.js'); ?>"></script>

</body>
<script type="text/javascript">
    $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.'+value).hide('3000');
        $('.filter').filter('.'+value).show('3000');
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
         $(this).removeClass("active");
    }
    
    $(this).addClass("active");
       
    $("#klikfoto").click(function() {
        $("#navigation").hide();
    });
    
});

</script>

</html>
