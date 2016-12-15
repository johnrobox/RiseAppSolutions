
<?php echo $this->session->flashdata('success'); ?>
<?php echo $this->session->flashdata('error'); ?>
<div class="alert alert-success alert-dismissible" role="alert" id="successAlert">
    <?php
    // alert close button
    $close_alert = array(
        'type' => 'button',
        'class' => 'close',
        'data-dismiss' => 'alert',
        'aria-label' => 'Close',
        'content' => '<span aria-hidden="true">&times;</span>'
    );
    echo form_button($close_alert);
    ?>
</div>
<div class="inquiryCommonError text-error"></div>
<?php if ($inquiries) { ?>
<div class="dataTable_wrapper">
    <table class="table table-hovered table-bordered" id="inquiry-datatable">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Text</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($inquiries as $inquiry) { 
            $id = $inquiry->id; 
            $status = $inquiry->status;
            $content = $inquiry->inquiry_content;
            $email = $inquiry->inquiry_email;
        ?>
            <tr class="<?php echo ($status) ? 'white-bg' : 'eee-bg';?>" id="inquiryTr<?php echo $id; ?>">
                <td><?php echo ucfirst(ucwords($inquiry->inquiry_firstname));?></td>
                <td><?php echo ucfirst(ucwords($inquiry->inquiry_lastname));?></td>
                <td><?php echo $email;?></td>
                <td>
                    <?php echo strlen($content) > 50 ? substr($content,0,50)."..." : $content; ?>
                </td>
                <td><?php echo $inquiry->inquiry_date_submitted;?></td>
                <td>
                    <?php 
                    // delete inquiry button
                    $delete_inquiry_button = array(
                        'class' => 'btn btn-danger btn-xs deleteInquiryButton btn-fixed-one',
                        'value' => $id,
                        'content' => '<span class="glyphicon glyphicon-trash"></span> Delete'
                    );
                    echo form_button($delete_inquiry_button);
                    // show single inquiry button
                    $show_inquiry_button = array(
                        'class' => 'btn btn-primary btn-xs showInquiryButton btn-fixed-one',
                        'value' => $id,
                        'content' => 'Show'
                    );
                    echo form_button($show_inquiry_button);
                    ?>
                    <br>
                    <button class="btn btn-xs <?php echo ($status) ? "btn-success" : " btn-warning";?> btn-fixed-one markInquiryButton " id="markInquiry<?php echo $id;?>" status="<?php echo $status;?>" value="<?php echo $id; ?>">
                        <span id="markText<?php echo $id;?>">
                            <?php echo ($status) ? "Mark as Unread" : " Mark as Read";?>
                        </span>
                        <img src="<?php echo base_url();?>images/admin/loading/loading8.gif" id="markLoadingImage<?php echo $id;?>" class="img-responsive loading-image center-block" style="height: 20px; width: 20px; display: none;"/>
                    </button>
                    <?php 
                    // reply inquiry button
                    $quick_reply_inquiry_button = array(
                        'class' => 'btn btn-xs btn-default btn-fixed-one replyInquiryButton',
                        'email' => $email,
                        'content' => 'Quick Reply'
                    );
                    echo form_button($quick_reply_inquiry_button);
                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } else { ?>
<div class="alert alert-info">No Inquiry Items </div>
<?php } ?>

<script>
    $(document).ready(function(){
        $('#inquiry-datatable').DataTable({
            responsive: true
        });
    });
</script>
