<!-- Page Content -->
<div id="page-content-wrapper">
<a href="#menu-toggle" id="menu-toggle">
    <i class="fa fa-bars fa-3x" aria-hidden="true"></i>
</a>
<!-- Important! Do not Delete -->


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>About Rise App Solutions (<small>Content</small>)</h1>

                <?php 

                  echo form_open(base_url().'admin/update-about-us');
                    foreach ($get_all_about_us as $about_us){ 
                ?>
                  <div class="form-group">
                    <span class="required text-center"><?php echo form_error('about_us_content');?></span> 
                    <div class="col-sm-12">
                        <?php

                        echo $this->session->flashdata('updated_about_us_alert-message'); 
                        echo $this->session->flashdata('error_updating_about_us_alert-message'); 

                        ?>
                      <textarea class="form-control" rows="10" id="about_us_content" name="about_us_content" value="<?php echo $about_us->about_us_content; ?>"><?php echo $about_us->about_us_content; ?></textarea>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="hidden" name="about_us_id" value="<?php echo $about_us->id; ?>" />
                      <button type="submit" class="btn btn-block btn-primary">Update</button>
                    </div>
                  </div> 
                <?php }echo form_close();?>
            </div>
        </div>
    </div>



<!-- Important! Do not Delete -->
</div>
<!-- /#page-content-wrapper -->
