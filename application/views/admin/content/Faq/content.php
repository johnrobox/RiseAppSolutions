

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
        <?php 
                $button_class = 'warning';
                $button_text = 'Disable';
            } else {
                $button_class = 'default';
                $button_text = 'Enable';
            }
            <td><?php echo $faq->faq_question;?></td>
            <td><?php echo $faq->faq_answer;?></td>
            <td>
                    <span id="text<?php echo $id;?>"><?php echo $button_text; ?></span>
                    <img src="<?php echo base_url();?>images/admin/loading/loading8.gif" id="changeStatusLoading<?php echo $id;?>" class="img-responsive center-block" style="height: 20px; width: 20px; display: none;"/>
                </button>
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