  <!-- Page Content -->
  <div class="container m-nav">
 
 <!-- Page Heading/Breadcrumbs -->
 <h1 class="mt-4 mb-3 text-primary"><span class="text-primary">► </span>Contacto
      <small>¡Dejanos tu mensaje y nos pondremos en contacto contigo!</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a class="text-decoration-none" href="<?php echo base_url?>">Home</a>
      </li>
      <li class="breadcrumb-item  text-grey">Contacto</li>
    </ol>
    <?php if(isset($_SESSION['contacto'])):?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                ¡Correo enviado con exito pronto nos pondremos en contacto con usted!
            </div>
        <?php endif; ?>
        <?php Utils::deleteSession('contacto');?>
      

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <form action="<?php echo base_url;?>contacto/enviar" method="POST">
          <div class="control-group form-group">
            <div class="controls">
              <label>Nombre Completo</label>
              <input type="text" class="form-control form-control-sm" name="name" autofocus >
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Telefono</label>
              <input type="tel" class="form-control form-control-sm" name="phone" >
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Correo</label>
              <input type="email" class="form-control form-control-sm " name="email" >
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Mensaje</label>
              <textarea rows="5" cols="50" class="form-control" name="message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-success" id="sendMessageButton">Enviar Mensaje</button>
        </form>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Detalles de Contacto</h3>
        <p>
          Heroico Colegio Militar 928, Morelos,
          <br>42040 Pachuca de Soto, Hgo.
          <br>
        </p>
        <p>
          <abbr title="Phone">P</abbr>: (123) 456-7890
        </p>
        <p>
          <abbr title="Email" class="text-primary">Correo</abbr>:
          <a href="mailto:name@example.com">informes@pachuca.com.mx
          </a>
        </p>
        <p>
          <abbr title="Hours">Horarios</abbr>: Lunes - Viernes: 9:30 AM a 6:00 PM 
        </p>
      </div>
    </div>
    <!-- /.row -->