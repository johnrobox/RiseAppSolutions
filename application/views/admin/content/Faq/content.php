

<?php echo $this->session->flashdata('success'); ?>
<button class="btn btn-primary" id="addFaqButton">ADD</button>
<div class="alert" id="faqMessageAlert"></div>
<?php if ($faqs) { ?>
<div class="dataTable_wrapper">
    <table class="table table-hovered table-bordered" id="faqs-datatable">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($faqs as $faq) { ?>
        <?php 
            if ($faq->status) { 
                $button_class = 'warning';
                $button_text = 'Disable';
            } else {
                $button_class = 'default';
                $button_text = 'Enable';
            }
        ?>  
        <?php $id = $faq->id; ?>
        <tr class="<?php echo ($faq->status) ? 'white-bg' : 'eee-bg';?>" id="faqTr<?php echo $id; ?>">
            <td><?php echo $faq->faq_question;?></td>
            <td><?php echo $faq->faq_answer;?></td>
            <td>
                <button class="btn btn-primary btn-xs showFaqInfo" value="<?php echo $id;?>">Show</button>
                <button class="btn btn-danger btn-xs deleteFaqButton" value="<?php echo $id;?>">Delete</button>
                <button class="btn btn-<?php echo $button_class; ?> btn-xs changeStatusButton" id="changeStatusButton<?php echo $id;?>" value="<?php echo $id;?>" status="<?php echo $faq->status;?>">
                    <span id="text<?php echo $id;?>"><?php echo $button_text; ?></span>
                    <img src="<?php echo base_url();?>images/admin/loading/loading8.gif" id="changeStatusLoading<?php echo $id;?>" class="img-responsive center-block" style="height: 20px; width: 20px; display: none;"/>
                </button>
                <button class="btn btn-success btn-xs updateFaqButton" value="<?php echo $id; ?>">Update</button>
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
        $('#faqs-datatable').DataTable({
            responsive: true
        });
    });
</script>