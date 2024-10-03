<?php require_once '../layouts/header.php'; ?>
<?php
$stmt = $conn->prepare("SELECT * FROM students");
$stmt->execute();

// set the resulting array to associative
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php require_once './addStudentForm.php'; ?>
<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="my-3">
        <button data-bs-toggle="modal" data-bs-target="#addStudentModal" class="btn btn-primary">
          <i class="fas fa-plus"></i> Create
        </button>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Registration Number</th>
                <th scope="col">Average</th>
                <th scope="col">Decision</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($students as $key => $student) : ?>
                <?php require_once './editStudentForm.php'; ?>
                <tr>
                  <th scope="row"><?php echo $key += 1; ?></th>
                  <td><?php echo $student['name']; ?></td>
                  <td><?php echo $student['regist_number']; ?></td>
                  <td>
                    <?php echo $student['avg']; ?>
                  </td>
                  <td>
                    <?php echo $student['move_next']; ?>
                  </td>
                  <td>
                    <button
                      value="<?php echo $student['id']; ?>"
                      data-bs-toggle="modal"
                      data-bs-target="#editStudentModal"
                      class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button value="<?php echo $student['id']; ?>"
                      class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once '../layouts/footer.php'; ?>
<script>
  //add new student
  $('#saveStudent').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "saveStudent.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        var res = JSON.parse(response);
        if (res.status == 200) {
          $('#addStudentModal').modal('hide');
          $('#saveStudent')[0].reset();
          window.location.reload();
          alert(res.message);
        } else if (res.status == 500) {
          alert(res.message);
        } else {
          alert("Something went wrong try again later");
        }
      }
    });
  });
  //get student to update
  $('.btn-warning').on('click', function() {

    var student_id = $(this).val();

    $.ajax({
      type: "GET",
      url: "updateStudent.php?id=" + student_id,
      success: function(response) {
        var res = JSON.parse(response);
        if (res.status == 404) {
          alert(res.message);
        } else if (res.status == 200) {

          $('#student_id').val(res.data.id);
          $('#name').val(res.data.name);
          $('#regist_number').val(res.data.regist_number);
          $('#avg').val(res.data.avg);
          $('#move_next').val(res.data.move_next);

          $('#editStudentModal').modal('show');
        }
      }
    });
  });
  //update student
  $('#updateStudent').on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "updateStudent.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        var res = JSON.parse(response);
        if (res.status == 200) {
          $('#editStudentModal').modal('hide');
          $('#updateStudent')[0].reset();
          window.location.reload();
          alert(res.message);
        } else if (res.status == 500) {
          alert(res.message);
        } else {
          alert("Something went wrong try again later");
        }
      }
    });
  });
  //delete student
  $('.btn-danger').on('click', function() {
    if (confirm('Are you sure you want to delete this student?')) {
      var student_id = $(this).val();
      $.ajax({
        type: "POST",
        url: "deleteStudent.php?id=" + student_id,
        data: {
          'student_id': student_id
        },
        success: function(response) {
          var res = JSON.parse(response);
          if (res.status == 500) {
            alert(res.message);
          } else {
            alert(res.message);
            window.location.reload();
          }
        }
      });
    }
  });
</script>