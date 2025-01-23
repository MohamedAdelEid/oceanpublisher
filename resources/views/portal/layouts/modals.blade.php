
<!-- This is To Show Confrirm Delete ... -->
<div class="modal fade" id="confirm-delete">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body text-center">
                <form action="" id="destroyForm" method="post">
                    @csrf
                    @method('DELETE')
                    
                    <h4 class="text-danger my-3 h2">Confirmation Alert?</h4>
                    <p class="my-4 h4">Are you sure you want to continue?</p>
                    <button type="button" aria-label="Close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" aria-label="Close" class="btn btn-danger mx-2">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- This is to View Data Daynamic model -->
<div class="modal fade effect-super-scaled" id="show-dynamic-model">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="dynamic-model-title"></h6>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="dynamic-model-content"></div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-primary">Close</button>
            </div>
        </div>
    </div>
</div>