<?php if ($this->session->flashdata('warning')): ?>
    <div aria-live="polite" aria-atomic="true">
        <div class="toast" data-animation="true" data-delay="5000" style="position: absolute; top: 0; right: 10s;">
    <div class="toast-header">
        <span class="rounded mr-2 bg-info" style="width: 15px;height: 15px"></span>
        <strong class="mr-auto">Notifikasi</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
		        </button>
    </div>
    <div class="toast-body">
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
        </div>
    </div>
<?php endif; ?>