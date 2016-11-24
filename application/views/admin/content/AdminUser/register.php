
                <h1>About Rise App Solutions</h1>

                <?php echo form_open(base_url().'update-about-us');
                    foreach ($get_all_about_us as $about_us){ 
                ?>
                  <div class="form-group">
                    <span class="required text-center"><?php echo form_error('about_us_content');?></span>
                    <label for="Content" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="5" name="about_us_content" value="<?php echo $about_us->about_us_content; ?>"><?php echo $about_us->about_us_content; ?></textarea>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="hidden" name="about_us_id" value="<?php echo $about_us->about_us_id; ?>" />
                      <button type="submit" class="btn btn-default">Update</button>
                    </div>
                  </div> 
                <?php }echo form_close();?> </form>

