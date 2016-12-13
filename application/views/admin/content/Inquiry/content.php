


<?php echo $this->session->flashdata('success'); ?>
<?php echo $this->session->flashdata('error'); ?>

<div class="alert alert-success alert-dismissible" role="alert" id="successAlert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="inquiryCommonError text-error"></div>
<?php if ($inquiries) { ?>
<div class="dataTable_wrapper">
    <table class="table table-hovered table-bordered" id="stagit-datatable">
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
        <?php foreach ($inquiries as $inquiry) { ?>
        <?php $id = $inquiry->id; ?>
        <tr class="<?php echo ($inquiry->status) ? 'white-bg' : 'eee-bg';?>" id="inquiryTr<?php echo $id; ?>">
            <td><?php echo ucfirst(ucwords($inquiry->inquiry_firstname));?></td>
            <td><?php echo ucfirst(ucwords($inquiry->inquiry_lastname));?></td>
            <td><?php echo $inquiry->inquiry_email;?></td>
            <td>
                <?php $content = $inquiry->inquiry_content;?>
                <?php echo strlen($content) > 50 ? substr($content,0,50)."..." : $content; ?>
            </td>
            <td><?php echo $inquiry->inquiry_date_submitted;?></td>
            <td>
                <button class="btn btn-danger btn-xs deleteInquiryButton btn-fixed-one" value="<?php echo $id; ?>">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
                <button class="btn btn-primary btn-xs showInquiryButton btn-fixed-one" value="<?php echo $id; ?>">Show</button>
                <br>
                <button class="btn btn-xs <?php echo ($inquiry->status) ? "btn-success" : " btn-warning";?> btn-fixed-one markInquiryButton " id="markInquiry<?php echo $id;?>" status="<?php echo $inquiry->status;?>" value="<?php echo $id; ?>">
                    <span id="markText<?php echo $id;?>">
                        <?php echo ($inquiry->status) ? "Mark as Unread" : " Mark as Read";?>
                    </span>
                    <img src="<?php echo base_url();?>images/admin/loading/loading8.gif" id="markLoadingImage<?php echo $id;?>" class="img-responsive loading-image center-block" style="height: 20px; width: 20px; display: none;"/>
                </button>
                <button class="btn btn-xs btn-default btn-fixed-one replyInquiryButton" email="<?php echo $inquiry->inquiry_email;?>">Quick Reply</button>
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
        $('#stagit-datatable').DataTable({
            responsive: true
        });
    });
</script>
