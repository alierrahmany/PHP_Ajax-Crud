<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mt-2">Add new student</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form method="post" id="saveStudent">
                        <div class="mb-3">
                            <input type="text" name="name" required placeholder="Name*" 
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="regist_number" required placeholder="Registration Number*" 
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="avg"
                                step="0.01"
                                required placeholder="Average*" 
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="move_next" required placeholder="Decision*" 
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
