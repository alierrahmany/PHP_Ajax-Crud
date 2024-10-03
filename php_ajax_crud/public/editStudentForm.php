<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mt-2">Edit student</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form method="post" id="updateStudent">
                        <div class="mb-3">
                            <input type="hidden" 
                                id="student_id" name="student_id">
                        </div>
                        <div class="mb-3">
                            <input type="text" 
                                id="name" name="name" required placeholder="Name*" 
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="number" 
                            id="regist_number" name="regist_number" required placeholder="Registration Number*" 
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="number" 
                               id="avg" name="avg" 
                                step="0.01"
                                required placeholder="Average*" 
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="text" 
                                id="move_next" name="move_next" required placeholder="Decision*" 
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
