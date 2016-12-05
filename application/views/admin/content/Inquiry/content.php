


<?php echo $this->session->flashdata('success'); ?>
<?php echo $this->session->flashdata('error'); ?>
<?php if ($inquiries) { ?>
<table class="table table-hovered table-bordered">
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Text</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($inquiries as $inquiry) { ?>
    <tr>
        <td><?php echo ucfirst(ucwords($inquiry->inquiry_firstname));?></td>
        <td><?php echo ucfirst(ucwords($inquiry->inquiry_lastname));?></td>
        <td><?php echo $inquiry->inquiry_email;?></td>
        <td><?php echo $inquiry->inquiry_content;?></td>
        <td><?php echo $inquiry->inquiry_date_submitted;?></td>
        <td>
            <button class="btn btn-danger btn-xs deleteInquiryButton" value="<?php echo $inquiry->id;?>">Delete</button>
            <button class="btn btn-primary btn-xs showInquiryButton" value="<?php echo $inquiry->id;?>">Show</button>
            <button class="btn btn-primary btn-xs">mark as unread</button>
        </td>
    </tr>
    <?php } ?>
</table>
<?php } else { ?>
<div class="alert alert-info">No Inquiry Items </div>
<?php } ?>
