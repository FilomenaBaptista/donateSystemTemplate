<?php include 'header.php' ?>


<section class="banner py-5 container-fluid hero-wrap hero-wrap-2" style="background-image: url(../img/bg-img/menina-agua.jpg);">
    <div class="container justify-content-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 text-center">
                    <h1 class="mb-0 bread text-white">Contacto</h1>
                    <p class="breadcrumbs text-white"><span class="me-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contacte-nos <i class="fa fa-chevron-right"></i></span></p>

                </div>
</section>

    <!--Section: Contact v.2-->
<section class="container mb-4">

<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4">Contacte-nos</h2>
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5"> Você tem alguma pergunta? Por favor, não hesite em nos contatar diretamente. Nossa equipe entrará em contato com você em questão de horas para ajudá-lo.</p>

<div class="row">

    <!--Grid column-->
    <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name" class="">Nome</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email" class="">E-mail</label>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="subject" name="subject" class="form-control">
                        <label for="subject" class="">Assunto</label>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        <label for="message">Sua Mensagem</label>
                    </div>

                </div>
            </div>
            <!--Grid row-->

        </form>

        <div class="text-center text-md-left">
            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
        </div>
        <div class="status"></div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-3 text-center">
        <ul class="list-unstyled mb-0">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>San Francisco, CA 94126, USA</p>
            </li>

            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+ 01 234 567 89</p>
            </li>

            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>contact@mdbootstrap.com</p>
            </li>
        </ul>
    </div>
    <!--Grid column-->

</div>

</section>

<h2 class="h1-responsive font-weight-bold text-center my-4">Onde Estamos</h2>
<div class="embed-responsive embed-responsive-16by9">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15764.351866392843!2d13.1894457!3d-8.9640418!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a521f0cebfa401d%3A0x47f80afa00f094f8!2sRua%20151%2C%20Kifica!5e0!3m2!1spt-PT!2sao!4v1708355330726!5m2!1spt-PT!2sao" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php include 'footer.php' ?>

</body>

</html>